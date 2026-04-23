<?php
// Q64: Write a PHP code to demonstrate writing data into a file.
$f=fopen("q64.txt","w");

fwrite($f,"Hello File");

fclose($f);

echo "Data written";

echo "<br>";

echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
?>
