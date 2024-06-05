<?php

include '../connection/sessionConnection.php';
$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE idproduct = '" . $_GET['id'] . "'");
$p = mysqli_fetch_object($produk);
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
            <h3>Edit Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY idcategory desc");
                        while ($s = mysqli_fetch_array($kategori)) {
                        ?>
                            <option value="<?php echo $s['idcategory'] ?>" <?php echo ($s['idcategory'] == $p->idcategory) ? 'selected' : ''; ?>><?php echo $s['category_name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->product_price ?>" required>

                    <img src="../dist/img/img_user <?php echo $p->product_image ?>">
                    <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                    <input type="file" name="img" class="input-control">
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi" value="<?php echo $p->product_description ?>"></textarea>
                    <input type="text" name="size" class="input-control" placeholder="Size" required>
                    <select class="input-control" name="status">
                        <option value="">Pilih Status</option>
                        <option value="1 <?php ($p->product_status == 1) ? 'selected' : '' ?>">Aktif</option>
                        <option value="0 <?php ($p->product_status == 0) ? 'selected' : '' ?>">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Tambah">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    //  data input dari form
                    $kategori  = $_POST['kategori'];
                    $nama      = $_POST['nama'];
                    $harga     = $_POST['harga'];
                    $deskripsi = $_POST['deskripsi'];
                    $size      = $_POST['size'];
                    $status    = $_POST['status'];
                    $status    = $_POST['foto'];
                    // nampung data gambar baru
                    $filename = $_FILES['img']['name'];
                    $tmp_name = $_FILES['img']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'produk' . time() . '.' . $type2;

                    $izin = array('jpg', 'jpeg', 'gng', 'gif');
                    // jika ganti gambar
                    if ($filename != '') {
                        if (!in_array($type2, $izin)) {
                            echo '<script>alert("fromat file tidak diIzinkan")</script)';
                        } else {
                            unlink('../dist/img/img_user' . $foto);
                            move_uploaded_file($tmp_name, '../img_produk/' . $newname);
                            $namagambar = $newname;
                        }
                    } else {
                        // jiki tidak
                        $namagambar = $foto;
                    }
                    $update = mysqli_query($conn, "UPDATE tb_product SET idcategory = '" . $kategori . "',product_name = '" . $nama . "',product_price = '" . $harga . "',product_description = '" . $deskripsi . "',product_image = '" . $namagambar . "',product_status = '" . $status . "',product_size = '" . $size . "' WHERE idproduct = '" . $p->idproduct . "' ");

                    if ($update) {
                        echo '<script>alert("Update Data Berhasil")</script>';
                        echo '<script>window.location="../adm_produk/produk.php"</script>';
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