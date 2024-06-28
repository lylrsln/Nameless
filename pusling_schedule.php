<?php
// Data jadwal perpustakaan keliling (simulasi dari database)
$schedules = array(
    array("tanggal" => "2024-06-25", "waktu" => "10:00 - 12:00", "lokasi" => "Lapangan Kota A", "alamat" => "Jl. Merdeka No. 123", "deskripsi" => "Kunjungan rutin mingguan", "pemesan" => "Pak Budi"),
    array("tanggal" => "2024-06-26", "waktu" => "09:00 - 11:00", "lokasi" => "Taman Kota B", "alamat" => "Jl. Pahlawan No. 456", "deskripsi" => "Kunjungan ke taman kota", "pemesan" => "Bu Siti"),
    array("tanggal" => "2024-06-27", "waktu" => "13:00 - 15:00", "lokasi" => "Sekolah C", "alamat" => "Jl. Guru No. 789", "deskripsi" => "Kunjungan ke sekolah dasar", "pemesan" => "Pak Joko"),
    array("tanggal" => "2024-06-28", "waktu" => "14:00 - 16:00", "lokasi" => "Perumahan D", "alamat" => "Jl. Anggrek No. 567", "deskripsi" => "Kunjungan ke perumahan", "pemesan" => "Bu Ani"),
    // tambahkan jadwal lainnya sesuai kebutuhan
);

// Fungsi untuk menampilkan jadwal berdasarkan filter
function displaySchedules($place, $booker) {
    global $schedules;
    $found = false;
    foreach ($schedules as $schedule) {
        if (($place === '' || stripos($schedule['lokasi'], $place) !== false) &&
            ($booker === '' || stripos($schedule['pemesan'], $booker) !== false)) {
            echo "<div class='schedule'>";
            echo "<div class='schedule-content'>";
            echo "<h2>" . htmlspecialchars($schedule['tanggal']) . " - " . htmlspecialchars($schedule['waktu']) . "</h2>";
            echo "<p><strong>Lokasi:</strong> " . htmlspecialchars($schedule['lokasi']) . "</p>";
            echo "<p><strong>Alamat:</strong> " . htmlspecialchars($schedule['alamat']) . "</p>";
            echo "<p><strong>Deskripsi:</strong> " . htmlspecialchars($schedule['deskripsi']) . "</p>";
            echo "<p><strong>Pemesan:</strong> " . htmlspecialchars($schedule['pemesan']) . "</p>";
            echo "<a href='" . generateGoogleMapsUrl($schedule['alamat']) . "' target='_blank' class='maps-link'>Lihat di Google Maps</a>";
            echo "</div>";
            echo "</div>";
            $found = true;
        }
    }
    if (!$found) {
        echo "<p>No schedules found matching your criteria.</p>";
    }
}

function generateGoogleMapsUrl($alamat) {
    // Menggunakan urlencode untuk memastikan alamat yang aman untuk URL
    $mapsUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($alamat);
    return $mapsUrl;
}

$place = isset($_GET['place']) ? $_GET['place'] : '';
$booker = isset($_GET['booker']) ? $_GET['booker'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pusling Schedule</title>
    <link rel="stylesheet" href="pusling.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 0 5px;
        }
        input[type="submit"] {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .schedule-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .schedule {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .schedule-content {
            padding: 15px;
        }
        .schedule h2 {
            font-size: 1.2em;
            margin: 0 0 10px;
        }
        .schedule p {
            margin: 10px 0;
        }
        .maps-link {
            display: block;
            margin-top: 10px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Pusling Schedule</h1>
    <form action="pusling_schedule.php" method="GET">
        <input type="text" name="place" placeholder="Search by Place" value="<?php echo htmlspecialchars($place); ?>">
        <input type="text" name="booker" placeholder="Search by Booker" value="<?php echo htmlspecialchars($booker); ?>">
        <input type="submit" value="Search">
    </form>
    <div class="schedule-list">
        <?php
        // Panggil fungsi untuk menampilkan jadwal berdasarkan filter
        displaySchedules($place, $booker);
        ?>
    </div>
</body>
</html>
