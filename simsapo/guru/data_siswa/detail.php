<?php

    session_start();

    if($_SESSION["no"] == NULL){
        header("location: ../../login.html", true, 303);
    }

    $nisn =  $_GET["nisn"];
    
    $con = mysqli_connect("localhost","root","","sekolah");
    $siswa = "SELECT * FROM siswa WHERE nisn = '$nisn'";

    $nilai = "SELECT * FROM nilai WHERE nisn = '$nisn' ORDER BY semester";

    $hasilS = mysqli_query($con,$siswa);
    $dataS = mysqli_fetch_array($hasilS);
    
    $hasilN = mysqli_query($con,$nilai);
    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>Hasil</title>
    </head>
    
    <body>
        <div class="container-fluid" style="min-height: 100vh;">
        <div class="row">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light col-lg-5" style="width: 280px;">
                <a href="../../home.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <img class="me-3" src="../../assets/logo.png" height="50">
                <span class="fs-4">Simsapo</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="./guru.php" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Data nilai
                    </a>
                </li>
                </li>
                <li>
                    <a href="../jadwal.php" class="nav-link link-dark">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                    Jadwal
                    </a>
                </li>
                
                </ul>
                <hr>
                <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="../../profile.php">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../../logout.php">Sign out</a></li>
                </ul>
                </div>
            </div>

        <div class="col-lg-7" style="min-height: 100vh;">

        <div class="container text-center">
            <h4>Detail <?= $dataS["nama"] ?></h4>
        </div>
        <div class="container">
            <table class = "table mt-5">
                <tr>
                    <td class="col-sm-3 col-lg-3 col-md-3">NISN</td>
                    <td>: <?= $dataS["nisn"] ?> </td>
                </tr>
                <tr>
                    <td class="col-sm-3 col-lg-3 col-md-3">Nama</td>
                    <td>: <?= $dataS["nama"] ?> </td>
                </tr>
                <tr>
                    <td class="col-sm-3 col-lg-3 col-md-3">Tanggal lahir</td>
                    <td>: <?= $dataS["tanggal_lahir"] ?> </td>
                </tr>
                <tr>
                    <td class="col-sm-3 col-lg-3 col-md-3">Kelas</td>
                    <td>: <?= $dataS["kode_kelas"] ?> </td>
                </tr>
                <tr>
                    <td class="col-sm-3 col-lg-3 col-md-3">Alamat</td>
                    <td>: <?= $dataS["alamat"] ?> </td>
                </tr>

            </table>
            
            <p class = "mt-5">Data pembelajaran</p>
            <?php 

            echo '<table class = "table table-striped">';
            foreach ($hasilN as $i) {
                $kodeM = $i["kode_mapel"];
                $mapel = "SELECT * FROM mapel WHERE kode = '$kodeM'";

                $namaM = mysqli_query($con,$mapel);
                $dataM = mysqli_fetch_array($namaM);

                echo '<tr>';
                echo '<td>Semester '.$i["semester"].'</td>';

                echo '<td>
                
                <ul>
                <li>'.$dataM["nama"].': '.$i["nilai"].'
                </ul>'
                
                .'</td>';
                echo '</tr>';
                    
            }
            echo '</table>';
            ?>
        </div>
        </div>
    </div>
<!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>