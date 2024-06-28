<?php
session_start();
include('db_con.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            if ($role == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title >Login Kawan Perpus</title>
    <link rel="stylesheet" href="loginn.css">
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="login.php">
            <h1 style="color: #fff; font-size: 20px; margin-top: 20px; margin-bottom: 15px;">LOGIN KAWAN PERPUS</h1>
            <div class="input-box">
                <label for="email">Username/NIK</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-box">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="remember-forgot">
                <div>
                    <label>
                        <input type="checkbox" name="remember"> Ingat Saya
                    </label>
                </div>
                <div>
                    <a href="#">Lupa Kata Sandi?</a>
                </div>
            </div>
            <button type="submit" class="btn">Masuk</button>
            <p style="color: #fff; font-size: 10px; text-align: center;">Belum memiliki akun? <a style="color: #fff;" href="register.php">Daftar disini</a></p> 
        </form>
    </div>
</body>
</html>
