<?php
    session_start();

    if($_SESSION["no"] == NULL){
        header("location: ../login.html", true, 303);
    }
    
    $nip = 20201;
    $con = mysqli_connect("localhost","root","","sekolah");
    $qmapel = "SELECT * FROM jadwal WHERE kode_mapel IN (SELECT kode FROM mapel WHERE nip = '$nip')";
    
    $jadwal = array();

    $mapel = mysqli_query($con,$qmapel);
    while($i = mysqli_fetch_row($mapel)){
        $temp = array($i[1], $i[2], $i[3], $i[4]);
        array_push($jadwal, $temp);
    }


    $hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat");
    $jam = array("07:30:00", "09:20:00", "11:10:00", "13:30:00");
    
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
                <a href="../home.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <img class="me-3" src="../assets/logo.png" height="50">
                <span class="fs-4">Simsapo</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="./data_siswa/guru.php" class="nav-link link-dark">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Data nilai
                    </a>
                </li>
                </li>
                <li>
                    <a href="./jadwal.php" class="nav-link active" aria-current="page">
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
                    <li><a class="dropdown-item" href="../profile.php">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../logout.php">Sign out</a></li>
                </ul>
                </div>
            </div>

        <div class="col-lg-7" style="min-height: 100vh;">
        <div class="container text-center">
            <h4>Jadwal</h4>
        </div>

        <div class="container">
            
            <?php
            $cek = false;
            foreach ($hari as $h){
                echo '<p>'.$h.'</p>
                <table class = "table table-striped table-bordered" id = "t1">';

                foreach ($jam as $j){
                    echo'<tr>
                            <td class="col-sm-3 col-lg-3 col-md-3">'.$j.'</td>';
                    foreach($jadwal as $jd){
                        if($jd[0] == $h){
                            if($jd[1] == $j){
                                
                                $qnama = "SELECT nama FROM mapel WHERE kode  = '$jd[2]'";
                                $nmapel = mysqli_query($con,$qnama);
                                $nama = mysqli_fetch_row($nmapel);

                                echo '<td>'.$nama[0].'</td>';
                                echo '<td>'.$jd[3].'</td>';
                                $cek = true;
                            }
                        }
                    }
                    if (!$cek){
                        echo '<td> - </td>';
                    }
                    $cek = false;
                    echo '</tr>';
                }
                echo '</table>';
            }?>
        </div>
        </div>
    </div>
<!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>