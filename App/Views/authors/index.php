<?php
    use App\Models\Author\Author;

    $authors = Author::getAll();

    //count the number of books for each author
    $sql = "
        SELECT 
            authors.id AS author_id,
            authors.name AS author_name,
            COUNT(books.id) AS book_count
        FROM 
            authors
        LEFT JOIN 
            books ON authors.id = books.author_id
        GROUP BY 
            authors.id
    ";

    $authors = Author::query($sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
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
        <h2 class="text-center mb-4">Authors and their Books</h2>
        <!-- Add author -->
        <a href="/author_create" class='btn btn-primary mb-4'>Add Author</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Number of Books</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($authors as $author): ?>
                    <tr>
                        <td><?= $author['author_name'] ?></td>
                        <td><?= $author['book_count'] ?></td>
                        <td>
                            <a href="/author_edit?id=<?= $author['author_id'] ?>" class='btn btn-warning'>Edit</a>
                            <a href="/delete_author?id=<?= $author['author_id'] ?>" class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
