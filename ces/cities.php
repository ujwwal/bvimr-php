<?php
$cities = array("Delhi", "Mumbai", "Chennai", "Dehradun", "Bangalore", "Dubai", "Kolkata");

sort($cities);

echo "<h2>Sorted Cities</h2>";
foreach ($cities as $city) {
    echo $city . "<br>";
}

echo "<h2>Cities starting with 'D'</h2>";
foreach ($cities as $city) {
    if (stripos($city, "D") === 0) {
        echo $city . "<br>";
    }
}
?>