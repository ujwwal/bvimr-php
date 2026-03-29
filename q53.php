<?php
$p=[
 ["n"=>"Rice","pr"=>50],
 ["n"=>"Oil","pr"=>120]
];
echo "<h3>Prabhdeep Megamart</h3><table border='1'><tr><th>Product</th><th>Price</th></tr>";
foreach($p as $x) echo "<tr><td>{$x['n']}</td><td>{$x['pr']}</td></tr>";
echo "</table><br>";
echo "Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051";
