<?php
session_start();
session_destroy(); // Clear session after order confirmed
echo "Order confirmed! Thank you.<br>";
echo "<a href='index.php'>Place new order</a>";
?>
