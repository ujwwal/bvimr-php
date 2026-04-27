<?php
// Q65. Customized birthday message using PHP built-in date/time functions.
$bday = mktime(0,0,0,8,15,date("Y"));
$today = time();
$diff = ($bday - $today);
if($diff < 0) $diff = mktime(0,0,0,8,15,date("Y")+1) - $today;
$days = (int)($diff/86400);
echo "Your next birthday is in $days days. Advance Happy Birthday!<br>";
echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
?>
