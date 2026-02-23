<?php
// Set default timezone to local city (replace with your city if needed)
date_default_timezone_set('Asia/Kolkata'); // example current city

// Get current date and time for local city
$localDateTime = new DateTime('now', new DateTimeZone(date_default_timezone_get()));

// Get current date and time for Berlin
$berlinTZ = new DateTimeZone('Europe/Berlin');
$berlinDateTime = new DateTime('now', $berlinTZ);

// Calculate timezone offset difference in seconds
$localOffset = $localDateTime->getOffset();        // seconds from UTC
$berlinOffset = $berlinDateTime->getOffset();      // seconds from UTC
$offsetDiff = $localOffset - $berlinOffset;        // positive if local ahead of Berlin

// Convert offset difference to hours and minutes
$diffSign = ($offsetDiff >= 0) ? '+' : '-';
$diffSecondsAbs = abs($offsetDiff);
$diffHours = floor($diffSecondsAbs / 3600);
$diffMinutes = floor(($diffSecondsAbs % 3600) / 60);

// Output

echo "Local City (" . date_default_timezone_get() . ") Date and Time: " . $localDateTime->format('Y-m-d H:i:s') . "\n";
echo "Berlin Date and Time: " . $berlinDateTime->format('Y-m-d H:i:s') . "\n";
echo "Difference: " . $diffSign . $diffHours . " hours " . $diffMinutes . " minutes\n";
?>