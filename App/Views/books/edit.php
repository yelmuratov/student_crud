<?php
    use App\Models\Book\Book;
    $id = $_GET['id'];
    $book = Book::find($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <a href="/categories" class='btn btn-primary'>Back</a>
        <h1>Edit Book</h1>
        <form action="/update_book?id=<?= $book['id'] ?>" method="post" id="editForm">
            <!-- hidded input for id -->
            <input type="hidden" name="id" value="<?= $book['id'] ?>">
            <input type="hidden" name="genre_id" value="<?= $book['genre_id'] ?>">
            <input type="hidden" name="author_id" value="<?= $book['author_id'] ?>">
            <div>
                <label for="name">Title</label>
                <input type="text" class='form-control' name="title" id="name" value="<?= $book['title'] ?>" required>
            </div>
            <div>
                <label for="name">Description</label>
                <input type="text" class='form-control' name="description" id="name" value="<?= $book['description'] ?>" required>
            </div>
            <div>
                <label for="name">Text</label>
                <input type="text" class='form-control' name="text" id="name" value="<?= $book['text'] ?>" required>
            </div>
            <div>
                <label for="name">Image</label>
                <input type="file" class='form-control' name="img" id="name" value="<?= $book['img'] ?>">
            </div>
            <button type="submit" class='btn btn-primary mt-4'>Update</button>
        </form>
    </div>
</body>
</html>
