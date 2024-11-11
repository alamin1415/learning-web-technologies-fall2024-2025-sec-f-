<?php

$amount = 1000;  
$vat_rate = 0.15;  

$vat_amount = $amount * $vat_rate;

$total_amount = $amount + $vat_amount;

echo "Amount: " . $amount . "<br>";
echo "VAT Rate: " . ($vat_rate * 100) . "%<br>";
echo "VAT Amount: " . $vat_amount . "<br>";
echo "Total Amount (including VAT): " . $total_amount . "<br>";

?>
