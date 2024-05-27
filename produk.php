<?php
    require "koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    // get product by nama product/keyword
    if(isset($_GET['keyword'])){
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
    }
    // get product by kategori
    else if(isset($_GET['kategori'])){
        $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama=" . urldecode($_GET['kategori']) . "");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);

        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
    }
    // get product default
    else{
        $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeoFarma | Product</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Product</h1>
        </div>
    </div>

    <!-- body -->
    <div class="container py-5">
        <h3>Category</h3>
        <div class="row">
            <div class="col-lg-3 mb-5">
                <ul class="list-group">
                    <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
                       <a class="no-decoration" href="produk.php?kategori=<?php echo urlencode($kategori['nama']); ?>">
                            <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                       </a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <h3 class="text-center mb-3">Product</h3>
                <div class="row">
                    <?php while($produk = mysqli_fetch_array($queryProduk)){ ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="image/anxiety.jpg" class="card-img-top" alt="<?php echo ($data['nama']); ?>">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Whatever</h4>
                                <p class="card-text text-truncate">Whatever</p>
                                <p class="card-text text-harga">Rp.12323</p>
                                <a href="produk-detail.php?nama=gfdtrdt" class="btn warna4 text-white">View Details</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>