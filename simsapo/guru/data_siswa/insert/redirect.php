<?php
    session_start();

    if($_SESSION["no"] == NULL){
        header("location: ../../../login.html", true, 303);
    }

    $con = mysqli_connect("localhost","root","","sekolah");
    
    $nisn = $_POST["nisn"];
    $nilai = $_POST["nilai"];
    $sem = $_POST["sem"];
    $mapel = $_POST["mapel"];

    $qin = "INSERT INTO `nilai`(`nilai`, `semester`, `kode_mapel`, `nisn`) VALUES ('$nilai','$sem','$mapel','$nisn')";
    
    mysqli_query($con, $qin);
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1; url=../guru.php" />
    <title>Terima</title>
</head>
<body>
    Data berhasil diinput!
</body>
</html>