<?php include 'connection/sessionConnection.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <?php include 'components/navbarAdmin.php' ?>
    <!-- Navbar -->

    <!-- Profile start -->
    <div class="section">
        <div class="container">
            <h3>Profile</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                    <input type="text" name="noTlp" placeholder="Nomor Telpon" required>
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="submit" name="submit" value="Update Profile">
                </form>
            </div>
        </div>
    </div>
    <!-- Profile End -->
</body>

</html>