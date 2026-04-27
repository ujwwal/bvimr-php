<?php
$name    = trim($_POST['name'] ?? '');
$product = trim($_POST['product'] ?? '');
$price   = floatval($_POST['price'] ?? 0);
$qty     = intval($_POST['qty'] ?? 0);

if (!$name || !$product || $price <= 0 || $qty <= 0) {
    die("Invalid input. <a href='index.html'>Go back</a>");
}

$total = $price * $qty;

$order = date('Y-m-d H:i:s') . " | $name | $product | Price:$price | Qty:$qty | Total:$total\n";
file_put_contents('orders.txt', $order, FILE_APPEND);

echo "Order placed!<br>";
echo "Customer: $name<br>";
echo "Product: $product<br>";
echo "Total: Rs. $total<br>";
echo "<a href='index.html'>Place another</a> | <a href='admin.php'>View orders</a>";
?>
