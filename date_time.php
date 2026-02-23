<?php
// Set default timezone to local city (replace with your city if needed)
date_default_timezone_set('Asia/Kolkata'); // example current city

// Get current date and time for local city
$localDateTime = new DateTime('now', new DateTimeZone(date_default_timezone_get()));

// Get current date and time for Berlin
$berlinTZ = new DateTimeZone('Europe/Berlin');
$berlinDateTime = new DateTime('now', $berlinTZ);

// Calculate difference
$interval = $localDateTime->diff($berlinDateTime);

// Output
echo "Local City (" . date_default_timezone_get() . ") Date and Time: " . $localDateTime->format('Y-m-d H:i:s') . "\n";
echo "Berlin Date and Time: " . $berlinDateTime->format('Y-m-d H:i:s') . "\n";
echo "Difference: ";
echo $interval->format('%R%h hours %i minutes');
?>