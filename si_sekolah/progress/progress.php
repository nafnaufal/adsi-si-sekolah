<?php
    $nisn =  $_GET["nisn"];
    $con = mysqli_connect("localhost","root","","sekolah");
    $qget = "SELECT * FROM nilai WHERE NISN = '$nisn' ORDER BY semester";
    $siswa = "SELECT * FROM siswa WHERE nisn = '$nisn'";
    
    $hasil = mysqli_query($con,$qget);
    
    $hasilS = mysqli_query($con,$siswa);
    $dataS = mysqli_fetch_array($hasilS);
    $jumlahData = mysqli_num_rows($hasil);

    $rows = [];

    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }

    $semester = array();
    $rata = array();
    $rank = array();

    foreach($rows as $i){
        array_push($semester, (int) $i["semester"]);
        array_push($rata, (float) $i["nilai_rata_rata"]);
        array_push($rank, (float) $i["peringkat"]);
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Progress</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light col-lg-5" style="width: 280px;">
                    <a href="./progress.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">Simsapo</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="../data_nilai/guru.php" class="nav-link link-dark">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                            Data nilai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./guru.php" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
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
        
        <div class="col-lg-7">
            <div class="container mt-5">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $dataS["nama"] ?></td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td><?= $dataS["NISN"] ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?= $dataS["kelas"] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="container mt-5">

                <select onchange="update(this.value)">
                    <option value="rata">Rata-rata</option>
                    <option value="rank">Ranking</option>
                </select>
                
                <canvas id="myChart" width="200" height="100"></canvas>
                
                <script>

                    const semester = [<?php echo '"'.implode('","', $semester).'"' ?>];
                    const dataRata = [<?php echo '"'.implode('","', $rata).'"' ?>];
                    const dataRank = [<?php echo '"'.implode('","', $rank).'"' ?>];
                    
                    const judul1 = "Rata-rata";
                    const judul2 = "Ranking";
                    const step1 = 5;
                    const step2 = 1;
                    const max1 = 100;
                    const max2 = 30;
                    const min1 = 0;
                    const min2 = 1;

                    const ctx = document.getElementById('myChart').getContext('2d');
                    
                    const chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: semester,
                            datasets: [{
                                label: judul1,
                                data: dataRata,
                                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                                borderColor: 'rgba(255, 159, 64, 1)',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    min: 0,
                                    max: max1,
                                    reverse: false,
                                    ticks: {
                                        stepSize: step1,
                                    }
                                }
                            }
                        }
                    });

                    function update(x) {
                        if (x == "rata"){
                            chart.data.datasets[0].data = dataRata;
                            chart.data.datasets[0].label = judul1;
                            chart.options.scales.y.max = max1;
                            chart.options.scales.y.min = min1;
                            chart.options.scales.y.ticks.stepSize = step1;
                            chart.options.scales.y.reverse = false;
                        }else{
                            chart.data.datasets[0].data = dataRank;
                            chart.data.datasets[0].label = judul2;
                            chart.options.scales.y.max = max2;
                            chart.options.scales.y.min = min2;
                            chart.options.scales.y.ticks.stepSize = step2;
                            chart.options.scales.y.reverse = true;
                        }
                        chart.update();
                    }

                </script>

            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    </body>
</html>