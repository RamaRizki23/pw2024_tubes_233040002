<?php
require "koneksi.php";

$queryProduk = $con->prepare("SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
$queryProduk->execute();
$resultProduk = $queryProduk->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeoFarma | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    
    <!-- Banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Drugstore, Books and Articles</h1>
            <h3>What are you looking for?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Product Name" aria-label="Product Name" name="keyword">
                        <button type="submit" class="btn warna4 text-white">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Highlighted Categories -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Best seller</h3>
            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-anxiety d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=buku">Buku Anxiety</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-filosofi d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=buku">Buku Filosofi Teras</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-kes-mental d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=buku">Buku Kesehatan Mental</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Us -->
    <div class="container-fluid warna5 py-5">
        <div class="container text-center">
            <h3>About Us</h3>
            <p class="fs-5 mt-3">Welcome to the NeoFarma Website. This website is intended to sell medicines and also books and articles online. For those of you who want to know about mental health and more, this website is very suitable for you. There are also several medicines sold legally here.</p>
        </div>
    </div>

    <!-- Products -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Products</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($resultProduk)){ ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="image-box">
                            <img src="image/<?php echo ($data['foto']); ?>" class="card-img-top" alt="<?php echo ($data['nama']); ?>">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo ($data['nama']); ?></h4>
                            <p class="card-text text-truncate"><?php echo ($data['detail']); ?></p>
                            <p class="card-text text-harga">Rp.<?php echo number_format($data['harga'], 0, ',', '.'); ?></p>
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn warna4 text-white">View Details</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-secondary mt-3 p-3 fs-4" href="produk.php">See More</a>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php" ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>
