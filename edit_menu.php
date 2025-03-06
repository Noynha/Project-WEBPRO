<?php
require_once 'config.php';

// รับค่า Menu_id จาก URL
if (isset($_GET['Menu_id'])) {
    $Menu_id = $_GET['Menu_id'];

    // ดึงข้อมูลเมนูจากฐานข้อมูล
    $sql = "SELECT * FROM menu WHERE Menu_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $Menu_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $menu = $result->fetch_assoc();

    if (!$menu) {
        echo "ไม่พบข้อมูลเมนู";
        exit();
    }
} else {
    echo "ไม่พบค่า Menu_id";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>แก้ไขเมนู</title>
</head>

<body>

    <h2>แก้ไขเมนู</h2>
    <form action="update_menu.php" method="post">
        <input type="hidden" name="Menu_id" value="<?php echo $menu['Menu_id']; ?>">
        <label>ชื่อเมนู:</label>
        <input type="text" name="Name_menu" value="<?php echo $menu['Name_menu']; ?>" required><br>

        <label>คำอธิบาย:</label>
        <textarea name="Explanation_menu" required><?php echo $menu['Explanation_menu']; ?></textarea><br>

        <label>ราคา:</label>
        <input type="number" name="Price_menu" value="<?php echo $menu['Price_menu']; ?>" required><br>

        <input type="submit" value="อัปเดตเมนู">
    </form>

</body>

</html>

<?php
$conn->close();
?>