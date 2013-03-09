<?php

require_once('../../config.php');
require_once('form.php'); // change name
require_once('messages.php');

global $DB, $COURSE, $USER;

$courseid = required_param('courseid', PARAM_INT);
$blockid = required_param('blockid', PARAM_INT);
$migrated = optional_param('migrated', 'no', PARAM_STRINGID);

if (!$course = $DB->get_record('course', array('id' => $courseid))) {
	print_error('invalidcourse', 'block_migrationup', $courseid);
}

require_login($course);
$PAGE->set_url('/blocks/migrationup/migration.php', array('id' => $courseid)); //TODO: this is very sloppy --skodak
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('form_heading', 'block_migrationup'));

// Setting captions and breadcrumbs specific for block (Breadcrumb & Settings - Block)
$settingsnode = $PAGE->settingsnav->add(get_string('migrationupsettings', 'block_migrationup'));
$editurl = new moodle_url('/blocks/migrationup/migration.php', array('courseid' => $courseid, 'blockid' => $blockid));
$editnode = $settingsnode->add(get_string('request', 'block_migrationup'), $editurl);
$editnode->make_active();

$courseurl = new moodle_url('/course/view.php', array('id' => $courseid));

if (isset ($migrated) && $migrated == 'yes') {
	$dataobject = $DB->get_record('block_migrationup', array('newcourseid' => $courseid));
	$dataobject->migrated = '1';
	$DB->update_record('block_migrationup', $dataobject);
	$email = $dataobject->requestermail;
	// send EMail Confirmationto User
	$msg = new message();
	$msg->sendEmail("Sehr geehrte(r) Frau/Herr ".$USER->lastname.",\n\ndie Übertragung Ihres Kurses\n\"".$COURSE->fullname."\"\nnach Moodle 2.UP ist abgeschlossen.\n\nBitte überprüfen Sie den Kurs und die Aktivitäten.\nSollte etwas fehlen oder nicht wie gewünscht funktionieren,\nwenden Sie sich bitte an moodle-team@uni-potsdam.de\noder telefonisch an 0331-977-4357.\n\nMit freundlichen Grüßen,\nIhr ZEIK-, AG eLEARNING- & eLiS-Team\nder Universität Potsdam",$email);
	redirect($courseurl);
}

// is needed that redirect works after submitting wrong data
$mform = new migration_form(null, null, 'post', '', array('class' => 'migrationform'));
$toform['blockid'] = $blockid;
$toform['courseid'] = $courseid;
$mform->set_data($toform);


if ($mform->is_cancelled()) {
	redirect($courseurl);
} else if ($fromform = $mform->get_data()) {

	$url = $fromform->oldcourseurl;

	// create dataobject for DB transaction
	$dataobject = new stdClass();
	$dataobject->newcourseid = $fromform->courseid;
	preg_match('/(?<=id=)(.(?!&))*./', $url, $match);
	$dataobject->oldcourseid = $match[0];
	$dataobject->requestermail = $USER->email;
	(isset ($fromform->userdata)) ? $dataobject->userdata = $fromform->userdata : $dataobject->userdata = '0';

	// insert data into Database
	if ($DB->get_records('block_migrationup', array('newcourseid' => $courseid))) {
		print_error('duplicate', 'block_migrationup');
	}
	if(!$DB->insert_record('block_migrationup', $dataobject)) {
		print_error('inserterror', 'block_migrationup');
	}
	
	// generate message for admins and user
	if($dataobject->userdata=='0') {
		$migrationmsg = 'nein';
	} else {
		$migrationmsg = 'ja';
	}
	$msg = new message();
	$msg->sendMessage("Benutzername: $USER->username \nVorname: $USER->firstname \nNachname: $USER->lastname \nAlter Kurs: $url \nNeuer Kurs: https://moodle2.uni-potsdam.de/course/view.php?id=$dataobject->newcourseid \nMigration mit Benutzerdaten: $migrationmsg", $USER);

	redirect($courseurl);

} else {
	// form didn't validate or first display
	$site = get_site();
	echo $OUTPUT->header();
	$mform->display();
	echo $OUTPUT->footer();
}
