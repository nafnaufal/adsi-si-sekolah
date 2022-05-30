<?php

    session_start();

    if($_SESSION["no"] == NULL){
        header("location: ../../../login.html", true, 303);
    }

    $con = mysqli_connect("localhost","root","","sekolah");
    $nisn = $_POST["nisn"];

    $qget = "SELECT * FROM nilai where nisn = $nisn";
    $hasil = mysqli_query($con,$qget);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>Delete Nilai</title>
    </head>

    <body>
        <div class="container-fluid" style="min-height: 100vh;">
        <div class="row">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light col-lg-5" style="width: 280px;">
                <a href="../../../home.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <img class="me-3" src="../../../assets/logo.png" height="50">
                <span class="fs-4">Simsapo</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="../guru.php" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Data nilai
                    </a>
                </li>
                </li>
                <li>
                    <a href="../../jadwal.php" class="nav-link link-dark">
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
                    <li><a class="dropdown-item" href="../../../profile.php">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../../../logout.php">Sign out</a></li>
                </ul>
                </div>
            </div>

        <div class="col-lg-7" style="min-height: 100vh;">

        <div class="container-fluid">
                <div class="container mt-5">
                    <form action="./redirect.php" method="post">
                        <div class="mb-3 row">
                            <label for="id" class="col-sm-2 col-form-label">NISN</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="id" id="id">
                                    <?php foreach ($hasil as $i) {
                                        $kodeM = $i["kode_mapel"];
                                        $mapel = "SELECT * FROM mapel WHERE kode = '$kodeM'";
                        
                                        $namaM = mysqli_query($con,$mapel);
                                        $dataM = mysqli_fetch_array($namaM);

                                        echo '<option value="'.$i["id"].'"> Semester '.$i["semester"].' - '.$dataM["nama"].'</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        
                        <input class = "btn btn-primary" type="submit" nama="kirim" value="Send">
                        
                    </form>
                        <button class = "btn btn-danger mt-2" onclick="location.href='../guru.php'">
                            Back
                        </button>
                </div>
            </div>
        </div>
        </div>
    </div>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>