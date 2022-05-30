<?php
    $con = mysqli_connect("localhost","root","","sekolah");
    $siswa = "SELECT * FROM siswa WHERE nisn = '0001'";
    $hasilS = mysqli_query($con,$siswa);
    $dataS = mysqli_fetch_array($hasilS);

    $hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat");
    $jam = array("07:30:00", "09:20:00", "11:10:00", "13:30:00");
    
    $jadwal = array(
        array("Semester 2", "09:20:00", "Matematika"),
        array("Senin", "13:30:00", "Sejarah"),
        array("Kamis", "09:20:00", "Biologi"),
        array("Jumat", "11:10:00", "English"),
    );
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
        <div class="container text-center">
            <h1>Keuangan</h1>
        </div>

        <div class="container">
        <table class = "table table-striped table-bordered mt-5">
            <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>Detail</th>
            </tr>
            <?php foreach ($hasil as $i) { ?>
                <tr>
                    <td> <?= $i["nisn"] ?> </td>
                    <td> <?= $i["nama"] ?> </td>
                    <td>
                
                    </td>
                </tr>
            <?php } ?>
        </table>

    </body>
</html>