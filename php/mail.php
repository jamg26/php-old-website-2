<?php
date_default_timezone_set('Etc/UTC');
use PHPMailer\PHPMailer\PHPMailer;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.mailgun.org';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'TLS';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "postmaster@jamgph.com";
//Password to use for SMTP authentication
$mail->Password = "jamuel26";
// "f1ccb3e0ad148d7c6a928f95f84f0ed0386b078d";

//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Read an HTML message body from an external file, convert referenced images to embedded,
//$mail->msgHTML($format);
//Set an alternative reply-to address
//$mail->addReplyTo('Admin@jamgph.com', 'JamgPH Admin');
// -----------------------------------------------------
/*
//Set who the message is to be sent from
$mail->setFrom('Admin@jamgph.com', 'JamgPH Admin');
//Set an alternative reply-to address
$mail->addReplyTo('Admin@jamgph.com', 'JamgPH Admin');
//Set who the message is to be sent to
$mail->addAddress('jammmg26@gmail.com', 'Jamg');
//Set the subject line
$mail->Subject = 'JamgPH Subject';
//Read an HTML message body from an external file, convert referenced images to embedded,
$mail->msgHTML("HELLO WORLD");
//send the message, check for errors
if (!$mail->send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}
 */
?>