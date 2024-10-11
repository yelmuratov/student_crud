<?php
    use App\Models\Author\Author;
    use App\Models\Genre\Genre;

    $authors = Author::getAll();
    $genres = Genre::getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2 class="text-center mb-4">Books CRUD</h2>
        <?php
            if(isset($_SESSION['book_create'])) {
                echo "<div class='alert alert-success'>".$_SESSION['book_create']."</div>";
                unset($_SESSION['book_create']);
            }
            if(isset($_SESSION['book_update'])) {
                echo "<div class='alert alert-success'>".$_SESSION['book_update']."</div>";
                unset($_SESSION['book_update']);
            }
            if(isset($_SESSION['book_delete'])) {
                echo "<div class='alert alert-danger'>".$_SESSION['book_delete']."</div>";
                unset($_SESSION['book_delete']);
            }
        ?>
        <!-- Add Book Form -->
        <form action='/save_book' method="POST" enctype='multipart/form-data'>
            <div class="mb-3">
                <label for="bookTitle" class="form-label">Book Title</label>
                <input type="text" name="title" class="form-control" placeholder="Book title" id="bookTitle">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <select class="form-select" id="author" name="author_id">
                    <option selected>Select Author</option>
                    <?php foreach($authors as $author): ?>
                        <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="bookGenre" class="form-label">Genre</label>
                <select class="form-select" id="bookGenre" name="genre_id">
                    <option selected>Select Genre</option>
                    <?php foreach($genres as $genre): ?>
                        <option value="<?= $genre['id'] ?>"><?= $genre['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="bookDescription" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="bookDescription" placeholder="Description"></textarea>
            </div>
            <div class="mb-3">
                <label for="bookText" class="form-label">Text</label>
                <textarea class="form-control" name="text" id="bookText" placeholder="Text about book"></textarea>
            </div>
            <div class="mb-3">
                <label for="bookImg" class="form-label">Image</label>
                <input type="file" class="form-control" name="img" id="bookImg">
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
            <a href="/books" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

<script>
    function clearForm() {
        document.getElementById('myForm').reset(); // Clear the form
    }
</script>
</html>