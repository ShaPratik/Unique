<?php
include "db.php";

if (!isset($_POST['table_no'])) {
    die("❌ Invalid access. Please go back to the menu page.");
}

$table = $_POST['table_no'];

$menu = [
    "Sadi_Pani_Puri" => 30,
    "Dahi_Puri" => 50,
    "Sev_Puri" => 50,
    "Cheese_Pani_Puri" => 60,
    "Manchurian" => 50,
    "Manchurian_Nudelsee" => 60,
    "Pav_Bhaji" => 80,
    "Pulav" => 70,
    "Butter_Pav_Bhaji" => 100,
    "Cheese_Pav_Bhaji" => 120,
    "Vadapav" => 20,
    "Cheese_Vadapav" => 35,
    "Dabeli" => 20,
    "Puff" => 20,
    "Cheese_Puff" => 35,
    "Patti_Sada_Samosa" => 30,
    "Cheese_Patti_Samosa" => 40,
    "Sprite" => 20,
    "Coca_Cola" => 20,
    "Fanta" => 20,
    "Thumbs_Up" => 20,
    "Charged" => 20,
    "Limca" => 20,
    "Maza" => 20,
    "Rim_Zim" => 20,
    "Water_Bottle" => 20,
    "Pepsi" => 20,
    "Fruti" => 10
];

$items = [];
$total = 0;

foreach ($menu as $item => $price) {
    $qty = $_POST[$item] ?? 0;
    if ($qty > 0) {
        $items[] = "$item x $qty = ₹" . ($price * $qty);
        $total += $price * $qty;
    }
}

if (empty($items)) {
    die("⚠️ No items selected. <a href='order.php?table=$table'>Go back</a>");
}

$item_list = implode(", ", $items);

$sql = "INSERT INTO orders (table_no, items, total) VALUES ('$table', '$item_list', '$total')";
$conn->query($sql);

echo "<h2>✅ Order Placed!</h2>";
echo "<p>Table No: $table</p>";
echo "<p>Items: $item_list</p>";
echo "<p><strong>Total: ₹$total</strong></p>";
echo "<a href='order.php?table=$table'>Back to Menu</a>";
?>
