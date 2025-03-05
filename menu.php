<?php

require_once 'config.php';

$sql = "SELECT * FROM menu";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Menu</title>
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

        body {
             font-family: "Poppins", serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
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

        h1, h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 20px;
        }

        .menu-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 45%; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }

        .menu-item img {
            width: 100%;
            border-radius: 8px;
        }

        .menu-item h3 {
            font-size: 1.5em;
            margin-top: 15px;
        }

        .menu-item p {
            font-size: 1em;
            color: #666;
        }

        .price {
            font-weight: bold;
            color: #e74c3c;
            font-size: 1.2em;
        }

        @media (max-width: 768px) {
            .menu-item {
                width: 90%; 
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="Homepage.php">หน้าหลัก</a>
        <a href="menu.php">เมนู</a>
        <a href="reserveMenu.php">สั่งอาหาร</a>
        <a href="Reserve.php">จองโต๊ะ</a>
        <a href="Logout.php">ออกจากระบบ</a>
    </div>

    <h1>Welcome! Here is Our Menu.</h1>
    <h2>Thai Inspired Kitchen</h2>

    <div class="menu-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='menu-item'>
                        <img src='{$row['Picture_menu']}'>
                        <h3>{$row['Name_menu']}</h3>
                        <p>{$row['Explanation_menu']}</p>
                        <p class='price'>{$row['Price_menu']} บาท</p>
                    </div>";
            }
        } else {
            echo "<p>ไม่มีเมนู</p>";
        }
        ?>
    </div>

</body>
</html>

<?php
mysqli_close($conn);
?>
