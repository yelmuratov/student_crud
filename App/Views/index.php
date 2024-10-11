<?php
    use App\Models\Genre\Genre;
    use App\Models\Book\Book;
    // get the most amount of books in a genre with image and limit to 3
    $sql = "
        SELECT 
            genres.id AS genre_id,
            genres.name AS genre_name,
            COUNT(books.id) AS book_count
        FROM 
            genres
        LEFT JOIN 
            books ON genres.id = books.genre_id
        GROUP BY 
            genres.id
        ORDER BY 
            book_count DESC
        LIMIT 3
    ";

    $genres = Genre::query($sql);

    // best seller books

    // get the most amount of books in a genre with image and limit to 3
    $sql = "
        SELECT 
            books.id AS book_id,
            books.title AS book_title,
            authors.name AS author_name
        FROM 
            books
        INNER JOIN 
            authors ON books.author_id = authors.id
        ORDER BY 
            books.id DESC
        LIMIT 3
    ";

    $best_sellers = Book::query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Book Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">E-Book Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/books">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/authors">Authors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/genres">Genres</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Welcome to Our E-Book Store</h1>
        <p>Discover a vast collection of e-books across various genres</p>
        <a href="#" class="btn btn-light btn-lg">Browse Now</a>
    </div>

    <!-- Categories Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Popular Categories</h2>
        <div class="row">
            <?php foreach($genres as $genre): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="<?= $genre['genre_name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title
                            "><?= $genre['genre_name'] ?></h5>
                            <p class="card-text"><?= $genre['book_count'] ?> Books</p>
                            <a href="/books" class="btn btn-primary">View Books</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Best Sellers Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Best Sellers</h2>
        <div class="row">
            <?php foreach($best_sellers as $book): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="<?= $book['book_title'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['book_title'] ?></h5>
                            <p class="card-text">By <?= $book['author_name'] ?></p>
                            <a href="/books" class="btn btn-primary">View Book</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <h5 class="text-uppercase">About Us</h5>
                    <p>We provide a wide range of e-books in different categories to meet every reader’s needs.</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <h5 class="text-uppercase">Follow Us</h5>
                    <a href="#" class="me-3 text-dark">Facebook</a>
                    <a href="#" class="me-3 text-dark">Twitter</a>
                    <a href="#" class="me-3 text-dark">Instagram</a>
                </div>
            </div>
        </div>
        <div class="text-center p-3 bg-dark text-white">
            © 2024 E-Book Store. All Rights Reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
