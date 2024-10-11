<?php
    use App\Models\category\Category;
    $id = $_GET['id'];
    $student = Category::find($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <a href="/categories" class='btn btn-primary'>Back</a>
        <h1>Edit Student</h1>
        <form action="/edit_ct?id=<?= $student['id'] ?>" method="post" id="editForm">
            <div>
                <label for="name">Name</label>
                <input type="text" class='form-control' name="name" id="name" value="<?= $student['name'] ?>" required>
            </div>
            <button type="submit" class='btn btn-primary mt-4'>Update</button>
        </form>
    </div>
</body>
</html>
