<?php
include 'connection/sessionConnection.php';
?>

<?php

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$idadmin = $_SESSION['idadmin'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update profil
    $nama = $_POST['nama'];
    $noTlp = $_POST['noTlp'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $sql = "UPDATE tb_admin SET admin_name = '$nama', admin_telp = '$noTlp', admin_email = '$email', username = '$username' WHERE idadmin = $idadmin";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Profile Berhasil Diperbarui")</script>';
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Ambil data profil
$sql = "SELECT admin_name, admin_telp, admin_email, username FROM tb_admin WHERE idadmin = $idadmin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Tidak ditemukan data untuk idadmin: $idadmin";
    exit();
}
?>

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
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $row['admin_name']; ?>" required>
                    <input type="text" name="noTlp" placeholder="Nomor Telpon" class="input-control" value="<?php echo $row['admin_telp']; ?>" required>
                    <input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $row['admin_email']; ?>" required>
                    <input type="text" name="username" placeholder="Username" class="input-control" value="<?php echo $row['username']; ?>" required>
                    <input type="submit" name="submit" value="Update">
                </form>
            </div>
        </div>
    </div>
    <!-- Profile End -->
</body>

</html>