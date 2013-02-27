<?php

defined('MOODLE_INTERNAL') || die();

$capabilities = array(

		'block/migrationup:finishmigration' => array(

				'captype' => 'write',
				'contextlevel' => CONTEXT_COURSE,
				'archtypes' => array(
						'guest' => CAP_PROHIBIT,
						'student' => CAP_PROHIBIT,
						'teacher' => CAP_PROHIBIT,
						'editingteacher' => CAP_PROHIBIT,
						'coursecreator' => CAP_PROHIBIT,
						'manager' => CAP_ALLOW
				)
		)
	);
