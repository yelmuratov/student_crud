<?php
    use App\Models\Genre\Genre;
    $id = $_GET['id'];
    $genre = Genre::find($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit genre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <a href="/categories" class='btn btn-primary'>Back</a>
        <h1>Edit Genre</h1>
        <form action="/update_genre?id=<?= $genre['id'] ?>" method="post" id="editForm">
            <div>
                <label for="name">Genre</label>
                <input type="text" class='form-control' name="name" id="name" value="<?= $genre['name'] ?>" required>
            </div>
            <div>
                <label for="name">Genre description</label>
                <input type="text" class='form-control' name="description" id="name" value="<?= $genre['description'] ?>" required>
            </div>
            <button type="submit" class='btn btn-primary mt-4'>Update</button>
        </form>
    </div>
</body>
</html>
