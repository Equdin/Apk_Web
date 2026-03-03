<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php'; // If using Composer
// require 'PHPMailer/src/PHPMailer.php'; // If manual
// require 'PHPMailer/src/SMTP.php';
// require 'PHPMailer/src/Exception.php';

if (empty($_POST['name'])       || 
    empty($_POST['email'])      ||
    empty($_POST['message'])    ||
    !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Gmail SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'kirankumar.a.b.1703@gmail.com'; 
    $mail->Password   = 'ymvx aulx lwjt ibzh';   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Sender and recipient
    $mail->setFrom('kirankumar.a.b.1703@gmail.com', 'Website Contact');
    $mail->addAddress('kirankumar.a.b.1703@gmail.com');

    // Content
    $mail->isHTML(false);
    $mail->Subject = "New message from hats.com: $name";
    $mail->Body    = "You have received a new message from your website contact form.\n\n"
                   . "Name: $name\n"
                   . "Email: $email_address\n"
                   . "Message:\n$message";

    $mail->send();
    echo 'Message has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

include './db.php';
?>

