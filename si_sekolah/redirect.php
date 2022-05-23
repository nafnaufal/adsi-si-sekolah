<?php
    $con = mysqli_connect("localhost","root","","sekolah");
    
    $nisn = $_POST["nisn"];
    $rata = $_POST["rata"];
    $peringkat = $_POST["peringkat"];
    $sem = $_POST["sem"];

    $qin =  "INSERT INTO nilai (semester, nilai_rata_rata, peringkat, NISN) VALUES ('$sem', '$rata', '$peringkat', '$nisn')";

    
    mysqli_query($con, $qin);
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1; url=./guru.php" />
    <title>Terima</title>
</head>
<body>
    Data berhasil diinput!
</body>
</html>