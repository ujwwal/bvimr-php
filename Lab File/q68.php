<?php
// Q68. Employee salary calculator
$basic = 50000;
$hra = $basic * 0.20;
$da = $basic * 0.10;
$gross = $basic + $hra + $da;
$tax = $gross * 0.10;
$net = $gross - $tax;
$salary = ["Basic Salary" => $basic, "HRA (20%)" => $hra, "DA (10%)" => $da, "Gross Salary" => $gross, "Tax (10%)" => $tax, "Net Salary" => $net];
echo "<table border='1'>";
foreach($salary as $key => $val) {
    echo "<tr><td>$key</td><td>$val</td></tr>";
}
echo "</table>";
echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
?>
