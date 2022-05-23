<?php

    $nisn =  $_GET["nisn"];
    
    $con = mysqli_connect("localhost","root","","sekolah");
    $siswa = "SELECT * FROM siswa WHERE nisn = '$nisn'";

    $nilai = "SELECT * FROM nilai WHERE nisn = '$nisn'";
    
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
        <div class="container">
            <table class = "table table-striped mt-5">
                <tr>
                    <td>NISN</td>
                    <td> <?= $dataS["NISN"] ?> </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> <?= $dataS["nama"] ?> </td>
                </tr>
                <tr>
                    <td>Tanggal lahir</td>
                    <td> <?= $dataS["tanggal_lahir"] ?> </td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td> <?= $dataS["kelas"] ?> </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> <?= $dataS["alamat"] ?> </td>
                </tr>
                
                <tr>
                    <td>Data pembelajaran</td>
                    <?php 
                    echo '<table class = "table table-striped mt-5">';
                    foreach ($hasilN as $i) { 
                        echo '<tr>';
                        echo '<td>Semester '.$i["semester"].'</td>';
                        
                        echo '<td>
                        
                        <ul>
                        <li>Rata-rata : </li>'.$i["nilai_rata_rata"].'
                        <li>Peringkat : </li>'.$i["peringkat"].'
                        </ul>'
                        
                        .'</td>';
                        echo '</tr>';
                            
                    }
                    echo '</table>';
                    ?>
                </tr>


            </table>
        </div>

    </body>
</html>