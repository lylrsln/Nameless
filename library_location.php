<?php
// Memulai sesi
session_start();

// Memeriksa apakah pengguna sudah login dan memiliki peran yang benar
if (!isset($_SESSION['userid']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit();
}

// Mengambil username dari sesi
$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Location</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <h1>Library Location</h1>
    <p>Welcome, <?php echo $username; ?>!</p>
    <p>Details about the library location...</p>
</body>
</html>
