<?php
// Q66. Jewelry store weekly Gold/Silver/Diamond rates using array + foreach
$rates = ["Gold" => 70000, "Silver" => 80000, "Diamond" => 150000];
$sum = 0; $high = 0; $low = PHP_INT_MAX;
foreach($rates as $metal => $rate) {
    echo "$metal Rate: $rate<br>";
    $sum += $rate;
    if($rate > $high) $high = $rate;
    if($rate < $low) $low = $rate;
}
$avg = $sum / count($rates);
echo "Highest: $high, Lowest: $low, Average: $avg<br>";
echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
?>
