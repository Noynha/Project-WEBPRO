<?php
session_start(); // เริ่มต้นเซสชัน

session_unset(); // ลบข้อมูลทั้งหมดในเซสชัน

session_destroy(); // ทำลายเซสชัน

header("Location: Home.php"); // เปลี่ยนเส้นทางไปที่หน้า..

exit();
?>
