<?php
// ตรวจสอบว่าได้ส่งข้อมูล order_id มาหรือไม่
if (isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    // สามารถใช้ order_id นี้ในการดึงข้อมูลคำสั่งซื้อจากฐานข้อมูล หรือเชื่อมต่อกับระบบการชำระเงิน
    // เช่น API หรือ QR code generator สำหรับการชำระเงิน
} else {
    echo "ไม่พบข้อมูลคำสั่งซื้อ!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน</title>
    <link rel="stylesheet" href="css/stylesReseveMenu.css">
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@300;400;500&family=Thasadith:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Krub', sans-serif;
            text-align: center;
        }

        .qr-container {
            margin-top: 20px;
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

        .navbar {
            background-color: rgb(239, 70, 18);
            overflow: hidden;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            z-index: 999;
        }

        .navbar a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            flex-grow: 1;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>

<body>

    <!-- แถบเมนูด้านบน -->
    <div class="navbar">
        <!-- <a href="Homepage.php">หน้าหลัก</a> -->
        <a href="menu.php">เมนู</a>
        <a href="reserveMenu.php">สั่งอาหาร</a>
        <a href="Reserve.php">จองโต๊ะ</a>
        <a href="orderHistory.php">ประวัติการสั่งอาหาร</a>
        <a href="Logout.php">ออกจากระบบ</a>
    </div>
    <br><br>
    <h1>การชำระเงิน</h1>
    <p>เลขที่คำสั่งซื้อ: <?php echo $orderId; ?></p>

    <!-- แสดงคิวอาโค้ดสำหรับการชำระเงิน -->
    <div class="qr-container">
        <p>กรุณาสแกนคิวอาโค้ดเพื่อทำการชำระเงิน:</p>
        <!-- QR Code สำหรับการชำระเงิน -->
        <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo urlencode('https://paymentgateway.com/pay?order_id=' . $orderId); ?>&size=200x200" alt="QR Code" />
    </div>
    <br><br>
    <!-- ปุ่มยืนยันการชำระเงิน -->
    <div class="order-button-container">
        <form action="orderHistory.php" method="POST">
            <input type="hidden" name="order_id" value="<?php echo $orderId; ?>">
            <button type="submit" class="order-btn">ยืนยันการชำระเงิน</button>
        </form>
    </div>

    <div class="order-button-container">
        <!-- <button class="order-btn" onclick="window.location.href='orderHistory.php'">ดูประวัติการสั่งซื้อ</button> -->
    </div>

</body>

</html>