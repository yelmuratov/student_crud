<?php
    if(!isset($_SESSION['user'])) {
        ?>
        <script>
            alert('You are not authorized to create genre');
            window.location.href = '/genres';
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
    <a href="/genres" class='btn btn-primary'>Back</a>
    <h1>Genre create</h1>
    <form action="/save_genre" id="myForm" method="post">
        <div>
            <label for="name">Genre</label>
            <input type="text" class='form-control' name="name" id="name">
        </div>
        <div>
            <label for="name">Description</label>
            <input type="text" class='form-control' name="description" id="name">
        </div>
        <button type="submit" class='btn btn-primary mt-4'>Create</button>
    </form>
    </div>
</body>

<script>
    function clearForm() {
        document.getElementById('myForm').reset(); // Clear the form
    }
</script>
</html>