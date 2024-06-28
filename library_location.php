<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Location</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        #map {
            height: 400px;
            width: 100%;
        }
        .whatsapp-link {
            color: #25D366; /* Warna WhatsApp hijau */
            text-decoration: none;
        }
    </style>
    <!-- Memuat Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>
    <h1>Library Location</h1>
    <p>Welcome to our library! Here you can find information about our location.</p>
    
    <h2>Location Details</h2>
    <p>The library is conveniently located in the heart of the city, close to major landmarks and public transportation.</p>
    
    <h2>Address</h2>
    <p>123 Library Street, Cityville, Country</p>
    
    <h2>Contact Information</h2>
    <p>Phone: <a href="https://wa.me/+6281343279446" class="whatsapp-link">+6281343279446</a></p>
    <p>Email: <a href="mailto:lylrsln17@gmail.com">info@library.com</a></p>
    
    <h2>Hours of Operation</h2>
    <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
    <p>Saturday: 10:00 AM - 4:00 PM</p>
    <p>Sunday: Closed</p>
    
    <h2>Map</h2>
    <div id="map"></div>

    <!-- Memuat Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-7.797068, 110.370529], 15);

        // Menambahkan OpenStreetMap sebagai tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Menambahkan marker ke lokasi perpustakaan
        var marker = L.marker([-7.797068, 110.370529]).addTo(map)
            .bindPopup('<b>Library Location</b><br>123 Library Street, Cityville, Country.')
            .openPopup();
    </script>
</body>
</html>
