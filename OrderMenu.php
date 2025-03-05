<?php
require_once 'config.php';

// ตรวจสอบว่าได้รับข้อมูลจากฟอร์มหรือไม่
$orderItems = [];
$totalAmount = 0;
$orderID = null;

session_start(); // เริ่ม session เพื่อตรวจสอบการเข้าสู่ระบบ

// ตรวจสอบว่า user_id ใน session มีหรือไม่
if (!isset($_SESSION['user_id'])) {
    echo "กรุณาล็อกอินเพื่อทำการสั่งซื้อ";
    exit();
}

// ตรวจสอบว่ามีการส่งข้อมูลจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'quantity_') === 0 && $value > 0) {
            // แยกชื่อเมนูจาก key
            $menuID = str_replace('quantity_', '', $key);

            // ดึงข้อมูลเมนูจากฐานข้อมูล
            $sql = "SELECT * FROM menu WHERE Menu_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $menuID);
            $stmt->execute();
            $result = $stmt->get_result();
            $menu = $result->fetch_assoc();

            // คำนวณราคา
            $quantity = (int)$value;
            $price = $menu['Price_menu'];
            $totalPrice = $quantity * $price;

            // เก็บข้อมูลอาหาร
            $orderItems[] = [
                'name' => $menu['Name_menu'],
                'quantity' => $quantity,
                'price' => $price,
                'total' => $totalPrice,
                'menuID' => $menuID,
                'picture' => $menu['Picture_menu'] // เก็บชื่อรูปภาพเมนูด้วย
            ];

            // คำนวณยอดรวม
            $totalAmount += $totalPrice;
        }
    }

    // ถ้ามีการสั่งซื้อ
    if ($totalAmount > 0) {
        // บันทึกคำสั่งซื้อ
        $sql = "INSERT INTO `order` (`User_id`, `Total_price`, `Time`) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $_SESSION['user_id'], $totalAmount); // ใช้ session สำหรับ User_id
        $stmt->execute();
        $orderID = $stmt->insert_id;

        // บันทึกรายละเอียดคำสั่งซื้อ
        foreach ($orderItems as $item) {
            $sql = "INSERT INTO `order_detail` (`Order_id`, `Name_menu`, `Price_menu`, `Picture_menu`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isds", $orderID, $item['name'], $item['price'], $item['picture']);
            $stmt->execute();
        }

        // การบันทึกเสร็จสิ้น ให้แสดงข้อความยืนยัน
        echo '<div class="confirmation-message">การสั่งซื้อของคุณสำเร็จแล้ว!</div>';
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สรุปรายการสั่งอาหาร</title>
    <link rel="stylesheet" href="css/stylesReseveMenu.css">
</head>
<body>
    <div class="navbar">
        <a href="Homepage.php">หน้าหลัก</a>
        <a href="menu.php">เมนู</a>
        <a href="reserveMenu.php">สั่งอาหาร</a>
        <a href="Reserve.php">จองโต๊ะ</a>
        <a href="Logout.php">ออกจากระบบ</a>
    </div>

    <h2>สรุปรายการสั่งอาหาร</h2>

    <form method="POST">
        <table border="1">
            <thead>
                <tr>
                    <th>ชื่อเมนู</th>
                    <th>จำนวน</th>
                    <th>ราคา</th>
                    <th>รวม</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderItems as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo number_format($item['price'], 2); ?> บาท</td>
                        <td><?php echo number_format($item['total'], 2); ?> บาท</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>ยอดรวม: <?php echo number_format($totalAmount, 2); ?> บาท</h3>

        <div class="order-button-container">
            <button type="submit" class="order-btn">ยืนยันการสั่งซื้อ</button>
        </div>
    </form>

</body>
</html>
