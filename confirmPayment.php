<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: Login.php");
    exit();
}

// ตรวจสอบว่าได้รับ order_id มาจากฟอร์ม
if (isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    // เชื่อมต่อฐานข้อมูล
    $conn = new mysqli("localhost", "root", "", "thai_restaurant");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // เริ่มต้นการทำธุรกรรม
    $conn->begin_transaction();

    try {
        // ดึงข้อมูลจาก order_detail ตาม order_id
        $sql = "SELECT Menu_id, Name_menu, Price_menu, Quantity FROM order_detail WHERE Order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $stmt->bind_result($menuId, $nameMenu, $priceMenu, $quantity);

        // บันทึกข้อมูลใน order_detail
        while ($stmt->fetch()) {
            $sqlOrderDetail = "INSERT INTO order_detail (Order_id, Menu_id, Name_menu, Price_menu, Quantity) 
                               VALUES (?, ?, ?, ?, ?)";
            $stmtOrderDetail = $conn->prepare($sqlOrderDetail);
            $stmtOrderDetail->bind_param("iissi", $orderId, $menuId, $nameMenu, $priceMenu, $quantity);
            if (!$stmtOrderDetail->execute()) {
                throw new Exception("เกิดข้อผิดพลาดในการบันทึกข้อมูล order_detail: " . $stmtOrderDetail->error);
            }
            $stmtOrderDetail->close();
        }

        // หลังจากบันทึกแล้ว, ลบข้อมูลใน order_detail_temp (เพื่อล้างข้อมูลหลังการชำระเงิน)
        $sqlDeleteTemp = "DELETE FROM order_detail_temp WHERE Order_id = ?";
        $stmtDeleteTemp = $conn->prepare($sqlDeleteTemp);
        $stmtDeleteTemp->bind_param("i", $orderId);
        if (!$stmtDeleteTemp->execute()) {
            throw new Exception("เกิดข้อผิดพลาดในการลบข้อมูลจาก order_detail_temp: " . $stmtDeleteTemp->error);
        }
        $stmtDeleteTemp->close();

        // อัปเดตสถานะการชำระเงิน (ถ้ามีฟีเจอร์การจัดการสถานะการชำระเงิน)
        $sqlUpdateOrderStatus = "UPDATE orders SET Payment_status = 'Paid' WHERE order_id = ?";
        $stmtUpdateOrderStatus = $conn->prepare($sqlUpdateOrderStatus);
        $stmtUpdateOrderStatus->bind_param("i", $orderId);
        if (!$stmtUpdateOrderStatus->execute()) {
            throw new Exception("เกิดข้อผิดพลาดในการอัปเดตสถานะการชำระเงิน: " . $stmtUpdateOrderStatus->error);
        }
        $stmtUpdateOrderStatus->close();

        // ยืนยันการชำระเงินสำเร็จและย้ายไปหน้าประวัติการสั่งซื้อ
        $conn->commit();  // ยืนยันการทำธุรกรรม
        echo "<script>alert('ชำระเงินสำเร็จ!'); window.location.href = 'orderHistory.php';</script>";
        
    } catch (Exception $e) {
        // หากเกิดข้อผิดพลาด ให้ยกเลิกการทำธุรกรรมทั้งหมด
        $conn->rollback();
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    } finally {
        // ปิดการเชื่อมต่อฐานข้อมูล
        $conn->close();
    }
} else {
    echo "ไม่พบข้อมูลคำสั่งซื้อ!";
    exit();
}
?>
