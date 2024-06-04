<?php include '../connection/sessionConnection.php' ?>

<?php
$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE idcategory='" . $_GET['id'] . "'");
if (mysqli_num_rows($kategori) == 0) {
    echo '<script>window.location="../adm_kategori/kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);
?>

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
            <h3>Update Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->category_name ?>" required>
                    <input type="submit" name="submit" value="Update">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = ucwords($_POST['nama']);

                    $update = mysqli_query($conn, "UPDATE tb_category SET category_name ='" . $nama . "' WHERE idcategory ='" . $k->idcategory . "' ");

                    if ($update) {
                        echo '<script>alert("Update Data Berhasil")</script>';
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