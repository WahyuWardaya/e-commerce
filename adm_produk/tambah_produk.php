<?php

use function PHPSTORM_META\type;

include '../connection/sessionConnection.php' ?>

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
            <h3>Tambah Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY idcategory desc");
                        while ($s = mysqli_fetch_array($kategori)) {
                        ?>
                            <option value="<?php echo $s['idcategory'] ?>"><?php echo $s['category_name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                    <input type="file" name="img" class="input-control" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                    <input type="text" name="size" class="input-control" placeholder="Size" required>
                    <select class="input-control" name="status">
                        <option value="">Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Tambah">
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    // print_r($_FILES['img']);
                    // menampung input form
                    $kategori  = $_POST['kategori'];
                    $nama      = $_POST['nama'];
                    $harga     = $_POST['harga'];
                    $deskripsi = $_POST['deskripsi'];
                    $size      = $_POST['size'];
                    $status    = $_POST['status'];

                    // menampung data file yang diupload
                    $filename = $_FILES['img']['name'];
                    $tmp_name = $_FILES['img']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'produk' . time() . '.' . $type2;

                    echo $type2;

                    // menampung data format file yang disetujui
                    $izin = array('jpg', 'jpeg', 'gng', 'gif');

                    // Validasi format file
                    if (!in_array($type2, $izin)) {
                        echo '<script>alert("fromat file tidak diIzinkan")</script)';
                    } else {
                        // proses upload dan insert ke database jika format dalam array sudah diIzinkan
                        move_uploaded_file($tmp_name, '../img_produk/' . $newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_product (idcategory, product_name, product_price, product_description, product_image, product_status, product_size) VALUES ('$kategori', '$nama', '$harga', '$deskripsi', '$newname', '$status', '$size')");
                        if ($insert) {
                            echo 'simpan data berhasil';
                        } else {
                            echo 'gagal' . mysqli_error($conn);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>