<?php
// Retrieve the XML data from the POST request
$xml_data = file_get_contents('php://input');

echo "Script is executing.";


// Log the received XML data to a file for debugging
file_put_contents('form_submission.log', $xml_data . "\n", FILE_APPEND);

// Process the XML data as needed (e.g., send email, save to database)
// Example: Sending email
$to = "stijnhemeltjen7@gmail.com"; // Your email address
$subject = "Form Submission"; // Email subject
$message = "You received a form submission:\n\n" . $xml_data; // Email body
$headers = "From: webmaster@example.com" . "\r\n" .
           "Reply-To: webmaster@example.com" . "\r\n" .
           "X-Mailer: PHP/" . phpversion();

// Send the email
mail($to, $subject, $message, $headers);
?>
