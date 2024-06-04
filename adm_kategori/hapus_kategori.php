<?php include '../connection/sessionConnection.php';

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_category WHERE idcategory ='" . $_GET['id'] . "' ");
    echo '<script>window.location="../adm_kategori/kategori.php"</script>';
}
