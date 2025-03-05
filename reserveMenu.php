<?php

require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านอาหาร</title>
    <link rel="stylesheet" href="css/stylesReseveMenu.css"> <!-- ลิงก์ไฟล์ CSS -->
</head>
<body>

    <div class="navbar">
        <a href="index.php">หน้าหลัก</a>
        <a href="">เมนู</a>
        <a href="order.php">สั่งอาหาร</a>
        <a href="reservation.php">จองโต๊ะ</a>
        <a href="">ออกจากระบบ</a>
    </div>

    <div class="container">
        <h2>เมนูอาหาร</h2>

        <?php
        // ดึงข้อมูลเมนูอาหารจากฐานข้อมูล
        $sql = "SELECT * FROM menu";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // แสดงเมนูอาหาร
            while ($row = $result->fetch_assoc()) {
                echo '<div class="menu-item">';
                echo '<img src="' . $row['Picture_menu'] . '" alt="' . $row['Name_menu'] . '">';
                echo '<div class="menu-item-details">';
                echo '<h3>' . $row['Name_menu'] . '</h3>';
                echo '<p>ราคา: ' . number_format($row['Price_menu'], 2) . ' บาท</p>';
                echo '<p>' . $row['Explanation_menu'] . '</p>';
                echo '</div>';
                echo '<div class="quantity-controls">';
                echo '<button class="decrease-btn">-</button>';
                echo '<input type="number" value="0" class="quantity" min="0" step="1" />';
                echo '<button class="increase-btn">+</button>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "ไม่พบเมนูอาหารในฐานข้อมูล";
        }
        // ปิดการเชื่อมต่อฐานข้อมูล
        $conn->close();
        ?>
    </div>

    <script>
        // เพิ่มการทำงานของปุ่ม "+" และ "-"
        document.querySelectorAll('.decrease-btn').forEach(button => {
            button.addEventListener('click', function() {
                let inputField = this.nextElementSibling; // ค้นหาช่องกรอกจำนวนถัดจากปุ่ม "-"
                let currentValue = parseInt(inputField.value);
                if (currentValue > 0) {
                    inputField.value = currentValue - 1;
                }
            });
        });

        document.querySelectorAll('.increase-btn').forEach(button => {
            button.addEventListener('click', function() {
                let inputField = this.previousElementSibling; // ค้นหาช่องกรอกจำนวนถัดจากปุ่ม "+"
                let currentValue = parseInt(inputField.value);
                inputField.value = currentValue + 1;
            });
        });
    </script>
    
    
</body>
</html>
