<?php
session_start();

if (!isset($_SESSION['userid']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css_user.css">
    <script>
        let currentIndex = 0;
        
        function showNextImage() {
            const images = document.querySelectorAll('.carousel img');
            currentIndex = (currentIndex + 1) % images.length;
            images.forEach((img, index) => {
                img.style.transform = `translateX(-${currentIndex * 100}%)`;
            });
        }

        setInterval(showNextImage, 3000);

        function toggleDropdown() {
            const dropdown = document.getElementById('user-settings-dropdown');
            dropdown.classList.toggle('show');
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn, .dropbtn img')) {
                const dropdowns = document.getElementsByClassName('dropdown-content');
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</head>
<body>
    <header>
        <img src="logo.png" alt="Library Logo" class="logo">
        <div class="header-links">
            <li class="search-form">
                <form action="search.php" method="get">
                    <input type="text" name="book_title" placeholder="Search Book">
                </form>
            </li>
            <a href="view_profile.php"><img src="profile_icon.png" alt="View Profile" class="nav-icon"></a>
            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown()">
                    <img src="gear_icon.png" alt="User Settings">
                </button>
                <div id="user-settings-dropdown" class="dropdown-content">
                    <a href="user_settings.php">Settings</a>
                    <a href="delete_account.php">Delete Account</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <nav>
        <ul>
        <li><a href="book_collection.php">Koleksi Buku</a></li>
            <li><a href="visitor_reservation.php">Reservasi Kunjungan</a></li>
            <li><a href="e_resources.php">E-Resources</a></li>
            <li><a href="literacy_agenda.php">Agenda Literasi</a></li>
            <li><a href="mobile_schedule.php">Jadwal Pusling</a></li>
            <li><a href="library_location.php">Lokasi Perpustakaan</a></li>
        </ul>
    </nav>
    <section>
        <h2>Popular Books</h2>
        <div class="carousel">
            <img src="book1.jpg" alt="Book 1">
            <img src="book2.jpg" alt="Book 2">
            <img src="book3.jpg" alt="Book 3">
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Library. All rights reserved.</p>
    </footer>
</body>
</html>
