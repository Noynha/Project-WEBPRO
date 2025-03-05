<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "thai_restaurant";

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($hostname, $username, $password);

if (!$conn) {
    die("ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้: " . mysqli_connect_error());
}

// เลือกฐานข้อมูล
if (!mysqli_select_db($conn, $dbname)) {
    die("ไม่สามารถเลือกฐานข้อมูลได้: " . mysqli_error($conn));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    // จัดการอัปโหลดไฟล์รูป
    $target_dir = "images/"; // โฟลเดอร์เก็บรูป
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // สร้างโฟลเดอร์ถ้ายังไม่มี
    }

    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_path = $target_file; // เก็บพาธของรูปในฐานข้อมูล

        // เพิ่มข้อมูลลงในฐานข้อมูล
        $sql = "INSERT INTO menu (Name_menu, Explanation_menu, Price_menu, Picture_menu) 
                VALUES ('$name', '$description', '$price', '$image_path')";

        if (mysqli_query($conn, $sql)) {
            echo "<div class='success'>เพิ่มเมนูสำเร็จ!</div>";
        } else {
            echo "<div class='error'>เกิดข้อผิดพลาดในการเพิ่มเมนู: " . mysqli_error($conn) . "</div>";
        }
    } else {
        echo "<div class='error'>เกิดข้อผิดพลาดในการอัปโหลดไฟล์</div>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มเมนูใหม่</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Thasadith:ital,wght@0,400;0,700;1,400;1,700&display=swap');

        body {
            font-family: 'Krub', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            font-family: 'Krub', sans-serif;
            /* ใช้ Poppins สำหรับฟอร์ม */
        }

        .container h2 {
            font-family: 'Krub', sans-serif;
            /* ใช้ Krub สำหรับหัวข้อเพิ่มเมนู */
        }

        .container label {
            font-family: 'Krub', sans-serif;
            /* ใช้ Thasadith สำหรับคำอธิบายของฟอร์ม */
        }

        .container input[type="text"],
        .container input[type="number"],
        .container textarea {
            font-family: 'Krub', sans-serif;
            /* ใช้ Poppins สำหรับอินพุตและข้อความ */
        }


        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: rgb(239, 70, 18);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: rgb(239, 70, 18);
        }

        .success {
            background-color: rgb(239, 70, 18);
            color: white;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        .error {
            background-color: rgb(239, 70, 18);
            color: white;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>เพิ่มเมนูใหม่</h2>
        <form action="add_menu.php" method="post" enctype="multipart/form-data">
            <label for="name">ชื่อเมนู:</label>
            <input type="text" name="name" required><br>

            <label for="description">รายละเอียด:</label>
            <textarea name="description" required></textarea><br>

            <label for="price">ราคา:</label>
            <input type="number" name="price" required><br>

            <label for="image">รูปภาพ:</label>
            <input type="file" name="image" accept="image/*" required><br>

            <input type="submit" value="เพิ่มเมนู">
        </form>
    </div>

</body>

</html>