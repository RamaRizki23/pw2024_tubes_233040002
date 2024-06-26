<?php
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$queryProduk = mysqli_query($con, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .kotak {
        border: solid;
    }

    .summary-kategori {
background-color: #0a6b4a;
border-radius: 15px;
    }

    .summary-produk {
        background-color: #0a516b;
        border-radius: 15px;
    }

.no-decoration {
    text-decoration: none;
}
</style>

<body>
            <?php require "navbar.php"; ?>
            <div class="container mt-4">
            <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fas fa-home"></i>Home
            </li>
        </ol>
        </nav>
     <h2>Halo Admin</h2>

     <div class="container mt-5">
         <div class="row">
             <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-kategori p-3">
                    <div class="row">
                        <div class="col-6">
                        <i class="fa-solid fa-list fa-7x text-black-50"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Category</h3>
                            <p class="fs-4"><?php echo $jumlahKategori;?> Category</p>
                            <p><a href="kategori.php" class="text-white no-decoration">See Details</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="summary-produk p-3">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa-solid fa-box fa-7x text-black-50"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Product</h3>
                            <p class="fs-4"><?php echo $jumlahProduk;?> Product</p>
                            <p><a href="produk.php" class="text-white no-decoration">See Details</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>