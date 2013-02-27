<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
	$settings->add(new admin_setting_configtext('block_migrationup_sourcedirectory', get_string('srcdir', 'block_migrationup'),
			get_string('configsrcdir', 'block_migrationup'), '/var/lib/moodle_old', PARAM_TEXT));
	
	$settings->add(new admin_setting_configtext('block_migrationup_destinationdirectory', get_string('destdir', 'block_migrationup'),
			get_string('configdestdir', 'block_migrationup'), '/var/lib/moodle/', PARAM_TEXT));
}