<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>Hasil</title>
        <script>
            function kelas_changed(){
                var kelas = document.getElementById("kode-kelas").value;

                if(kelas == "other"){
                    document.getElementById("kelas-other").style.display = "block";
                }else{
                    document.getElementById("kelas-other").style.display = "none";
                }
            }

            function role_changed(){
                var role = document.getElementById("jenis-role").value;

                if(role == "siswa"){
                    document.getElementById("tgl-contain").style.display = "block";
                    document.getElementById("alamat-contain").style.display = "block";
                    document.getElementById("kelas-contain").style.display = "block";
                }else{
                    document.getElementById("tgl-contain").style.display = "none";
                    document.getElementById("alamat-contain").style.display = "none";
                    document.getElementById("kelas-contain").style.display = "none";
                }
            }

            function load_kelas(){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200){
                        document.getElementById("kode-kelas").innerHTML = this.responseText;
                    };
                };

                xmlhttp.open("GET", "./script/get-kelas.php", true);
                xmlhttp.send();
            }

            load_kelas();
        </script>
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
                    <h4>Tambahkan Akun</h4>
                </div>
                <div class="container">
                    <form action="./script/save-user.php" method="get">
                        <div class="mb-3">
                            <label for="jenis-role" class="form-label">Role</label>
                            <select name="jenis-role" id="jenis-role" class="form-select" onchange="role_changed()">
                                <option value="siswa">Siswa</option>
                                <option value="guru">Guru</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="no-induk" class="form-label">No Induk</label>
                            <input type="text" class="form-control" id="no-induk" name="no-induk">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3" id="tgl-contain">
                            <label for="tanggal-lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir">
                        </div>
                        <div class="mb-3" id="alamat-contain">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="mb-3" id="kelas-contain">
                            <label for="kode-kelas" class="form-label">Kelas</label>
                            <select name="kode-kelas" id="kode-kelas" class="form-select" onchange="kelas_changed()"></select>
                            <input class="form-control mt-2" type="text" name="kelas-other" id="kelas-other" placeholder="Kelas" style="display: none">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
<!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>