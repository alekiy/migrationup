<?php
$string['pluginname'] = 'UP-Kursübertragung';
$string['migrationup'] = 'Kursübertragung';
$string['migrationup:addinstance'] = 'Kursübertragungsblock hinzufügen';
$string['address'] = 'Kursadresse';
$string['status'] = 'Migrationsstatus';

/* Block
-------------------------------*/
$string['block_start1'] = 'Sie wollen einen Kurs ';
$string['block_start2'] = 'übertragen lassen?';
$string['block_link_form'] = 'Zum Antrag';
$string['help'] = 'Bei Fragen wenden Sie sich bitte an <a href="mailto:alekiy@uni-potsdam.de">moodle-team@uni-potsdam.de</a> oder telefonisch an 0331-977-4357.';
$string['help_withouthtml'] = "Bei Fragen wenden Sie sich bitte an moodle-team@uni-potsdam.de\noder telefonisch an 0331-977-4357.";
$string['progress']= 'Ihre Kursübertragung wird bearbeitet. Das Moodle-Team meldet sich bei Ihnen sobald die Aufgaben erledigt sind.';
$string['finished'] = 'Ihre Kursübertragung wurde abgeschlossen. Bitte überprüfen Sie den Kurs und die Aktivitäten. Sollte etwas fehlen oder nicht wie gewünscht funktionieren wenden Sie sich bitte an <a href="mailto:alekiy@uni-potsdam.de">moodle-team@uni-potsdam.de</a> oder telefonisch an 0331-977-4357.';

/* Block - Help
 -------------------------------*/
$string['course'] = 'Kurse';
$string['course_help'] = 'Wir unterschieden zwischen <i>einfachen</i>, <i>komplexen</i> und <i>Kursen mit Benutzerdaten</i>.<br /> Die Kursübertragung bietet sich vor allem für <i>komplexe</i> und <i>Kurse mit Benutzerdaten</i> an.<p />Sollte Ihr Kurs nur wenige Aktivitäten aufweisen und Sie die zeitlichen Möglichkeiten besitzen sind Sie auf der sicheren Seite den Kurs neu anzulegen.';

/* Settings
 -------------------------------*/
$string['request'] = 'Kursübertragungsformular';
$string['migrationupsettings'] = 'Kursübertragungs-Einstellungen';
$string['srcdir'] = 'Moodledata Verzeichnis (altes Moodle)';
$string['configsrcdir'] = 'Moodledata Verzeichnis aus dem das Backup bezogen wird (Form: /var/moodledata/)';
$string['destdir'] = 'Ziel Ordner';
$string['configdestdir'] = 'Mehr Text';

/* Formular
-------------------------------*/
$string['form_heading'] = 'Kursübertragungsformular';
$string['form_caption'] = 'Übertragungsformular für Kurse von Moodle zu Moodle2.UP';
$string['form_request'] = 'Bitte geben Sie hier die Webadresse (URL) des zu  übertragenen Kurses in der Form (<b>https://moodle.uni-potsdam.de/course/view.php?id=6527</b>)
ein.';

$string['form_request_urlhelp1'] = 'Die URL oder auch Webadresse genannt erhalten Sie indem Sie Ihren Kurs im';
$string['oldmoodle'] = 'Moodle';
$string['form_request_urlhelp2'] = 'in der Adresszeile Ihres Browsers auswählen und kopieren.';
$string['form_request_urlhelp3'] = '(<b>Kopieren</b>: Zum Kopieren gehen Sie in die Adresszeile und markieren diese, klicken mit der <i>Maus rechts</i> und gehen anschließend auf <b><i>kopieren</i></b>. Alternativ erreichen Sie dies auch indem Sie in die Adresszeile klicken und die Tastenkombination <b>STRG+A</b> und anschließend <b>STRG+C</b> drücken.)';
$string['form_request_urlhelp4'] = '(<b>Einfügen</b>: Gehen Sie nun in das Feld: "Alte-Kurs-URL" und drücken hier die Tastenkombination <b>STRG+V</b> oder klicken mit der Maus rechts in das Feld und wählen dort <b>einfügen</b>.)';

$string['url_help_pic'] = 'URL-Hilfebild';
$string['url'] = 'Alte Kurs-URL:';
$string['userdata'] = 'Benutzerdaten übernehmen<br />(Glossareinträge, Forenbeiträge ...)';
$string['submit'] ='Übertragung beantragen';

/* Formular - Submit - Errors
-------------------------------*/
$string['form_required'] = 'Diese Eingabe wird benötigt';
$string['form_validurl'] = 'Dies ist keine gültige Moodleadresse. Sie sollte der Form https://moodle.uni-potsdam.de/course/view.php?id=6527 sein.';

/* Formular - Help
-------------------------------*/
$string['url_help'] = 'Die URL (Webadresse / Adresse) Ihrer alten Kurse sieht für gewöhnlich aus wie:<br />https://moodle.uni-potsdam.de/course/view.php?id=4.<p /><b>Wichtig ist, dass Sie auf eine Zahl.</b>';
$string['userdata_help'] = 'Benutzerdaten beinhalten nicht nur eingeschriebene Nutzer, sondern auch die von ihnen produzierten Artefakte. Hierzu gehören Foreneinträge, Glossarbeiträge, Aufgabeneinreichungen uvm..<br />Benötigen Sie diese Daten <b>nicht</b>, da Sie nur die Kursstruktur benötigen, so lassen Sie dieses Feld frei.';

/* DB - Form Errors
-------------------------------*/
$string['inserterror'] = 'nicht gegangen in DB';
$string['duplicate'] = 'Eintrag bereits vorhanden';
$string['invalidurl'] = 'Es ist leider keine Kurs URL.';
$string['notteacher'] = 'Sie sind nicht der Kursleiter im zu übertragenden Kurs.';