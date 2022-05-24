<?php
    $con = mysqli_connect("localhost","root","","sekolah");
    $qget = "SELECT * FROM siswa";
    $hasil = mysqli_query($con,$qget);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>Insert Nilai</title>
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light col-lg-5" style="width: 280px;">
                    <a href="./guru.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">Simsapo</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="./guru.php" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                        Data nilai
                        </a>
                    </li>
                    <li>
                        <a href="../../progress/guru.php" class="nav-link link-dark">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Progress
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
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
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                    </div>
                </div>

                <div class = "col-lg-7">
                    <div class="container mt-5">
                        <form action="./redirect.php" method="post">
                            <div class="mb-3 row">
                                <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="nisn" id="nisn">
                                        <?php foreach ($hasil as $i) {
                                            echo '<option value="'.$i["NISN"].'">'.$i["NISN"].' - '.$i["nama"].'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="mb-3 row">
                                <label for="sem" class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="Semester" type="number" name="sem" id="sem">
                                </div>
                            </div>
                    
                            <div class="mb-3 row">
                                <label for="rata" class="col-sm-2 col-form-label">Nilai rata-rata</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="Nilai rata-rata" type="number" id="rata" name="rata">
                                </div>
                            </div>
                    
                            <div class="mb-3 row">
                                <label for="peringkat" class="col-sm-2 col-form-label">Peringkat</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="Peringkat" type="number" name="peringkat" id="peringkat">            </div>
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
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>