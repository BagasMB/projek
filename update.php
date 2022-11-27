<?php
include("cont.php");
require 'cont.php';

$nis = $_GET['update'];
$sqlget = "SELECT * FROM siswa WHERE nis='$nis'";
$queryget = mysqli_query($conn, $sqlget);
$data = mysqli_fetch_array($queryget);


if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $absen = $_POST['absen'];
    $name = $_POST['name'];
    $kelas = $_POST['kelas'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE `siswa` SET `nis`='$nis',`absen`='$absen',`name`='$name',`kelas`='$kelas',`gender`='$gender',`alamat`='$alamat' WHERE nis=$nis";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=Selamat Data Anda Telah DiUpdate<meta http-equiv=refresh content=3;URL='index.php'>");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link href="img/smk.png" rel="icon">
    <link href="img/download.png" rel="apple-touch-icon">

    <!-- Booststrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Booststrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Css -->
    <link rel="stylesheet" href="css/style.css">

    <title>X RPL B</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg mb-5" style="background-color: deepskyblue;">
        <div class="container">
            <a class="navbar-brand link-light" href="#">Data Class</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link link-light fw-bold" aria-current="page" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
                    <a class="nav-link link-light fw-bold" href="add.php"><i class="bi bi-plus-lg"></i> Add New</a>
                    <a class="nav-link link-light fw-bold" href="index.php">Back <i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Update Data</h3>
            <p class="text-muted">update data user</p>  
        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width:300px;">
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Nis :</label>
                        <input type="text" class="form-control" name="nis" id="nis" value="<?php echo "$data[nis]"?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">No Absensi :</label>
                        <input type="text" class="form-control" name="absen" id="absen" value="<?php echo "$data[absen]"?>">
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Nama :</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo "$data[name]"?>">
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Kelas :</label>
                        <input type="text" class="form-control" name="kelas" id="kelas" value="<?php echo "$data[kelas]"?>">
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Alamat :</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo "$data[alamat]"?>">
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Jenis Kelamin:</label>
                        <select name="gender" id="gender" class="form-select" required>
                            <option><?php echo"$data[gender]"?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Special">Special</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="submit"><i class="bi bi-upload"></i> Update</button>
                <a href="index.php" class="btn btn-danger mt-3"><i class="bi bi-x-lg"></i> Cancel</a>
            </form>
        </div>
    </div>

    <!-- Js Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>