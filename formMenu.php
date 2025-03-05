<form action="order.php" method="POST">
    <div class="menu-item">
        <img src="<?php echo $row['Picture_menu']; ?>" alt="<?php echo $row['Name_menu']; ?>">
        <div class="menu-item-details">
            <h3><?php echo $row['Name_menu']; ?></h3>
            <p>ราคา: <?php echo number_format($row['Price_menu'], 2); ?> บาท</p>
            <p><?php echo $row['Explanation_menu']; ?></p>
        </div>
        <div class="quantity-controls">
            <button type="button" class="decrease-btn">-</button>
            <input type="number" name="quantity_<?php echo $row['ID_menu']; ?>" value="0" class="quantity" min="0" step="1" />
            <button type="button" class="increase-btn">+</button>
        </div>
        <input type="hidden" name="menu_id_<?php echo $row['ID_menu']; ?>" value="<?php echo $row['ID_menu']; ?>" />
    </div>
    <!-- ฟอร์มนี้จะส่งข้อมูลไปที่หน้า order.php เมื่อกดสั่ง -->
    <button type="submit" class="order-btn">สั่งอาหาร</button>
</form>
