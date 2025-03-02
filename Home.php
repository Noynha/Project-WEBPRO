<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root"; // แก้ไขตามที่ใช้จริง
$password = ""; // แก้ไขตามที่ใช้จริง
$dbname = "thai_restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลเมนูจากฐานข้อมูล
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เมนูอาหาร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-4">ยินดีต้อนรับ <?php echo htmlspecialchars($_SESSION["username"]); ?></h2>
    <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>

    <h3 class="mt-4">เมนูอาหาร</h3>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="images/<?php echo htmlspecialchars($row['Picture_menu'] ?: 'default.jpg'); ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['Name_menu']); ?></h5>
                        <p class="card-text text-danger">ราคา ฿<?php echo number_format($row['Price_menu']); ?></p>
                        <button class="btn btn-primary">สั่งซื้อ</button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
