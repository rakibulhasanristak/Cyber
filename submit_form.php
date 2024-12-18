<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Define the recipient email
    $to = "mdrakibulhasanristak@gmail.com";
    
    // Define the email subject
    $subject = "New Contact Form Submission from $name";

    // Create the email body
    $body = "You have received a new message from the contact form.\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Message:\n$message";

    // Define the headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        // If email is sent successfully, redirect to a success page
        echo "<script>alert('Thank you for contacting us. Your message has been sent.'); window.location.href = 'contact.html';</script>";
    } else {
        // If email fails to send, show an error message
        echo "<script>alert('Sorry, something went wrong. Please try again later.'); window.location.href = 'contact.html';</script>";
    }
}
?>
