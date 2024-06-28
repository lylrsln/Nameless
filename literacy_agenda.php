<?php
// Data kegiatan literasi (biasanya data ini akan diambil dari database)
$events = array(
    array(
        "id" => 1,
        "title" => "Book Reading Session",
        "date" => "2024-06-30",
        "description" => "Join us for a book reading session of 'Harry Potter and the Philosopher's Stone'.",
        "image" => "event1.jpg"
    ),
    array(
        "id" => 2,
        "title" => "Author Meet and Greet",
        "date" => "2024-07-05",
        "description" => "Meet your favorite authors and get your books signed.",
        "image" => "event2.jpg"
    ),
    array(
        "id" => 3,
        "title" => "Children's Storytelling",
        "date" => "2024-07-10",
        "description" => "A fun storytelling session for kids.",
        "image" => "event3.jpg"
    ),
    // tambahkan kegiatan lainnya sesuai kebutuhan
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Literacy Agenda</title>
    <link rel="stylesheet" href="user.css">
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
        .event-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .event {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .event img {
            width: 100%;
            border-bottom: 1px solid #ccc;
        }
        .event-content {
            padding: 15px;
        }
        .event h2 {
            font-size: 1.2em;
            margin: 0 0 10px;
        }
        .event p {
            margin: 10px 0;
        }
        .event-date {
            font-size: 0.9em;
            color: #666;
        }
        .event a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <h1>Literacy Agenda</h1>
    <div class="event-list">
        <?php foreach ($events as $event): ?>
            <div class="event">
                <a href="literacy_detail.php?id=<?php echo htmlspecialchars($event['id']); ?>">
                    <img src="images/<?php echo htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>">
                    <div class="event-content">
                        <h2><?php echo htmlspecialchars($event['title']); ?></h2>
                        <p class="event-date"><?php echo htmlspecialchars($event['date']); ?></p>
                        <p><?php echo htmlspecialchars($event['description']); ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
