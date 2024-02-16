<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Laad de PHPMailer-autoloader
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verwerk het formulier en ontvang de gegevens

    // Maak een nieuwe PHPMailer-instantie aan
    $mail = new PHPMailer(true);

    try {
        // Stel SMTP-instellingen in
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your@example.com';
        $mail->Password = 'your_password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Stel afzender en ontvanger in
        $mail->setFrom('your@example.com', 'Your Name');
        $mail->addAddress('recipient@example.com', 'Recipient Name');

        // Stel e-mailonderwerp en bericht in
        $mail->Subject = 'Nieuw bericht van ' . $_POST['name'];
        $mail->Body = "Naam: {$_POST['name']}\nBedrijf: {$_POST['company-name']}\nTelefoonnummer: {$_POST['telephone']}\nE-mailadres: {$_POST['email']}\nBericht:\n{$_POST['message']}";

        // Verzend de e-mail
        $mail->send();

        // Stuur gebruiker door naar een bedankpagina
        header('Location: contact.html');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Als het formulier niet is verzonden, stuur de gebruiker door naar de contactpagina
    header('Location: contact.html');
}
?>
