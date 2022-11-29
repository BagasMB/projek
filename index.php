<?php

session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
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
    <nav class="navbar navbar-expand-lg navbar-dark text-uppercase" style="background-color: deepskyblue;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Data | Class</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link link-danger fw-bold" href="logout.php">log out <i class="bi bi-box-arrow-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Tabel -->
    <div class="container" style="margin-top: 3rem; border-radius:2px">
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            ' . $msg . '
            </div>';
        }
        ?>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
        <a href="add.php" class="btn btn-dark mb-4"><i class="bi bi-plus-lg"></i> Add New</a>

        <!-- Pencarian -->
        <form action="index.php" method="GET" class="mb-2" style="text-align: end;" autocomplete="off">
            <label class="form-label">Search : </label>
            <input type="text" name="cari" id="cari" placeholder="Search" value="<?php if (isset($_GET['cari'])) {
                                                                                        echo $_GET['cari'];
                                                                                    } ?>">
            <button type="submit"><i class="bi bi-search"></i></button>
            <a href="index.php" class="btn btn-danger mb-1"><i class="bi bi-arrow-clockwise"></i> Reset</a>
        </form>

        <!-- Table -->
        <table class="table table-hover text-center table-bordered border-dark table-striped" border="1">
            <thead class="table-primary table-bordered border-dark ">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nis</th>
                    <th scope="col">Absen</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Alamat</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("cont.php");
                // tombol percarian
                if (isset($_GET['cari'])) {
                    $pencarian = $_GET['cari'];
                    $query = "SELECT * FROM siswa WHERE nis like '%" . $pencarian . "%' or name like '%" . $pencarian . "%' or kelas like '%" . $pencarian . "%' or gender like '%" . $pencarian . "%'";
                } else {
                    $query = "SELECT * FROM siswa";
                }
                $no = 1;
                $ambildata = mysqli_query($conn, $query);
                while ($tampil = mysqli_fetch_array($ambildata)) {
                    echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[nis]</td>
                        <td>$tampil[absen]</td>
                        <td>$tampil[name]</td>
                        <td>$tampil[kelas]</td>
                        <td>$tampil[gender]</td>
                        <td>$tampil[alamat]</td>
                        <td> 
                            <a href='update.php?update=$tampil[nis]' class='link-dark'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>
                            <a href='?delete=$tampil[nis]' class='delete link-dark'>
                            <i class='fa-solid fa-trash fs-5'></i> 
                            </a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
        <?php
        if (isset($_GET['delete'])) {
            mysqli_query($conn, "DELETE FROM `siswa` WHERE nis='$_GET[delete]'")
                or die(mysqli_error($conn));
            echo "<script>
                alert('Data Berhasil terhapus');
                window.location = 'index.php';
            </script>";

            // header("Location: show.php?msg=Data Telah Terhapus");
            // echo "<meta http-equiv=refresh content=2;URL='show.php'>";
        }
        ?>
    </div>


    <footer>
        <!-- Js Boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    </footer>
</body>

</html>