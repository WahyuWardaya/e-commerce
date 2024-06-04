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
        <h3>Data Kategori</h3>
        <div class="box">
            <a class="btn btn-primary" href="../adm_kategori/tambah_kategori.php">Tambah Kategori</a>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="40px">No</th>
                        <th width="300px">Kategori</th>
                        <th width="50px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY idcategory desc");
                    while ($row = mysqli_fetch_array($kategori)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td>
                                <a class="btn btn-warning" href="../adm_kategori/update_kategori.php?id=<?php echo $row['idcategory'] ?>">
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="../adm_kategori/hapus_kategori.php?id=<?php echo $row['idcategory'] ?>" onclick="return confirm('Yakin Menghapus Kategori Ini!?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>