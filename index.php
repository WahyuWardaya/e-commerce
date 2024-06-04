<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Baju</title>
    <link rel="stylesheet" href="dist/style/styleUser.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Toko Baju</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?page=tentang">Tentang</a></li>
                    <li><a href="index.php?page=kontak">Kontak</a></li>
                    <li><a href="index.php?page=bantuan">Bantuan</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    include $page.'.php';
                } else {
                    include 'home.php';
                }
            ?>
        </main>
        <footer>
            <p>&copy; 2020, Undiknas University</p>
        </footer>
    </div>

</body>
</html>