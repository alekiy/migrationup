<?php

class block_migrationup extends block_base {
	public function init() {
		$this->title = get_string('migrationup', 'block_migrationup');
	}
	
	public function get_content() {
		global $USER, $CFG, $DB, $OUTPUT, $COURSE;
    	if ($this->content !== null) {
    	  return $this->content;
   	 	}
   	 	
   	 /*
   	  * get current status of block 
   	  * request = no DB record
   	  * migration progress = DB record but migrated=0
   	  * completed = DB record and migrated=1
   	  * 
   	  */ 
   	 $result = $DB->get_records('block_migrationup', array('newcourseid' => $COURSE->id));

   	 $this->content = new stdClass;
   	 
   	 if (!$result) {
   	 	// get necessary strings for buttons and urls
   	 	$strsubmit = get_string('submit', 'block_migrationup');
   	 	$strhelp = get_string('help', 'block_migrationup');
   	 	$strurl = get_string('url');
   	 	$this->content->text .= get_string('block_start1', 'block_migrationup');
   	 	$this->content->text .= $OUTPUT->help_icon('course', 'block_migrationup');
   	 	$this->content->text .= get_string('block_start2', 'block_migrationup');
   	 	
   	 	$url = new moodle_url($CFG->wwwroot.'/blocks/migrationup/migration.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
   	 	$this->content->text .= html_writer::link($url, get_string('block_link_form', 'block_migrationup'), array('class' => 'migrationlink'));
   	 	$this->content->footer .= $strhelp;   	 	
   	 } else {
   	 	$migrated = $DB->get_records('block_migrationup', array('newcourseid' => $COURSE->id, 'migrated' => 1));
   	 	if(!$migrated) {
   	 		$strhelp = get_string('help', 'block_migrationup');
   	 		$strprogress = get_string('progress', 'block_migrationup');
   	 		$this->content->text .= $strprogress.'<br />'.$strhelp;
   	 		if (has_capability('block/migrationup:finishmigration', context_course::instance($COURSE->id))) {
   	 			$pageparam = array('courseid' => $COURSE->id, 'blockid' => $this->instance->id, 'migrated' => 'yes');
   	 			$rdyurl = new moodle_url('/blocks/migrationup/migration.php', $pageparam);
            	$rdypicurl = new moodle_url('/blocks/migrationup/pix/accept.png');
   	 			$this->content->text .= html_writer::link($rdyurl, html_writer::tag('img', '', array('src' => $rdypicurl, 'alt' => get_string('edit'))));
   	 		}
   	 	} else {
   	 		$strfinished = get_string('finished', 'block_migrationup');
   	 		$this->content->text .= $strfinished;
   	 	}
   	 }
   	 return $this->content;
	}
	
	function applicable_formats() {
		return array('site' => true, 'course-view' => true, 'my' => false);
	}
  
} 