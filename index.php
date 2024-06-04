<?php
session_start();
include 'connection/conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Baju</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/style/styleUser.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    
</head>
<body>
    <!-- Navbar -->
    <?php include 'components/userComponents/navbar.php'?>
 <!-- Navbar -->


<!-- Main content -->
<div class="main-content">
    <div class="carousel-container mt-5" style="max-width: 1140px; margin: 0 auto;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="dist/img/img_user/banner_1.jpg" class="d-block w-100" alt="Image Banner - 1">
                </div>
                <div class="carousel-item">
                    <img src="dist/img/img_user/banner_2.jpg" class="d-block w-100" alt="IImage Banner - 2">
                </div>
                <div class="carousel-item">
                    <img src="dist/img/img_user/banner_3.jpg" class="d-block w-100" alt="Image Banner - 3">
                </div>
                <div class="carousel-item">
                    <img src="dist/img/img_user/banner_4.jpg" class="d-block w-100" alt="Image Banner - 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <h2 class="text-center my-4 mt-5">Filtered based on Sizes</h2>

    <div class="category-selection text-center my-4">
        <button class="btn btn-light m-2" onclick="filterProducts('All')">All Size</button>
        <button class="btn btn-light m-2" onclick="filterProducts('S')">Small</button>
        <button class="btn btn-light m-2" onclick="filterProducts('M')">Medium</button>
        <button class="btn btn-light m-2" onclick="filterProducts('L')">Large</button>
        <button class="btn btn-light m-2" onclick="filterProducts('XL')">XL</button>
    </div>

    <!-- Card Grid -->
    <div class="container">
        <div class="row" id="product-grid">
            <?php
                $sql = "SELECT * FROM tb_product ORDER BY RAND() LIMIT 6";
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
                    echo "<div class='col-12'><p>No results found.</p></div>";
                }
                $conn->close();
            ?>
        </div>
    </div>

    <h2 class="text-center my-2 mt-5">Where are you goin?</h2>
    <p class="text-center">Let us help you to choose your outfit based on where you going!</p>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="#" class="box-link">
                    <div class="box text-center" style="position: relative; width: 146px; height: 153px; border: 1px solid #ddd; margin: 10px;">
                        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                        <img src="dist/img/img_user/card-work.jpg" alt="image work" style="width: 100%; height: 100%; object-fit:cover; object-position: 50% 10%;">
                        <p class="title" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; margin: 0;">Work Outfit</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="#" class="box-link">
                    <div class="box text-center" style="position: relative; width: 146px; height: 153px; border: 1px solid #ddd; margin: 10px;">
                        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                        <img src="dist/img/img_user/card-sport.jpg" alt="image exercise" style="width: 100%; height: 100%; object-fit:cover; object-position: 50% 5%;">
                        <p class="title" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; margin: 0;">Exercise Outfit</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="#" class="box-link">
                    <div class="box text-center" style="position: relative; width: 146px; height: 153px; border: 1px solid #ddd; margin: 10px;">
                        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                        <img src="dist/img/img_user/card-casual.jpg" alt="image casual" style="width: 100%; height: 100%; object-fit:cover; object-position: 50% 10%;">
                        <p class="title" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; margin: 0;">Casual Outfit</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="#" class="box-link">
                    <div class="box text-center" style="position: relative; width: 146px; height: 153px; border: 1px solid #ddd; margin: 10px;">
                        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                        <img src="dist/img/img_user/card-muslim.jpg" alt="image muslimic" style="width: 100%; height: 100%; object-fit:cover;">
                        <p class="title" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; margin: 0;">Muslimic Outfit</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="#" class="box-link">
                    <div class="box text-center" style="position: relative; width: 146px; height: 153px; border: 1px solid #ddd; margin: 10px;">
                        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                        <img src="dist/img/img_user/card-party.jpg" alt="image party" style="width: 100%; height: 100%; object-fit:cover;">
                        <p class="title" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; margin: 0;">Party Outfit</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="#" class="box-link">
                    <div class="box text-center" style="position: relative; width: 146px; height: 153px; border: 1px solid #ddd; margin: 10px;">
                        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                        <img src="dist/img/img_user/card-beach.jpg" alt="image beach" style="width: 100%; height: 100%; object-fit:cover;">
                        <p class="title" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; margin: 0;">Beach Outfit</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    
    <div class="container mt-5">
    <div class="jumbotron text-white " style="background-color: #343a40;">
        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4">Subscribe for the daily Updates</h1>
                <p class="lead">Stay updated with our latest news and updates. Subscribe to our newsletter and never miss out!</p>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form class="w-100">
                    <div class="form-row">
                        <div class="col-8">
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-warning btn-block">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div> <!-- End of Main Content -->

</div>

<!-- Footer -->
<?php include 'components/userComponents/footer.php'?>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/c200c8089e.js" crossorigin="anonymous"></script>

<script>
    function filterProducts(size) {
        $.ajax({
            url: 'getFilter.php',
            type: 'GET',
            data: { size: size },
            success: function(data) {
                $('#product-grid').html(data);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }
</script>

</body>
</html>