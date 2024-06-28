<?php

// Data buku (biasanya data ini akan diambil dari database berdasarkan $bookId)
$books = array(
    array("id" => 1, "title" => "Harry Potter and the Philosopher's Stone", "category" => "fiction", "author" => "J.K. Rowling", "summary" => "A young wizard's journey at Hogwarts.", "image" => "Harry_potter1.png"),
    array("id" => 2, "title" => "Harry Potter and the Chamber of Secrets", "category" => "fiction", "author" => "Harper Lee", "summary" => "A story about racial injustice and moral growth.", "image" => "Harry_potter2.png"),
    array("id" => 3, "title" => "Harry Potter and the Prisoner of Azkaban", "category" => "history", "author" => "Yuval Noah Harari", "summary" => "Exploration of human history and evolution.", "image" => "Harry_potter3.png"),
    array("id" => 4, "title" => "Harry Potter and the Goblet of Fire", "category" => "education", "author" => "Tara Westover", "summary" => "Memoir about the author's journey from a survivalist family to Cambridge University.", "image" => "Harry_potter4.png"),
    array("id" => 5, "title" => "Harry Potter and the Order of the Phoenix", "category" => "education", "author" => "Tara Westover", "summary" => "Memoir about the author's journey from a survivalist family to Cambridge University.", "image" => "Harry_potter5.png"),
    // tambahkan buku lainnya sesuai kebutuhan
);

// Ambil id buku dari URL
if (!isset($_GET['id'])) {
    header("Location: book_collection.php");
    exit();
}
$bookId = $_GET['id'];

// Temukan buku berdasarkan $bookId
$book = null;
foreach ($books as $b) {
    if ($b['id'] == $bookId) {
        $book = $b;
        break;
    }
}

// Jika buku tidak ditemukan, kembalikan ke halaman koleksi buku
if (!$book) {
    header("Location: book_collection.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Detail - <?php echo $book['title']; ?></title>
    <link rel="stylesheet" href="detail.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
        }
        p {
            margin-bottom: 10px;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book Detail - <?php echo $book['title']; ?></h1>
        <img src="covers/<?php echo isset($book['image']) ? $book['image'] : 'default.jpg'; ?>" alt="<?php echo $book['title']; ?>">
        <p><strong>Category:</strong> <?php echo ucfirst($book['category']); ?></p>
        <p><strong>Author:</strong> <?php echo $book['author']; ?></p>
        <p><strong>Summary:</strong> <?php echo $book['summary']; ?></p>
        <a href="book_collection.php">Back to Book Collection</a>
    </div>
</body>
</html>
