<?php
// Q62: Write a PHP code to open a file.
$f=fopen("q62.txt","r");

if($f) echo "File opened";

fclose($f);

echo "<br>";

echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
?>
