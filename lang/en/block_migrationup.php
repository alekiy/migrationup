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
$string['help'] = 'Bei Fragen wenden Sie sich bitte an <a href="mailto:moodle-team@uni-potsdam.de">moodle-team@uni-potsdam.de</a> oder telefonisch an 0331-977-4357.';
$string['help_withouthtml'] = "Bei Fragen wenden Sie sich bitte an\nmoodle-team@uni-potsdam.de oder telefonisch an 0331-977-4357.";
$string['progress']= 'Ihre Kursübertragung wird bearbeitet. Das Moodle-Team meldet sich bei Ihnen, sobald die Aufgaben erledigt sind.';
$string['finished'] = 'Ihre Kursübertragung wurde abgeschlossen. Bitte überprüfen Sie den Kurs und die Aktivitäten. Sollte etwas fehlen oder nicht wie gewünscht funktionieren, wenden Sie sich bitte an <a href="mailto:moodle-team@uni-potsdam.de">moodle-team@uni-potsdam.de</a> oder telefonisch an 0331-977-4357.';

/* Block - Help
 -------------------------------*/
$string['course'] = 'Kurse';
$string['course_help'] = 'Wir unterschieden zwischen <i>einfachen</i>, <i>komplexen</i> und <i>Kursen mit Teilnehmer(innen)-Inhalten-</i>.<br />
<ul><li>Ein <b><i>einfacher</i></b> Kurs enthält im wesentlichen Themenblöcke, Texte und Überschriften, Dokumente und einfache Aktivitäten. Einfache Kurse können Sie auch selber übertragen.</li>
<li>Ein <b><i>komplexer</i></b> enthält zum Beispiel Tests, nutzt Fragensammlungen, Bewertungsskalen, Wikis und oder Gruppenfunktionen.</li>
<li>Ein <b><i>Kurs mit Teilnehmer(innen)-Daten</i></b> ist ein Kurs, in dem die Teilnehmenden in Foren, Glossaren, Wikis etc. Inhalte eingegeben haben, die Sie in jedem Fall übertragen wollen. Das ist zum Beispiel der Fall, wenn ein Moodle-Kurs für die Projektorganisation oder den Austausch in einer Arbeitsgruppe genutzt wird.</li>
</ul>Die Kursübertragung durch das Moodle-Team bietet sich vor allem für <b><u>komplexe</u></b> und <b><u>Kurse mit Teilnehmer(innen)-Daten</u></b> an.<p />';

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
$string['form_request1'] = 'Bitte geben Sie hier die Webadresse (URL) des Kurses im';
$string['form_request2'] ='ein, den Sie in diesen Kurs wiederherstellen lassen möchten.';

$string['form_request_urlhelp1'] = 'Die URL erhalten Sie indem Sie Ihren Kurs im';
$string['oldmoodle'] = 'alten Moodle';
$string['form_request_urlhelp2'] = 'aufrufen (in einem neuen Browser-Fenster) und die URL dann in der Adresszeile Ihres Browsers markieren und kopieren.';
$string['form_request_listitem1'] = '<u>Markieren:</u> Zum Markieren klicken Sie in die Adresszeile und klicken dann entweder wiederholt, bis die gesamte URL markiert ist oder drücken Sie die Tastenkombination STRG+A.';
$string['form_request_listitem2'] = '<u>Kopieren:</u> Klicken Sie mit der Maus rechts auf den vorher markierten Text und gehen auf Kopieren oder drücken Sie die nach der erfolgreichen Markierung die Tastenkombination STRG+C ';
$string['form_request_listitem3'] = '<u>Einfügen:</u> Gehen Sie nun in das Feld: "Alte-Kurs-URL" und drücken hier die Tastenkombination STRG+V oder klicken mit der Maus rechts in das Feld und wählen dort Einfügen.';

$string['url_help_pic'] = 'URL-Hilfebild';
$string['url'] = 'Alte Kurs-URL:';
$string['userdata'] = 'Teilnehmer(innen)-Daten übernehmen <br />(Glossareinträge, Forenbeiträge ...)';
$string['submit'] ='Übertragung beantragen';

/* Formular - Submit - Errors
-------------------------------*/
$string['form_required'] = 'Diese Eingabe wird benötigt';
$string['form_validurl'] = 'Dies ist keine gültige Moodleadresse. Sie sollte der Form https://moodle.uni-potsdam.de/course/view.php?id=6527 sein.';

/* Formular - Help
-------------------------------*/
$string['url_help'] = 'Die URL (Webadresse / Adresse) Ihrer alten Kurse sieht für gewöhnlich aus wie:<br />https://moodle.uni-potsdam.de/course/view.php?id=4.<p /><b>Wichtig ist, dass die URL auf eine Zahl endet.</b>';
$string['userdata_help'] = 'Benutzerdaten beinhalten nicht nur eingeschriebenen Teilnehmer(innen), sondern auch die von ihnen produzierten Inhalte und Artefakte. Hierzu gehören Foreneinträge, Glossarbeiträge, Aufgabeneinreichungen uvm..<p /><b>Benötigen Sie diese Daten nicht, da Sie nur die Kursstruktur wiederherstellen möchten, so lassen Sie dieses Feld frei.</b>';

/* DB - Form Errors
-------------------------------*/
$string['inserterror'] = 'nicht gegangen in DB';
$string['duplicate'] = 'Eintrag bereits vorhanden';
$string['invalidurl'] = 'Es ist leider keine Kurs URL.';
$string['notteacher'] = 'Sie sind nicht der Kursleiter im zu übertragenden Kurs.';