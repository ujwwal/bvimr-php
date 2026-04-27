<?php
echo "<h2>All Orders</h2>";
if (!file_exists('orders.txt')) {
    echo "No orders yet.";
} else {
    $lines = file('orders.txt');
    echo "<pre>";
    foreach ($lines as $i => $line) {
        echo ($i+1) . ". " . htmlspecialchars($line);
    }
    echo "</pre>";
}
echo "<a href='index.html'>Back to form</a>";
?>
