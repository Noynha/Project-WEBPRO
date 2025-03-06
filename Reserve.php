<?php

// require_once 'config.php';

// กำหนดค่าการเชื่อมต่อฐานข้อมูล
$host = 'localhost';
$dbname = "thai_restaurant";
$username = 'root';
$password = '';

$successMessage = ''; // ตัวแปรสำหรับเก็บข้อความการจองสำเร็จ

try {
    // เชื่อมต่อฐานข้อมูล
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ตรวจสอบข้อมูลที่ได้รับจากฟอร์ม
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $reservation_date = $_POST['reservation_date'];
        $reservation_time = $_POST['reservation_time'];
        $num_people = $_POST['num_people'];

        // กำหนดเวลาที่สามารถจองได้
        $valid_times = [
            "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", 
            "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30", "19:00", 
            "19:30", "20:00", "20:30", "21:00", "21:30"
        ];

        // เตรียมคำสั่ง SQL เพื่อบันทึกข้อมูลการจอง
        $stmt = $pdo->prepare("INSERT INTO reservations (name, phone, reservation_date, reservation_time, num_people) 
                               VALUES (:name, :phone, :reservation_date, :reservation_time, :num_people)");

        // ผูกค่ากับคำสั่ง SQL
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':reservation_date', $reservation_date);
        $stmt->bindParam(':reservation_time', $reservation_time);
        $stmt->bindParam(':num_people', $num_people);

        // ดำเนินการคำสั่ง
        $stmt->execute();

        // กำหนดข้อความหลังจากจองสำเร็จ
        $successMessage = "จองโต๊ะสำเร็จแล้ว! เราจะติดต่อคุณเร็วๆ นี้";
    }
} catch (PDOException $e) {
    echo "การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองโต๊ะอาหาร</title>
    <link rel="stylesheet" href="css/styleReserve.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Thasadith:ital,wght@0,400;0,700;1,400;1,700&display=swap');

        
        /* เพิ่ม CSS สำหรับการแสดงข้อความ */
        .success-message {
            font-family: 'Krub', sans-serif;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            font-size: 18px;
            display: <?php echo ($successMessage ? "block" : "none"); ?>; /* แสดงข้อความเมื่อจองสำเร็จ */
        }
    </style>
</head>
<body>

    <div class="navbar">
        <!-- <a href="Homepage.php">หน้าหลัก</a> -->
        <a href="menu.php">เมนู</a>
        <a href="reserveMenu.php">สั่งอาหาร</a>
        <a href="Reserve.php">จองโต๊ะ</a>
        <a href="orderHistory.php">ประวัติการสั่งอาหาร</a>
        <a href="Logout.php">ออกจากระบบ</a>
    </div>

    <div class="container">
        <h2>การจองโต๊ะอาหาร</h2>
        <form action="" method="POST">
            <label for="name">ชื่อผู้จอง:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="phone">เบอร์โทร:</label>
            <input type="text" id="phone" name="phone" required><br>

            <label for="date">วันที่จอง:</label>
            <input type="date" id="date" name="reservation_date" required><br>

            <label for="time">เวลา:</label>
            <select id="reservation_time" name="reservation_time" required>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
            </select>

            <label for="num_people">จำนวนคน:</label>
            <input type="number" id="num_people" name="num_people" required min="1"><br>

            <input type="submit" value="จองโต๊ะ">
        </form>
    </div>

    <!-- ข้อความการจองสำเร็จ -->
    <div class="success-message">
        <?php echo $successMessage; ?>
    </div>
</body>
</html>
