<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Menu_id = $_POST['Menu_id'];
    $Name_menu = $_POST['Name_menu'];
    $Explanation_menu = $_POST['Explanation_menu'];
    $Price_menu = $_POST['Price_menu'];

    // อัปเดตข้อมูลเมนู
    $sql = "UPDATE menu SET Name_menu = ?, Explanation_menu = ?, Price_menu = ? WHERE Menu_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $Name_menu, $Explanation_menu, $Price_menu, $Menu_id);

    if ($stmt->execute()) {
        echo "อัปเดตเมนูสำเร็จ!";
        header("Location: menu_list.php"); // กลับไปยังหน้ารายการเมนู
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตเมนู: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
