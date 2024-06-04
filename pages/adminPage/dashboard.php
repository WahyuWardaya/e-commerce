<?php include 'connection/sessionConnection.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Baju Teknologi Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: rgb(197, 255, 248);">
        <div class="container">
            <a class="navbar-brand" href="#">IT Gear</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link active" aria-current="page" href="#">Tambah Kategori</a>
                    <a class="nav-link active" aria-current="page" href="#">Tambah Produk</a>
                    <a class="nav-link active" aria-current="page" href="#">Profile</a>
                    <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
</body>

</html>