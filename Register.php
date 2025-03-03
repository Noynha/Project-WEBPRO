<!-- php start -->
<?php

session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userid = $_POST["userid"];
    $username = $_POST["username"];
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // ป้องกันรหัสผ่าน
    $password = $_POST["password"]; // ไม่ป้องกันรหัสผ่าน
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO user_member (user_id ,Name_member , passwords, email, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $userid, $username, $password, $email, $phone);

    if ($stmt->execute()) header("Location: Login.php");
    else echo "<div class='alert alert-danger'>เกิดข้อผิดพลาด!</div>";
}

?>
<!-- php end -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tast Register</title>
    <link rel="stylesheet" href="css/styleLogin-Regis.css">
</head>
<body>

    <div class="container">
        <div class="form-box" id="register-form">
            <form action="" method="post">
                <h2>ลงทะเบียน</h2>
                <input type="text" name="userid" placeholder="ชื่อไอดีผู้ใช้" required>
                <input type="text" name="username" placeholder="ชื่อผู้ใช้" required>
                <input type="password" name="password" placeholder="รหัสผ่าน" required>
                <input type="phone" name="phone" placeholder="เบอร์โทร" required>
                <input type="email" name="email" placeholder="อีเมล" required>
                <!-- <input type="password" name="password" placeholder="ยืนยันรหัสผ่าน" required> -->
                <button type="submit">สมัครสมาชิก</button>
                <p>มีบัญชีอยู่แล้ว ? <a href="Login.php">Login</a></p>
            </form>
        </div>
    </div>

</body>
</html>