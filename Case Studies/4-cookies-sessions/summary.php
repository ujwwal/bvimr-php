<?php
session_start();

echo "<h2>Order Summary</h2>";

if (empty($_SESSION['cart'])) {
    echo "Cart is empty. <a href='index.php'>Go back</a>";
} else {
    $grand = 0;
    foreach ($_SESSION['cart'] as $i => $item) {
        echo ($i+1) . ". " . htmlspecialchars($item['product']);
        echo " | Price: " . $item['price'];
        echo " | Qty: " . $item['qty'];
        echo " | Total: Rs. " . $item['total'] . "<br>";
        $grand += $item['total'];
    }
    echo "<br><b>Grand Total: Rs. $grand</b><br><br>";
    echo "<a href='confirm.php'>Confirm Order</a>";
}
?>
