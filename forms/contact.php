<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize input
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $company = htmlspecialchars($_POST['company'] ?? "");
    $phone = htmlspecialchars($_POST['phone'] ?? "");

    // Email destination
    $to = "simbulirekiwinga@gmail.com";  // your email

    // Email subject
    $email_subject = "New Contact Message: $subject";

    // Email body format
    $email_body = "
    You received a new message from your portfolio website:

    Name: $name
    Email: $email
    Company: $company
    Phone: $phone
    Subject: $subject

    Message:
    $message
    ";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Try to send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "OK";
    } else {
        echo "Message could not be sent.";
    }

} else {
    echo "Invalid Request";
}
?>
