<?php
// functions.php - Reusable utility functions

function sanitize($input) {
    return htmlspecialchars(trim($input));
}

function calculateTotal($price, $qty) {
    return $price * $qty;
}

function logMessage($msg, $file = 'app.log') {
    file_put_contents($file, date('Y-m-d H:i:s') . " - $msg\n", FILE_APPEND);
}

function isEmptyOrNull($value) {
    return is_null($value) || trim($value) === '';
}
