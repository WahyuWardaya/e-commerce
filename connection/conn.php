<?php
function getConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_ecommers";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Export the connection for use in other files
    return $conn;
}
$conn = getConnection();
?>