<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'fcf2756c211a1f';                 // SMTP username
    $mail->Password = 'ff82fac1c51f93';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 2525;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('bilal@b2bx.net', 'mbilal farooq');
    // $mail->addAddress('bilal@armyspy.com', 'Joe User');     // Add a recipient
    $mail->addAddress('bilal@b2bx.net', 'bilal');     // Add a recipient

    $body = '<p><strong>Hello</strong> this is my first testing email with PHPMailer</p>';
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'this is the test subject';
    //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>