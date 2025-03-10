<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: Login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "thai_restaurant");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = '
    SELECT 
        orders.Order_id,
        user_member.Name_member,
        orders.Total_price
    FROM 
        orders
    LEFT JOIN 
        user_member
        ON user_member.User_id = orders.User_id
    ORDER BY 
        orders.Order_id DESC
';
$result = $conn->query($sql);
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
        <div class="w-full flex flex-row justify-between items-end">
            <p class="pt-10 underline text-4xl font-medium">Order History</p>
            <a href="./menu.php" class="w-60">
            <button type="button" class="w-60 bg-green-700 rounded-lg py-3 text-white">
                Back to menu
            </button>
        </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</hr>
                    <th class="w-60 text-center">Total Price</hr>
                    <th class="w-96">Created By</hr>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="hover:bg-gray-100 cursor-pointer"
                onclick="window.location.href='./orderDetailHistory.php?order_id=<?php echo $row['Order_id']; ?>'"
                >
                    <td><?php echo $row['Order_id']; ?></td>
                    <td class=" text-center"><?php echo $row['Total_price']; ?></td>
                    <td><?php echo $row['Name_member']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?
    $result->free_result();
?>