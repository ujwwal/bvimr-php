<?php
require 'config.php';
require 'functions.php';
require 'MyClass.php';

echo "<h2>PHP Utility Library Demo</h2>";

// Config usage
echo "<b>App:</b> " . $config['app_name'] . " v" . $config['version'] . "<br><br>";

// Functions demo
$name  = sanitize("  <b>Ujjwal</b>  ");
$total = calculateTotal(500, 3);
logMessage("Demo run at " . date('H:i:s'));

echo "<b>Sanitized:</b> $name<br>";
echo "<b>Total (500 x 3):</b> Rs. $total<br>";
echo "<b>Log written:</b> app.log<br><br>";

// OOP demo
$obj = new MyClass();
$obj->set('name', 'Ujjwal');
$obj->set('course', 'BCA');

echo "<b>Object Data:</b><br>";
foreach ($obj->getAll() as $k => $v) {
    echo "$k: $v<br>";
}
?>











