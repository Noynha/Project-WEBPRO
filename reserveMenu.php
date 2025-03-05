<?php
require_once 'config.php';

// เริ่มต้น session เพื่อดึงค่า User_id
session_start();

// ตรวจสอบว่า User_id ถูกตั้งใน session หรือไม่
if (!isset($_SESSION['User_id'])) {
    echo "กรุณาล็อกอินก่อนทำการสั่งซื้อ";
    exit();
}

// ดึงค่า User_id จาก session
$userId = $_SESSION['User_id'];

// เช็คการเชื่อมต่อฐานข้อมูล
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

// ตรวจสอบผลลัพธ์ของ query
if ($result === false) {
    echo "เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: " . $conn->error;
    exit();
}

// การประมวลผลการส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ทำการวนลูปข้อมูลที่ส่งมาจากฟอร์ม
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'quantity_') === 0) {
            // ดึง Menu_id จาก input ของฟอร์ม
            $menuId = str_replace('quantity_', '', $key);
            $quantity = (int) $value;

            // หากจำนวนที่สั่งมากกว่าศูนย์
            if ($quantity > 0) {
                // ดึงข้อมูลเมนูจากฐานข้อมูล
                $sql = "SELECT * FROM menu WHERE Menu_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $menuId);
                $stmt->execute();
                $menuResult = $stmt->get_result();
                $menu = $menuResult->fetch_assoc();

                // คำนวณราคาทั้งหมดของเมนู
                $totalPrice = $menu['Price_menu'] * $quantity;

                // แทรกคำสั่งซื้อเข้าสู่ฐานข้อมูล (ตาราง orders)
                $sql = "INSERT INTO orders (Menu_id, Quantity, Total_price, User_id) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iiii", $menuId, $quantity, $totalPrice, $userId);
                $stmt->execute();
            }
        }
    }

    // แสดงข้อความยืนยันการสั่งซื้อ
    echo "คำสั่งซื้อของคุณได้รับการบันทึกแล้ว!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านอาหาร</title>
    <link rel="stylesheet" href="css/stylesReseveMenu.css">
    <style>
        .order-button-container {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
        }
        .order-btn {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .order-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    
    <div class="navbar">
        <a href="Homepage.php">หน้าหลัก</a>
        <a href="menu.php">เมนู</a>
        <a href="reserveMenu.php">สั่งอาหาร</a>
        <a href="Reserve.php">จองโต๊ะ</a>
        <a href="Logout.php">ออกจากระบบ</a>
    </div>

    <div class="container">
        <h2>เมนูอาหาร</h2>

        <form action="orderMenu.php" method="POST">
            <?php
            if ($result->num_rows > 0) {
                // แสดงเมนู
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="menu-item">';
                    echo '<img src="' . $row['Picture_menu'] . '" alt="' . $row['Name_menu'] . '">';
                    echo '<div class="menu-item-details">';
                    echo '<h3>' . $row['Name_menu'] . '</h3>';
                    echo '<p>ราคา: ' . number_format($row['Price_menu'], 2) . ' บาท</p>';
                    echo '<p>' . $row['Explanation_menu'] . '</p>';
                    echo '</div>';
                    echo '<div class="quantity-controls">';
                    echo '<button type="button" class="decrease-btn">-</button>';
                    echo '<input type="number" name="quantity_' . $row['Menu_id'] . '" value="0" class="quantity" min="0" step="1" />';
                    echo '<button type="button" class="increase-btn">+</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "ไม่พบเมนูอาหารในฐานข้อมูล";
            }
            ?>
            <div class="order-button-container">
                <button type="submit" class="order-btn">สั่งอาหาร</button>
            </div>
        </form>
    </div>

    <script>
        document.querySelectorAll('.decrease-btn').forEach(button => {
            button.addEventListener('click', function() {
                let inputField = this.nextElementSibling;
                let currentValue = parseInt(inputField.value);
                if (currentValue > 0) {
                    inputField.value = currentValue - 1;
                }
            });
        });

        document.querySelectorAll('.increase-btn').forEach(button => {
            button.addEventListener('click', function() {
                let inputField = this.previousElementSibling;
                let currentValue = parseInt(inputField.value);
                inputField.value = currentValue + 1;
            });
        });
    </script>

</body>
</html>
