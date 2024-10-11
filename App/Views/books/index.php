<?php
    use App\Models\Book\Book;
    use App\Models\Author\Author;
    use App\Models\Genre\Genre;
    
    $sql = "
    SELECT 
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

    echo "<pre>";
    print_r($books);
    echo "</pre>";

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
        <h2 class="text-center mb-4">Books CRUD</h2>

        <!-- Add Book Form -->
        <form>
            <div class="mb-3">
                <label for="bookTitle" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="bookTitle">
            </div>
            <div class="mb-3">
                <label for="bookDescription" class="form-label">Description</label>
                <textarea class="form-control" id="bookDescription"></textarea>
            </div>
            <div class="mb-3">
                <label for="bookText" class="form-label">Text</label>
                <textarea class="form-control" id="bookText"></textarea>
            </div>
            <div class="mb-3">
                <label for="bookImg" class="form-label">Image</label>
                <input type="file" class="form-control" id="bookImg">
            </div>
            <div class="mb-3">
                <label for="bookGenre" class="form-label">Genre</label>
                <select class="form-select" id="bookGenre">
                    <option selected>Select Genre</option>
                    <!-- Add genres dynamically -->
                </select>
            </div>
            <div class="mb-3">
                <label for="bookAuthor" class="form-label">Author</label>
                <select class="form-select" id="bookAuthor">
                    <option selected>Select Author</option>
                    <!-- Add authors dynamically -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>

        <!-- Book List with Edit/Delete -->
        <div class="mt-5">
            <h3>Books List</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Genre</th>
                        <th>Author</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($books as $book): ?>
                        <tr>
                            <td><?= $book['title'] ?></td>
                            <td><?= $book['description'] ?></td>
                            <td><?= $book['text'] ?></td>
                            <td><?= $book['author_id'] ?></td>
                            <td>
                                <a href="/books/edit?id=<?= $book['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="/books/delete?id=<?= $book['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
