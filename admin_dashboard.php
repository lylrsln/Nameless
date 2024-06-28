<?php
session_start();

if (!isset($_SESSION['userid']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="tampilan_admin.css">
</head>
<body>
    <h1>Welcome to Admin Dashboard</h1>
    <p>Hello, <?php echo htmlspecialchars($username); ?>!</p>
    <p>This is the admin dashboard where you can manage the site.</p>
    <nav>
        <ul>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="site_settings.php">Site Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
