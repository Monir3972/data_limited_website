<?php
  $sender_name = $_POST['name'];
  $sender_email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require '../vendor/autoload.php';
 
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2;                                       
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = 'ec08fe79722288';
    $mail->Password = '7064dcfe89b33a';                      
    $mail->SMTPSecure = 'tls'; 
 
    $mail->setFrom($sender_email, $sender_name);           
    $mail->addAddress('info@data-limited.com');
    $mail->addAddress('mm.monir@goldengroup-bd.com');
      
    $mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
