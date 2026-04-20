<?php
// Q63: Write a PHP code to demonstrate reading of data from file using fgets().
$f=fopen("q63.txt","r");

echo fgets($f);

fclose($f);

echo "<br>";

echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
?>
