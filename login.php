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
        require 'connection/sessionConnection.php';

        if (isset($_POST['submit'])) {
            $username = $_POST['user'];
            $password = md5($_POST['pass']); // Encrypt password with MD5

            // Query untuk memeriksa username dan password
            $sql = "SELECT idadmin, username FROM tb_admin WHERE username = '$username' AND password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Menyimpan data ke sesi
                $_SESSION['login'] = true;
                $_SESSION['idadmin'] = $row['idadmin'];
                $_SESSION['username'] = $row['username'];

                header("Location: dashboard.php"); // Redirect ke halaman dashboard
                exit();
            } else {
                echo "Username atau password salah!";
            }
        }
        ?>
    </div>
</body>

</html>