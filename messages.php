<?php

class message {

	protected $to = 'alekiy@uni-potsdam.de';
	protected $subject = 'Migrationsanfrage';
	protected $message;
	protected $header;
	protected $user;
		
	function sendMessage($message, $user) {
		ini_set('SMTP', 'smtpout.uni-potsdam.de');
		$this->message = $message;
		$this->user = $user;
		
		// Send Ticket E-Mail
		mail($this->to, $this->subject, $this->message, "from: moodleUP@uni-potsdam.de" );
		
		// Send Moodle System Messages to admins
		$admins = get_admins();
		$mainadmin = reset($admins);
		foreach($admins as $admin) {
			$eventdata = new stdClass();
			$eventdata->component         = 'moodle'; //your component name
			$eventdata->name              = 'notices'; //this is the message name from messages.php
			$eventdata->userfrom          = $mainadmin;
			$eventdata->userto            = $admin;
			$eventdata->subject           = $this->subject;
			$eventdata->fullmessage       = $message;
			$eventdata->fullmessageformat = FORMAT_PLAIN;
			$eventdata->fullmessagehtml   = '';
			$eventdata->smallmessage      = '';
			$eventdata->notification      = 1;
			message_send($eventdata);
		}
		// Send Moodle System Message to User
		$eventdata = new stdClass();
		$eventdata->component         = 'moodle'; //your component name
		$eventdata->name              = 'notices'; //this is the message name from messages.php
		$eventdata->userfrom          = $mainadmin;
		$eventdata->userto            = $this->user;
		$eventdata->subject           = $this->subject;
		$eventdata->fullmessage       = "Sehr geehrte(r) Frau/Herr ".$this->user->lastname.",\n\nvielen Dank für Ihre Anfrage.\nWir werden diese umgehend bearbeiten und melden uns bei Ihnen,\nsobald die Übertragung abgeschlossen ist.\n".get_string('help_withouthtml', 'block_migrationup')."\n\nViele Grüße Ihr ZEIK & eLiS-Team\nder Universität Potsdam";
		$eventdata->fullmessageformat = FORMAT_PLAIN;
		$eventdata->fullmessagehtml   = '';
		$eventdata->smallmessage      = '';
		$eventdata->notification      = 1;
		message_send($eventdata);
	}
}