<?php
 require "../koneksi.php";

 $id = $_GET['p'];

 $query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
 $data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<div>
    <?php require "navbar.php" ?>

    <div class="container mt-5">
    <h2>Details Category</h2>

    <div class="col-12 col-md-6">
    <form action="" method="post">
        <div>
            <label for="kategori">Category</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo $data['nama']; ?>">
        </div>

        <div class="mt-5 d-flex justify-content-between">
    <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
    <button type="submit" class="btn btn-danger" name="deletetBtn">Delete</button>
        </div>
    </form>

    <?php
    if(isset($_POST['editBtn'])){
        $kategori = htmlspecialchars($_POST['kategori']);

        if($data['nama']==$kategori){
            ?>
                <meta http-equiv="refresh" content="0; url=kategori.php" />
            <?php
        }
        else{
            $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
            $jumlahData = mysqli_num_rows($query);

            if($jumlahData > 0){
                ?>
    <div class="alert alert-warning mt-3" role="alert">
                Categories Already Exist!
</div>
                <?php
            }
            else{
                $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");

                if($querySimpan){
                    ?>
                    <div class="alert alert-primary mt-3" role="alert">
                    Category Updated Successfully
</div>
                    <meta http-equiv="refresh" content="0; url=kategori.php" />
                    <?php
                }
                else{
                    echo mysqli_error($con);

                    if($queryDelete){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                    Category Successfully Deleted
</div>
<meta http-equiv="refresh" content="0; url=kategori.php" />

                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }
        }
    }

    if(isset($_POST['deleteBtn'])){
        $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");
    }
    ?>
    </div>
</div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>