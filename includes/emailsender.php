<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require(__DIR__ . '/../vendor/phpmailer/phpmailer/src/Exception.php');
require(__DIR__ . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require(__DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php');

function sendEmail($email,$nom,$event,$confidentialCode)
{
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = '79e5ff2e6e0941';                     // SMTP username
        $mail->Password = 'f03d14c9108075';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ag2r@lamondiale.fr', 'Ag2r');
        $mail->addAddress($email, $nom);     // Add a recipient, second param(name) is optional

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Votre code confidentiel - Ag2r';
        $mail->Body = 'Bonjour ' . $nom .',<br>Votre inscription a l\'évenement ' . $event . '  a bien été prise en compte.<br>Votre code confidentiel est le suivant : ' . $confidentialCode;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        exit();
    }
}