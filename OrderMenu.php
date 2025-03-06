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

// แสดง User ID ที่ใช้ในเซสชัน
$userId = $_SESSION['user_id'];

// ตรวจสอบว่า User_id มีอยู่ในตาราง user_member
$sql = "SELECT User_id FROM user_member WHERE User_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $userId);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    echo "User  ID ไม่ถูกต้อง";
    exit();
}

$stmt->close();

// ตรวจสอบว่ามีการส่ง selected_items มาหรือไม่
if (isset($_GET['selected_items'])) {
    $selectedItems = json_decode($_GET['selected_items'], true);
    
    if (!empty($selectedItems)) {
        $totalAmount = 0;

        foreach ($selectedItems as $item) {
            $menuId = $item['menu_id'];
            $quantity = $item['quantity'];

            // ดึงข้อมูลเมนูจากฐานข้อมูล
            $sql = "SELECT Name_menu, Price_menu FROM menu WHERE Menu_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $menuId);
            $stmt->execute();
            $stmt->bind_result($name, $price);
            $stmt->fetch();
            $stmt->close();

            // คำนวณราคาทั้งหมด
            $totalPrice = $price * $quantity;
            $totalAmount += $totalPrice;
        }

        // บันทึกคำสั่งซื้อในฐานข้อมูล
        $sql = "INSERT INTO orders (User_id, Total_price) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $userId, $totalAmount);
        if (!$stmt->execute()) {
            echo "เกิดข้อผิดพลาดในการบันทึกคำสั่งซื้อ: " . $stmt->error;
            exit();
        }
        $orderId = $stmt->insert_id; // ดึง Order_id ล่าสุด
        $stmt->close();

        // บันทึกข้อมูลใน order_detail
        foreach ($selectedItems as $item) {
            $menuId = $item['menu_id'];
            $quantity = $item['quantity'];

            // ดึงข้อมูลเมนูจากฐานข้อมูล
            $sql = "SELECT Name_menu, Price_menu FROM menu WHERE Menu_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $menuId);
            $stmt->execute();
            $stmt->bind_result($name, $price);
            $stmt->fetch();
            $stmt->close();

            // บันทึกข้อมูลใน order_detail
            $sql = "INSERT INTO order_detail (Order_id, Menu_id, Name_menu, Price_menu, Quantity) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iissi", $orderId, $menuId, $name, $price, $quantity);  // เพิ่ม Quantity
            if (!$stmt->execute()) {
                echo "เกิดข้อผิดพลาดในการบันทึกข้อมูลใน order_detail: " . $stmt->error;
                exit();
            }
            $stmt->close();
        }
    } else {
        echo "ไม่มีอาหารที่เลือก";
    }
} else {
    echo "ไม่มีข้อมูลคำสั่งซื้อ";
}

// ดึงเลขที่คำสั่งซื้อ (orderID) ล่าสุดของผู้ใช้
$orderID = null;
$sql = "SELECT order_id FROM orders WHERE User_id = ? ORDER BY order_id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($orderID);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบเสร็จการสั่งอาหาร</title>
    <link rel="stylesheet" href="css/styleOrder.css">
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

        body {
            font-family: 'Krub', sans-serif;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="menu.php">เมนู</a>
        <a href="reserveMenu.php">สั่งอาหาร</a>
        <a href="Reserve.php">จองโต๊ะ</a>
        <a href="Logout.php">ออกจากระบบ</a>
    </div>
    <div class="receipt-container">
        <div class="receipt-header">
            <h1>ใบเสร็จการสั่งอาหาร</h1>
            <p>ร้านอาหาร Thai Restaurant</p>
            <p>เลขที่คำสั่งซื้อ: <?php echo $orderID ? $orderID : "ไม่ระบุ"; ?></p>
        </div>
        
        <table class="receipt-table">
            <thead>
                <tr>
                    <th>ชื่อเมนู</th>
                    <th>จำนวน</th>
                    <th>ราคา</th>
                    <th>รวม</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($selectedItems)): ?>
                    <?php foreach ($selectedItems as $item): ?>
                    <tr>
                        <td><?php
                            // ดึงชื่อเมนูจากฐานข้อมูล
                            $menuId = $item['menu_id'];
                            $sql = "SELECT Name_menu FROM menu WHERE Menu_id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $menuId);
                            $stmt->execute();
                            $stmt->bind_result($name);
                            $stmt->fetch();
                            echo $name;
                            $stmt->close();
                        ?></td>
                        <td><?php echo $item['quantity']; ?> ชิ้น</td>
                        <td><?php
                            // ดึงราคาเมนูจากฐานข้อมูล
                            $sql = "SELECT Price_menu FROM menu WHERE Menu_id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $menuId);
                            $stmt->execute();
                            $stmt->bind_result($price);
                            $stmt->fetch();
                            echo number_format($price, 2);
                            $stmt->close();
                        ?> บาท</td>
                        <td><?php echo number_format($item['quantity'] * $price, 2); ?> บาท</td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">ไม่มีรายการอาหารที่สั่ง</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="receipt-footer">
        <h3>ยอดรวม: <?php echo number_format($totalAmount, 2); ?> บาท</h3>
        <p>ขอบคุณที่ใช้บริการ!</p>
        <!-- ปุ่มชำระเงิน --> 
        <div class="order-button-container">
            <!-- ฟอร์มสำหรับส่งข้อมูลไปยัง payment.php -->
            <form action="payment.php" method="POST">
                <input type="hidden" name="order_id" value="<?php echo $orderID; ?>">
                <button type="submit" class="order-btn">ชำระเงิน</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
