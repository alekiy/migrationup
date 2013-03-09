<?php

class message {

	protected $to = 'moodle-team@uni-potsdam.de';
	protected $subject = 'Antrag auf Kursübertragung';
	protected $message;
	protected $header;
	protected $user;

	function sendEmail($message, $email) {
		ini_set('SMTP', 'smtpout.uni-potsdam.de');
		$this->message = $message;
		// Send E-Mail Confirmation
		mail($email, 'Kursübertragung abgeschlossen', $this->message, "MIME-Version: 1.0\r\nContent-type: text/plain; charset=utf-8\r\nfrom: moodle-team@uni-potsdam.de");
	}

	function sendMessage($message, $user) {
		ini_set('SMTP', 'smtpout.uni-potsdam.de');
		$this->message = $message;
		$this->user = $user;

		// Send Ticket E-Mail
		if(!mail($this->to, $this->subject, $this->message, "MIME-Version: 1.0\r\nContent-type: text/plain; charset=utf-8\r\nfrom: ".$this->user->email)) {

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
		}
		
		// Send Moodle System Message to User
		$eventdata = new stdClass();
		$eventdata->component         = 'moodle'; //your component name
		$eventdata->name              = 'notices'; //this is the message name from messages.php
		$eventdata->userfrom          = $mainadmin;
		$eventdata->userto            = $this->user;
		$eventdata->subject           = $this->subject;
		$eventdata->fullmessage       = "Sehr geehrte(r) Frau/Herr ".$this->user->lastname.",\n\nvielen Dank für Ihren Auftrag.\nWir werden diesen schnellstmöglich bearbeiten.\n\nBitte haben Sie Verständnis dafür, dass die Übertragung von Kursen in\ndas neue Moodle aufgrund der hohen Nachfrage einige Tage in Anspruch\nnehmen kann.\n\nSobald die Übertragung abgeschlossen ist, werden wir Sie per E-Mail\ninformieren.".get_string('help_withouthtml', 'block_migrationup')."\n\nMit freundlichen Grüßen,\nIhr ZEIK-, AG eLEARNING- & eLiS-Team\nder Universität Potsdam";
		$eventdata->fullmessageformat = FORMAT_PLAIN;
		$eventdata->fullmessagehtml   = '';
		$eventdata->smallmessage      = '';
		$eventdata->notification      = 1;
		message_send($eventdata);
	}
}