<?php
require_once 'config.php';
session_start();
$orderId = $_GET['order_id'];

if (!isset($_SESSION["user_id"])) {
    header("Location: Login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "thai_restaurant");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("
SELECT 
    order_detail.Name_menu, 
    order_detail.Price_menu, 
    order_detail.Quantity 
FROM 
    order_detail 
LEFT JOIN orders ON orders.Order_id = order_detail.Order_id 
WHERE 
    orders.Order_id = ?
");
$stmt->bind_param("i", $orderId);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    echo "No result of this commands:" . $sql;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex flex-col gap-10 w-[60%] mx-auto">
        <p class="pt-10 underline text-4xl font-medium">Order History</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Menu</hr>
                    <th class="w-60 text-center">Price</hr>
                    <th class="w-60">Qty</hr>
                    <th class="w-60">Total Price</hr>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="hover:bg-gray-100 cursor-pointer">
                    <td><?php echo $row['Name_menu']; ?></td>
                    <td class=" text-center"><?php echo $row['Price_menu']; ?></td>
                    <td><?php echo $row['Quantity']; ?></td>
                    <td class=" text-center"><?php echo $row['Price_menu'] * $row['Quantity']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="./orderHistory.php" class="w-full">
            <button type="button" class="w-full bg-green-700 rounded-lg py-3 text-white">
                Back
            </button>
        </a>
    </div>
</body>
</html>