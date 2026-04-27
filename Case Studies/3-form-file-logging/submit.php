<?php
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate
if (!$name || !filter_var($email, FILTER_VALIDATE_EMAIL) || !$message) {
    die("Invalid input. <a href='form.html'>Go back</a>");
}

// Sanitize
$name    = htmlspecialchars($name);
$email   = htmlspecialchars($email);
$message = htmlspecialchars($message);

// Log to file
$log = date('Y-m-d H:i:s') . " | Name: $name | Email: $email | Message: $message\n";
file_put_contents('submissions.log', $log, FILE_APPEND);

echo "Form submitted successfully!<br>";
echo "Name: $name<br>";
echo "Email: $email<br>";
echo "Message: $message<br><br>";
echo "<a href='form.html'>Submit another</a>";
?>
