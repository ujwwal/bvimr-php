<?php
// Q69. Create array of city names, sort alphabetically, display sorted list, and show cities starting with D
$cities = ["Mumbai", "Delhi", "Pune", "Dehradun", "Bangalore"];
sort($cities);
echo "Sorted Cities: " . implode(", ", $cities) . "<br>";
echo "Cities starting with D: ";
foreach($cities as $city) {
    if(substr($city, 0, 1) === "D") {
        echo "$city ";
    }
}
echo "<br>";
echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
?>
