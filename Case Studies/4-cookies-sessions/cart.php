<?php
session_start();

$product = trim($_POST['product'] ?? '');
$price   = floatval($_POST['price'] ?? 0);
$qty     = intval($_POST['qty'] ?? 0);

if (!$product || $price <= 0 || $qty <= 0) {
    die("Invalid input. <a href='index.php'>Go back</a>");
}

// Store in session cart
$_SESSION['cart'][] = [
    'product' => $product,
    'price'   => $price,
    'qty'     => $qty,
    'total'   => $price * $qty,
];

echo "Added to cart: $product (Qty: $qty)<br>";
echo "<a href='index.php'>Add more</a> | <a href='summary.php'>View Cart</a>";
?>
