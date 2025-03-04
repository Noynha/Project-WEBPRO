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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
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
