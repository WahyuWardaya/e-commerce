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

    <div class="container">
        <h3>Data Produk</h3>
        <div class="box">
            <a class="btn btn-primary" href="../adm_produk/tambah_produk.php">Tambah Produk</a>
            <table border="2" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Size</th>
                        <th>Status</th>
                        <th width="10px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING(idcategory) ORDER BY idproduct DESC");
                    if (mysqli_num_rows($produk) > 0) {
                        while ($row = mysqli_fetch_array($produk)) {
                    ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['category_name'] ?></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td><?php echo $row['product_price'] ?></td>
                                <td><img src="../dist/img/img_user/<?php echo $row['product_image'] ?>" width="100px"></td>
                                <td><?php echo $row['product_size'] ?></td>
                                <td><?php echo $row['product_status'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="../adm_produk/update_produk.php?idProduk=<?php echo $row['idproduct'] ?>">
                                        Edit
                                    </a>
                                    <a class="btn btn-danger" href="../hapus_data.php?idProduk=<?php echo $row['idproduct'] ?>" onclick="return confirm('Yakin Menghapus Kategori Ini!?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="8">Tidak ada data</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
</body>

</html>