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

$sql = "SELECT Name_menu, Price_menu, Picture_menu, Menu_id, Explanation_menu FROM menu";
$result = $conn->query($sql);

$username = isset($_SESSION["username"]) ? $_SESSION["username"] : "Guest";

// การประมวลผลการส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedItems = []; // อาหารที่เลือก

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'quantity_') === 0) {
            $menuId = str_replace('quantity_', '', $key);
            $quantity = (int) $value;

            if ($quantity > 0) {
                $selectedItems[] = [
                    'menu_id' => $menuId,
                    'quantity' => $quantity
                ];
            }
        }
    }

    if (!empty($selectedItems)) {
        // ส่งข้อมูลไปยังหน้า orderMenu.php
        header("Location: orderMenu.php?selected_items=" . urlencode(json_encode($selectedItems)));
        exit();
    } else {
        echo "กรุณาเลือกอาหารก่อนทำการสั่งซื้อ";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านอาหาร</title>
    <link rel="stylesheet" href="css/stylesReseveMenu.css">
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@300;400;500&family=Thasadith:wght@400;700&display=swap" rel="stylesheet">
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

    <div class="container">
        <h2><center>เมนูอาหาร</h2>

        <form action="reserveMenu.php" method="POST">
            <?php
            if ($result->num_rows > 0) {
                // แสดงเมนู
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="menu-item">';
                    echo '<img src="' . $row['Picture_menu'] . '" alt="' . $row['Name_menu'] . '">';
                    echo '<div class="menu-item-details">';
                    echo '<h3>' . $row['Name_menu'] . '</h3>';
                    echo '<p>ราคา: ' . number_format($row['Price_menu'], 2) . ' บาท</p>';
                    echo '<p>' . $row['Explanation_menu'] . '</p>';
                    echo '</div>';
                    echo '<div class="quantity-controls">';
                    echo '<button type="button" class="decrease-btn">-</button>';
                    echo '<input type="number" name="quantity_' . $row['Menu_id'] . '" value="0" class="quantity" min="0" step="1" />';
                    echo '<button type="button" class="increase-btn">+</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "ไม่พบเมนูอาหารในฐานข้อมูล";
            }
            ?>
            <div class="order-button-container">
                <button type="submit" class="order-btn">สั่งอาหาร</button>
            </div>
        </form>
    </div>

    <script>
        document.querySelectorAll('.decrease-btn').forEach(button => {
            button.addEventListener('click', function() {
                let inputField = this.nextElementSibling;
                let currentValue = parseInt(inputField.value);
                if (currentValue > 0) {
                    inputField.value = currentValue - 1;
                }
            });
        });
 
        document.querySelectorAll('.increase-btn').forEach(button => {
            button.addEventListener('click', function() {
                let inputField = this.previousElementSibling;
                let currentValue = parseInt(inputField.value);
                inputField.value = currentValue + 1;
            });
        });
    </script>

</body>
</html>