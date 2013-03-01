<?php 
require_once("{$CFG->libdir}/formslib.php");

class migration_form extends moodleform {

	//Regular Expression for old course URL
	private $regexurl = '/^(http|https):\/\/moodle.uni-potsdam.de\/course\/view.php\?id=[0-9]+/';
	
	function definition() {
		global $OUTPUT;
		$mform =& $this->_form;
		$mform->addElement('header','displayinfo', get_string('form_caption', 'block_migrationup'));
		
		$paragraph = '<p>'.get_string('form_request1', 'block_migrationup'). ' <a href="https://moodle.uni-potsdam.de" target="_blank">';
		$paragraph .= get_string('oldmoodle', 'block_migrationup').'</a> '.get_string('form_request2', 'block_migrationup').'<br />';
		$paragraph .= get_string('form_request_urlhelp1', 'block_migrationup').' <a href="https://moodle.uni-potsdam.de" target="_blank">';
		$paragraph .= get_string('oldmoodle', 'block_migrationup').'</a> '.get_string('form_request_urlhelp2', 'block_migrationup').'</p>';
		
		$urlhelppic = new moodle_url('/blocks/migrationup/pix/urlhelp.png');
		$urlhelp = html_writer::tag('img', '', array('src' => $urlhelppic, 'alt' => get_string('url_help_pic','block_migrationup'), 'class' => 'url'));
		
		$paragraph .= '<p>'.$urlhelp.'</p>';
		
		$listitems = array(get_string('form_request_listitem1', 'block_migrationup'), get_string('form_request_listitem2', 'block_migrationup'), get_string('form_request_listitem3', 'block_migrationup'));
		$paragraph .=html_writer::alist($listitems, null, 'ol');
		$mform->addElement('html',$paragraph);
		
		
		// Input for URL
		$mform->addElement('text', 'oldcourseurl', get_string('url', 'block_migrationup'), array('size' => '50'));
		$mform->addHelpButton('oldcourseurl', 'url', 'block_migrationup');
        $mform->setDefault('url', 'https://moodle.uni-potsdam.de/course/view.php?id=6527');
        $mform->setType('config_text', PARAM_MULTILANG);
        $mform->addRule('oldcourseurl', get_string('form_required', 'block_migrationup'), 'required', null, 'client');
        $mform->addRule('oldcourseurl', get_string('form_validurl', 'block_migrationup'), 'regex', $this->regexurl, 'client');
        
        // Checkbox for Userdata
        $mform->addElement('checkbox','userdata', get_string('userdata', 'block_migrationup'));
        $mform->addHelpButton('userdata', 'userdata', 'block_migrationup');
        
        $mform->addElement('hidden', 'blockid');
        $mform->addElement('hidden', 'courseid');
        
        // Send Buttons
        $this->add_action_buttons(true, get_string('submit', 'block_migrationup'));
	}
	
	function validation($data, $files) {		
		global $DB, $USER;
		$errors = array();
		// check if valid url
		if(preg_match($this->regexurl, $data['oldcourseurl'])) {
			preg_match('/(?<=id=)(.(?!&))*./', $data['oldcourseurl'], $match);
			$oldcourseid = $match[0];
			
			//check if teacher in old course
			if(!$DB->get_records('block_migrationup_courses', array('courseid' => $oldcourseid, 'username' => $USER->username))) {
				$errors['oldcourseurl'] = get_string('notteacher', 'block_migrationup');
			}
		} else {
			$errors['oldcourseurl'] = get_string('invalidurl', 'block_migrationup');
		}
		return $errors;
	}
}