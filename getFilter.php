<?php
include 'connection/conn.php';

$size = $_GET['size'];



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch tb_products based on the size
if ($size == 'All') {
    $sql = "SELECT * FROM tb_product ORDER BY RAND() LIMIT 6";
} else {
    $sql = "SELECT * FROM tb_product WHERE product_size = '$size' ORDER BY RAND() LIMIT 6";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="dist/img/img_user/'.$row['product_image'].'" class="card-img-top" alt="'.$row['product_name'].'">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row['product_name'].'</h5>';
        echo '<p class="card-text">'.$row['product_description'].'</p>';
        echo '<p class="card-text"><strong>Rp '.$row['product_price'].'</strong></p>';
        echo '<a href="#" class="btn btn-primary">Add to Cart</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>
