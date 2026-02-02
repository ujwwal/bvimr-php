<!DOCTYPE html>
<html>
<body>

<?php
$cars = array("Volvo", "BMW", "Toyota");
sort($cars);

$clength = count($cars);
for($x = 0; $x < $clength; $x++) {
  echo $cars[$x];
  echo "<br>";
}
echo "This program is written by Ujjwal Gupta , ERP: 0231BCA051 of BVMIR";
?>

</body>
</html>
