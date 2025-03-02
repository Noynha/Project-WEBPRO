<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองโต๊ะอาหาร</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 40%;
        margin: 50px auto;
        padding: 60px;
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
        margin-top: 10px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    input[type="number"] {
        padding: 8px;
        margin: 5px 0;
        font-size: 18px;
        border: 3px solid #ddd;
        border-radius: 4px;
    }

    input[type="submit"] {
        margin-top: 20px;
        padding: 10px;
        font-size: 16px;
        color: #fff;
        background-color: #4CAF50;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    </style>
</head>
<body>
    <div class="container">
        <h2>การจองโต๊ะอาหาร</h2>
        <form action="reserve.php" method="POST">
            <label for="name">ชื่อผู้จอง:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="phone">เบอร์โทร:</label>
            <input type="text" id="phone" name="phone" required><br>

            <label for="date">วันที่จอง:</label>
            <input type="date" id="date" name="reservation_date" required><br>

            <label for="time">เวลา:</label>
            <select id="reservation_time" name="reservation_time" required>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
            </select>

            <label for="num_people">จำนวนคน:</label>
            <input type="number" id="num_people" name="num_people" required min="1"><br>

            <input type="submit" value="จองโต๊ะ">
        </form>
    </div>
</body>
</html>