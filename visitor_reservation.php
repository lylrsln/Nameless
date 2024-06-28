<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visitor Reservation</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <h1>Visitor Reservation</h1>
    <form action="reservation_process.php" method="post">
        <label for="full_name">Nama Lengkap:</label>
        <input type="text" id="full_name" name="full_name" required><br><br>

        <label for="occupation">Pekerjaan:</label>
        <input type="text" id="occupation" name="occupation" required><br><br>

        <label for="address">Alamat:</label>
        <textarea id="address" name="address" rows="4" required></textarea><br><br>

        <label for="phone_number">Nomor Telpon:</label>
        <input type="text" id="phone_number" name="phone_number" required pattern="[0-9]{10,15}"><br><br>

        <label for="gender">Jenis kelamin:</label>
        <select id="gender" name="gender" required>
            <option value="">Select</option>
            <option value="male">Pria</option>
            <option value="female">Wanita</option>
        </select><br><br>

        <label for="reservation_date">Tanggal Kunjungan:</label>
        <input type="date" id="reservation_date" name="reservation_date" required><br><br>

        <button type="submit">Reserve</button>
    </form>
</body>
</html>
