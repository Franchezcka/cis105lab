<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Smart Receipt</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    font-family: 'Poppins', sans-serif;
    display: flex;
    height: 100vh;
    align-items: center;
    justify-content: center;
    margin: 0;
    padding: 20px;
}

.card {
    background: white;
    padding: 25px;
    width: 380px;
    border-radius: 15px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.title {
    text-align: center;
    font-weight: 700;
    margin-bottom: 15px;
    font-size: 1.4rem;
}

.receipt {
    border-top: 2px dashed #ccc;
    padding-top: 15px;
}

.line {
    display: flex;
    justify-content: space-between;
    margin: 8px 0;
    font-size: 0.95rem;
}

.label {
    font-weight: 500;
    color: #333;
}

.value {
    font-weight: 500;
    color: #1e2a3e;
    text-align: right;
}

.total {
    font-weight: 700;
    border-top: 1px solid #ddd;
    margin-top: 10px;
    padding-top: 10px;
}

.total .label,
.total .value {
    font-weight: 700;
    font-size: 1rem;
}

.thankyou {
    text-align: center;
    margin-top: 18px;
    font-size: 0.85rem;
    color: #2c5f8a;
    border-top: 1px solid #eee;
    padding-top: 12px;
}
</style>
</head>

<body>

<div class="card">
<div class="title">🧾 Smart Receipt</div>

<div class="receipt">
<?php
$name = "                    Kakashi hatake             ";
$item = "             Laptop                            ";
$quantity = 3;
$price = 59999.99;
$card = '123409912316591';

$cleanName = trim($name);
$cleanItem = trim($item);

$cleanName = strtoupper($cleanName);
$cleanItem = strtoupper($cleanItem);

$total = $price * $quantity;

$vat = $total * 0.12;

$grandTotal = $total + $vat;

$formattedPrice = "Php " . number_format($price, 0);
$formattedTotal = "Php " . number_format($total, 0);
$formattedVAT = "Php " . number_format($vat, 2);
$formattedGrandTotal = "Php " . number_format($grandTotal, 2);

$cardNumber = (string)$card;

$firstTwo = substr($cardNumber, 0, 2);

$lastFour = substr($cardNumber, -4);

$middleCount = strlen($cardNumber) - 6;

$middleStars = str_repeat('*', $middleCount);

$maskedCard = $firstTwo . $middleStars . $lastFour;

echo '<div class="line">';
echo '<span class="label">CUSTOMER</span>';
echo '<span class="value">' . $cleanName . '</span>';
echo '</div>';

echo '<div class="line">';
echo '<span class="label">ITEM</span>';
echo '<span class="value">' . $cleanItem . '</span>';
echo '</div>';

echo '<div class="line">';
echo '<span class="label">PRICE</span>';
echo '<span class="value">' . $formattedPrice . '</span>';
echo '</div>';

echo '<div class="line">';
echo '<span class="label">QTY</span>';
echo '<span class="value">' . $quantity . '</span>';
echo '</div>';

echo '<div class="line">';
echo '<span class="label">TOTAL</span>';
echo '<span class="value">' . $formattedTotal . '</span>';
echo '</div>';

echo '<div class="line">';
echo '<span class="label">VAT (12%)</span>';
echo '<span class="value">' . $formattedVAT . '</span>';
echo '</div>';

echo '<div class="line">';
echo '<span class="label">CARD</span>';
echo '<span class="value">' . $maskedCard . '</span>';
echo '</div>';

echo '<div class="line total">';
echo '<span class="label">GRAND TOTAL</span>';
echo '<span class="value">' . $formattedGrandTotal . '</span>';
echo '</div>';

echo '<div class="thankyou">';
echo 'Thank you for your purchase!';
echo '</div>';

?>
</div>
</div>

</body>
</html>