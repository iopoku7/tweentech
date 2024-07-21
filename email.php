<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // input data
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email configuration
        $to = "isaacopoku852@gmail.com"; // Replace with your email address
        $subject = "New Contact Form Submission";
        $headers = "From: " . $email . "\r\n" .
                   "Reply-To: " . $email . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        
        $email_message = "Name: " . $name . "\n";
        $email_message .= "Email: " . $email . "\n";
        $email_message .= "Message: " . $message . "\n";

        
        if (mail($to, $subject, $email_message, $headers)) {
            echo "Thank you for your message. It has been sent.";
        } else {
            echo "Sorry, there was an error sending your message. Please try again later.";
        }
    } else {
        echo "Invalid input. Please go back and try again.";
    }
} else {
    echo "Invalid request method.";
}
?>

