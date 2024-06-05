<?php include '../e-commerce/connection/conn.php';
if ($conn) {

    if (isset($_GET['id'])) {
        $delete = mysqli_query($conn, "DELETE FROM tb_category WHERE idcategory ='" . $_GET['id'] . "' ");
        echo '<script>window.location="../e-commerce/adm_kategori/kategori.php"</script>';
    }

    if (isset($_GET['idProduk'])) {
        $produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE idproduct = '" . $_GET['id'] . "'");
        $p = mysqli_fetch_object($produk);

        unlink('../dist/img/img_user' . $p->product_image);

        $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE idproduct = '" . $_GET['id'] . "'");
        echo '<script>window.location="../adm_produk/produk.php"</script>';
    }
}
