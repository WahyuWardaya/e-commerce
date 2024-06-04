<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Toko Baju</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.html">Man</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">Women</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Kids</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Accessories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hot Deals</a>
                </li>
            </ul>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="cart.html"><i class="fas fa-shopping-cart fa-lg mr-2"></i></a>
                <?php if(isset($_SESSION['username'])): ?>
                    <p class="lead text-white mt-1 mb-0">Hello, <span class="font-weight-bold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>!</p>
                    <a class="btn btn-danger mt-1 ml-2" style="height: 40px;" href="logout.php"><i class="fas fa-sign-out-alt fa-lg"></i> Logout</a>
                <?php else: ?>
                <a class="btn btn-success" href="login.php"><i class="fas fa-user fa-lg "></i> Masuk / Daftar</a>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</nav>