<?php include '../connection/sessionConnection.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Baju Teknologi Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<!-- js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- js -->

<body>
    <!-- Navbar -->
    <?php include '../components/navbarAdmin.php' ?>
    <!-- Navbar -->

    <div class="section">
        <div class="container">
            <h3>Tambah Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Update">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = ucwords($_POST['nama']);

                    $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES(Null,'" . $nama . "')");

                    if ($insert) {
                        echo '<script>alert("Tambah Data Berhasil")</script>';
                        echo '<script>window.location="../adm_kategori/kategori.php"</script>';
                    } else {
                        echo 'gagal' . mysqli_error($conn);
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>