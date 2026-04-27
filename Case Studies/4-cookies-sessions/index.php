<?php
session_start();

// Set cookie for user preference (theme), expires in 1 day
if (!isset($_COOKIE['theme'])) {
    setcookie('theme', 'light', time() + 86400);
}

$theme = $_COOKIE['theme'] ?? 'light';
echo "Theme preference (cookie): $theme<br><br>";

echo "<h2>Order Form</h2>";
echo "<form action='cart.php' method='POST'>";
echo "Product: <input type='text' name='product' required><br><br>";
echo "Price: <input type='number' name='price' required min='1'><br><br>";
echo "Qty: <input type='number' name='qty' required min='1'><br><br>";
echo "<input type='submit' value='Add to Cart'>";
echo "</form>";
echo "<br><a href='summary.php'>View Cart & Checkout</a>";
?>
