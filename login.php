<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="box-login">
        <h2>Silahkan Login</h2>
        <form action="" method="post">
            <input type="text" name="user" placeholder="Username">
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" name="submit" value="Login">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            include 'koneksi.php';

            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $sql = mysqli_query($conn, "SELECT*FROM tb_admin WHERE username='" . $user . "' AND password = '" . MD5($pass) . "'");
            echo mysqli_num_rows($sql);
        }
        ?>
    </div>
</body>

</html>