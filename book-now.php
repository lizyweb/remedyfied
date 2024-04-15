<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // Retrieve form data
        $name = htmlspecialchars($_POST['name']);
        $age = htmlspecialchars($_POST['age']);
        $gender = htmlspecialchars($_POST['gender']);
        $phone = htmlspecialchars($_POST['phone']);
        $address = htmlspecialchars($_POST['address']);
        $condition = htmlspecialchars($_POST['condition']);
        $timings = htmlspecialchars($_POST['timings']);
        $comments = htmlspecialchars($_POST['comments']);

        $subject = 'Remedyfied Booking Request'; // Define your email subject

        $mail->Host = 'mail.lizyweb.com';
        $mail->Username = 'smt@lizyweb.com';
        $mail->Password = 'Lizyweb@123';

        $mail->setFrom('smt@lizyweb.com', $name);
        $mail->addAddress('mohammadashif0045@gmail.com');
        $mail->Subject = $subject;

        // Create the HTML message
        $message = "Name: $name<br />";
        $message .= "Age: $age<br />";
        $message .= "Gender: $gender<br />";
        $message .= "Phone: $phone<br />";
        $message .= "Address: $address<br />";
        $message .= "Condition: $condition<br />";
        $message .= "Preferable Timings: $timings<br />";
        $message .= "Comments: $comments";

        $mail->MsgHTML($message);

        // Send the email
        if ($mail->Send()) {
            echo "<fieldset>";
            echo "<div id='success_page'>";
            echo "<h1>Your Booking Request Sent Successfully.</h1>";
            echo "<p>Thank you <strong>$name</strong>, your booking request has been submitted. We will contact you shortly.</p>";
            echo "</div>";
            echo "</fieldset>";

            echo '<a href="index.html">Return to Home</a>';
        } else {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Mailer Error: " . $e->getMessage();
    }
} else {
    // Handle the case where the form is not submitted
    echo "Form not submitted.";
}
?>
