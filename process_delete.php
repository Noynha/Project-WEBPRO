<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $menu_id = intval($_POST['menu_id']); // ป้องกัน SQL Injection

    $sql = "DELETE FROM menu WHERE Menu_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $menu_id);
        if ($stmt->execute()) {
            echo "<script>alert('ลบเมนูสำเร็จ!'); window.location.href='DeleteMenu.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการลบเมนู!');</script>";
        }
        $stmt->close();
    }
}

mysqli_close($conn);
?>
