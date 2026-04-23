<?php
// Q48: WAP to store & display the first 10 factors of 4200 using array.
$n=4200;

$a=[];

for($i=1;$i<=$n and count($a)<10;$i++) if($n%$i==0) $a[]=$i;

print_r($a);

echo "<br>";

echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
?>
