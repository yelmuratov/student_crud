<?php
    use App\Models\Book\Book;
    use App\Models\Author\Author;
    use App\Models\Genre\Genre;
    use App\Models\User\User;
    
    $sql = "
    SELECT 
        books.id AS book_id,
        books.title AS book_title,
        books.description AS book_description,
        authors.name AS author_name,
        genres.name AS genre_name
    FROM 
        books
    INNER JOIN 
        authors ON books.author_id = authors.id
    INNER JOIN 
        genres ON books.genre_id = genres.id
";
    $books = Book::query($sql);
    $authors = Author::getAll();
    $genres = Genre::getAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books CRUD</title>
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
                        <a class="nav-link" href="/">Home</a>
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
                    <!-- if user logged in -->
                    <?php if(isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/register">Register</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <!-- Book List with Edit/Delete -->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user'][0]['role'] == 'admin') {
                    echo "<a href='/book_create' class='btn btn-primary'>Add Book</a>";
                }
            }
        ?>
        <div class="mt-5">
            <h3>Books List</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Genre</th>
                        <th>Author</th>
                        <!-- only admin -->
                         <?php if(isset($_SESSION['user']) && $_SESSION['user'][0]['role'] == 'admin'): ?>
                            <th>Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($books as $book): ?>
                        <tr>
                            <td><?= $book['book_title'] ?></td>
                            <td><?= $book['book_description'] ?></td>
                            <td><?= $book['author_name'] ?></td>
                            <td><?= $book['genre_name'] ?></td>
                            <!-- only admin -->
                            <?php if(isset($_SESSION['user']) && $_SESSION['user'][0]['role'] == 'admin'): ?>
                                <td>
                                    <a href="/book_edit?id=<?= $book['book_id'] ?>" class='btn btn-primary'>Edit</a>
                                    <a href="/book_delete?id=<?= $book['book_id'] ?>" class='btn btn-danger'>Delete</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
