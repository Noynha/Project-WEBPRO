<?php
session_start();
require_once 'config.php';

// ตรวจสอบการส่งข้อมูลผ่าน form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = trim($_POST["userid"]);
    $password = trim($_POST["password"]);
    
    $sql = "SELECT User_id, passwords FROM user_member WHERE User_id = ?";
    $stmt = $conn->prepare($sql); // เพื่อป้องกัน SQL Injection
    
    if ($stmt) {
        $stmt->bind_param("s", $userid);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();
            
            // if (password_verify($password, $hashed_password)) { //// ป้องกันรหัสผ่าน
            if ($password === $hashed_password) {
                $_SESSION["user_id"] = $id;
                // $_SESSION["username"] = $username;
                header("Location: Homepage.php");
                exit();
            } else {
                $error_message = "รหัสผ่านไม่ถูกต้อง";
            }
        } else {
            $error_message = "ไม่พบชื่อผู้ใช้นี้";
        }
        $stmt->close();
    } else {
        $error_message = "เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL";
    }
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="css/styleLogin-Regis.css">
</head>
<body>

    <div class="container">
        <div class="form-box" id="login-form">

            <form action="" method="post">

                <h2>เข้าสู่ระบบ</h2>
                
                <?php if (!empty($error_message)) : ?>
                    <p class="error-message"> <?= htmlspecialchars($error_message) ?> </p>
                <?php endif; ?>

                <input type="text" name="userid" placeholder="ชื่อไอดีผู้ใช้" required>
                <input type="password" name="password" placeholder="รหัสผ่าน" required>

                <button type="submit">เข้าสู่ระบบ</button>

                <p>ยังไม่มีแอคเคาท์ใช่ไหม ? <a href="Register.php">ลงทะเบียน</a></p>

            </form>

        </div>
    </div>
</body>
</html>
