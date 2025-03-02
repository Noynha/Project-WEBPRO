<?php
// กำหนดค่าการเชื่อมต่อฐานข้อมูล
$host = 'localhost';
$dbname = 'restaurant_booking';
$username = 'root';
$password = '';

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

        echo "จองโต๊ะสำเร็จแล้ว! เราจะติดต่อคุณเร็วๆ นี้";
    }
} catch (PDOException $e) {
    echo "การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage();
}
?>