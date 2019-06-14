<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sendgrid = new SendGrid('nirbe27', 'Nn12345678');
$mail = new SendGridMail();
$mail->addTo('nirba27@gmail.com')->
setFrom('me@bar.com')->
setSubject('Subject goes here')->
setText('Hello World!')->
setHtml('<strong>Hello World!</strong>');
$sendgrid->smtp->send($mail);

?>