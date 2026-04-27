<?php
// Q67. Nested loop pattern
$num = 0;
for($i = 1; $i <= 4; $i++) {
    for($j = 1; $j <= $i; $j++) {
        echo $num;
        $num++;
    }
    echo "<br>";
}
echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
?>
