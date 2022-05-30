<?php
    $nisn =  $_GET["nisn"];
    $con = mysqli_connect("localhost","root","","sekolah");
    $qnilai = "SELECT * FROM nilai WHERE nisn = '$nisn' ORDER BY semester";
    
    $qsiswa = "SELECT * FROM siswa WHERE nisn = '$nisn'";

    $nilai = mysqli_query($con,$qnilai);

    $hasilS = mysqli_query($con,$qsiswa);
    $siswa = mysqli_fetch_array($hasilS);

    // $jumlahData = mysqli_num_rows($nilai);
    // $row = mysqli_fetch_array($nilai);

    // foreach($row as $i){
        // var_dump($row);
    //     echo "<br>";
    // }
    // $rows = [];

    // while ($row = mysqli_fetch_assoc($nilai)) {
    //     // $rows[] = $row;
    //     while ($i = mysqli_fetch_assoc($nilai)){
    //         if($i["semester"] == $row["semester"]){
    //             echo($i["kode_mapel"]);
    //             echo($i["nilai"]);
    //             echo '<br>';
    //         }
    //     }
    // }

    // $semester = array();
    // $rata = array();
    // $rank = array();

    // foreach($rows as $i){
    //     array_push($semester, (int) $i["semester"]);
    //     array_push($rata, (float) $i["nilai_rata_rata"]);
    //     array_push($rank, (float) $i["peringkat"]);
    // }
    // const semester = [<?php //echo '"'.implode('","', $semester).'"' ?>];
    // const dataRata = [<?php //echo '"'.implode('","', $rata).'"' ?>];
    // const dataRank = [<?php //echo '"'.implode('","', $rank).'"' ?>];
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

        <div class="container mt-5">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>: <?= $siswa["nama"] ?></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>: <?= $siswa["nisn"] ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>: <?= $siswa["kode_kelas"] ?></td>
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
                const judul1 = "Rata-rata"
                const judul2 = "Ranking"
                const semester = [1, 2, 3, 4, 5, 6];
                const dataRata = [90, 72, 84, 92, 90, 70];
                const dataRank = [1, 2, 1, 5, 1, 2];
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    </body>
</html>