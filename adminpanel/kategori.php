<?php
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .no-decoration{
    text-decoration: none;
}
</style>

<body>
<?php require "navbar.php"; ?>
<div class="container mt-4">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../adminpanel" class="no-decoration text-muted">
                    <i class="fas fa-home"></i>Home             
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Category
            </li>
        </ol>
    </nav>

    <div class="my-5 col-12 col-md-6">
        <h3>Add Category</h3>

        <form action="" method="post">
            <div>
                <label for="kategori">Category</label>
                <input type="text" id="kategori" name="kategori" placeholder="Input category name" class="form-control">
            </div>
            <div class="mt-3">
                <button class="btn btn-primary" type="submit" name="simpan_kategori">Save</button>
            </div>
        </form>

        <?php
        if(isset($_POST['simpan_kategori'])){
            $kategori = htmlspecialchars($_POST['kategori']);

            $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
            $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

            if($jumlahDataKategoriBaru > 0){
                ?>
                <div class="alert alert-warning mt-3" role="alert">
                Categories Already Exist!
</div>
                <?php
            }
            else{
                $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");

                if($querySimpan){
                    ?>
                    <div class="alert alert-primary mt-3" role="alert">
                    Category Saved Successfully
</div>
                    <meta http-equiv="refresh" content="0; url=kategori.php" />
                    <?php
                }
                else{
                    echo mysqli_error($con);
                }
            }
        }
        ?>
    </div>

    <div class="mt-3">
    <h2>List Category</h2>
    <div class="table-responsive mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($jumlahKategori==0){
                    ?>
                    <tr>
                        <td colspan=3 class="text-center">No category data</td>
                    </tr>
                    <?php
                    }
                    else{
                        $jumlah = 1;
                        while($data=mysqli_fetch_array($queryKategori)){
                            ?>
                            <tr>
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td>
                                    <a href="kategori-detail.php?p=<?php echo $data['id'] ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                </td>
                            </tr>
                            <?php
                            $jumlah++;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>