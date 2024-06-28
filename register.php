<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "project_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = 'user'; 

    $stmt = $conn->prepare("INSERT INTO users (email, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $username, $password, $role);

    if ($stmt->execute()) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        header('Location: user_dashboard.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="regis.css">
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="register.php">
            <h1 style="text-align: left; margin-bottom: 30px;">PENDAFTARAN KAWAN PERPUS</h1>
            <div class="input-row">
                <div class="input-box">
                    <label for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" required>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            <div class="input-row">
                <div class="input-box">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="input-box">
                    <label for="whatsapp">Kata Sandi</label>
                    <input type="password" id="password" name="password" required>
                    <p class="password-hint">*Minimal 6 karakter dan memerlukan setidaknya satu huruf, angka, serta simbol</p>
                </div>
            </div> 
            <div class="input-row">
                <div class="input-box">
                    <label for="whatsapp">No. WhatsApp</label>
                    <input type="text" id="whatsapp" name="whatsapp" required>
                </div>
                <div class="input-box">
                    <label for="confirm_password">Konfirmasi Kata Sandi</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
            </div>
            <div class="custom-checkbox">
            <input type="checkbox" id="privacyPolicy" name="privacyPolicy" required>
            <label for="privacyPolicy">Saya menyatakan telah membaca dan menyetujui terkait Kebijakan Privasi</label>
            </div>
            <button type="submit" class="btn">Daftar</button>
            <div class="login-link">
            <p>Sudah memiliki akun? <a href="login.php">Masuk</a></p>
            </div>
        </form>
    </div>

</body>
</html>
