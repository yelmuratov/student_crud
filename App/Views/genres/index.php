<?php
    use App\Models\Genre\Genre;
    $genres = Genre::getAll();

    //count the number of books for each genre
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
    ";

    $genres = Genre::query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    <div class="container my-5">
        <h2 class="text-center mb-4">Genres and Book Count</h2>
        <a href="/genre_create" class='btn btn-primary'>Add Genre</a>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Genre</th>
                    <th>Number of Books</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($genres as $genre): ?>
                    <tr>
                        <td><?= $genre['genre_name'] ?></td>
                        <td><?= $genre['book_count'] ?></td>
                        <td>
                            <a href="/genre_edit?id=<?= $genre['genre_id'] ?>" class='btn btn-primary'>Edit</a>
                            <a href="/delete_genre?id=<?= $genre['genre_id'] ?>" class='btn btn-danger'>Delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
