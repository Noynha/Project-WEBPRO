<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: Login.php");
    exit();
}

require_once 'config.php';

$conn = new mysqli("localhost", "root", "", "thai_restaurant");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Name_menu, Price_menu, Picture_menu FROM menu";
$result = $conn->query($sql);

$username = isset($_SESSION["username"]) ? $_SESSION["username"] : "Guest";

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class='mt-4'>ยินดีต้อนรับ <?php htmlspecialchars($username) ?></h2>
    <a href='Logout.php' class='btn btn-danger'>ออกจากระบบ</a>

    <h3 class='mt-4'>เมนูอาหาร</h3>
    <div class='row'>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class='col-md-4'>
                <div class='card mb-3'>
                    <img src='images/<?= htmlspecialchars($row["Picture_menu"]) ?>' class='card-img-top' alt='<?= htmlspecialchars($row["Name_menu"]) ?>'>
                    <div class='card-body'>
                        <h5 class='card-title'><?= htmlspecialchars($row["Name_menu"]) ?></h5>
                        <p class='card-text text-danger'>ราคา ฿<?= htmlspecialchars($row["Price_menu"]) ?></p>
                        <button class='btn btn-primary'>สั่งซื้อ</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>
