<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Book Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
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

    <!-- Hero Section -->
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Welcome to Our E-Book Store</h1>
        <p>Discover a vast collection of e-books across various genres</p>
        <a href="#" class="btn btn-light btn-lg">Browse Now</a>
    </div>

    <!-- Categories Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Popular Categories</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Fiction">
                    <div class="card-body">
                        <h5 class="card-title">Fiction</h5>
                        <p class="card-text">Explore top fiction books from various genres and authors.</p>
                        <a href="#" class="btn btn-primary">View Fiction</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Science">
                    <div class="card-body">
                        <h5 class="card-title">Science</h5>
                        <p class="card-text">Dive into the latest scientific discoveries and research.</p>
                        <a href="#" class="btn btn-primary">View Science</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="History">
                    <div class="card-body">
                        <h5 class="card-title">History</h5>
                        <p class="card-text">Uncover the past with insightful historical books.</p>
                        <a href="#" class="btn btn-primary">View History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Best Sellers</h2>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Best Seller 1">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 1</h5>
                        <p class="card-text">Author 1</p>
                        <a href="#" class="btn btn-secondary">Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Best Seller 2">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 2</h5>
                        <p class="card-text">Author 2</p>
                        <a href="#" class="btn btn-secondary">Details</a>
                    </div>
                </div>
            </div>
            <!-- Add more best sellers similarly -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <h5 class="text-uppercase">About Us</h5>
                    <p>We provide a wide range of e-books in different categories to meet every reader’s needs.</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <h5 class="text-uppercase">Follow Us</h5>
                    <a href="#" class="me-3 text-dark">Facebook</a>
                    <a href="#" class="me-3 text-dark">Twitter</a>
                    <a href="#" class="me-3 text-dark">Instagram</a>
                </div>
            </div>
        </div>
        <div class="text-center p-3 bg-dark text-white">
            © 2024 E-Book Store. All Rights Reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
