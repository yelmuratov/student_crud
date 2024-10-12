<?php
    if(!isset($_SESSION['user'])) {
        ?>
        <script>
            alert('You are not authorized to access this page');
            window.location.href = '/login';
        </script>
        <?php
    }
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
    <div class="container mt-4">
    <a href="/categories" class='btn btn-primary'>Back</a>
    <h1>Author create</h1>
    <form action="/save_author" id="myForm" method="post">
        <div>
            <label for="name">Author full name</label>
            <input type="text" class='form-control' name="name" id="name">
        </div>
        <div>
            <label for="name">Bio</label>
            <input type="text" class='form-control' name="bio" id="name">
        </div>
        <button type="submit" class='btn btn-primary mt-4'>Create</button>
    </form>
    </div>
</body>
</html>