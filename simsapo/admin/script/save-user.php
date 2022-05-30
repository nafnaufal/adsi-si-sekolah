<?php

include './connection.php';

$success = true;

if(isset($_GET["submit"])){
    $role = $_GET['jenis-role'];
    $ni = $_GET['no-induk'];
    $nama = $_GET['nama'];
    $tgl_lahir = $_GET['tanggal-lahir'];
    $alamat = $_GET['alamat'];
    $kelas = $_GET['kode-kelas'];

    // Input Kelas Jika Belum Ada
    if($kelas == "other"){
        $kelas_other = $_GET["kelas-other"];

        if($kelas_other == ""){
            $success = false;
        }else{
            $result = mysqli_query($conn, "INSERT INTO `kelas` (`kode`) VALUES ('$kelas_other');");
            
            if(!$result){
                $success = false;
            }else{
                $kelas =$kelas_other;
            }
        }
    }

    if($ni === "" || $nama === ""){
        $success = false;
    }

    if($role = "siswa"){
        if($tgl_lahir === "" || $alamat === "" || $kelas === "blank"){
            $success = false;
        }

        $dataCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa WHERE `nisn`='$ni'"));

        if($dataCount > 0){
            $success = false;
        }

        if($success){
            $result = mysqli_query($conn, "INSERT INTO `siswa`(`nisn`, `nama`, `tanggal_lahir`, `alamat`, `kode_kelas`) VALUES ('$ni','$nama','$tgl_lahir','$alamat','$kelas');");
    
            if($result){
                echo "<script>window.alert(\"Input Sukses\")</script>";
            }else{
                echo "<script>window.alert(\"Input Gagal\")</script>";
            }
        }else{
            echo "<script>window.alert(\"Input Gagal\")</script>";
        }
    }else{
        $dataCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM guru WHERE `nip`='$ni'"));

        if($dataCount > 0){
            $success = false;
        }

        if($success){
            $result = mysqli_query($conn, "INSERT INTO `guru`(`nip`, `nama`) VALUES ('$ni','$nama');");
    
            if($result){
                echo "<script>window.alert(\"Input Sukses\")</script>";
            }else{
                echo "<script>window.alert(\"Input Gagal\")</script>";
            }
        }else{
            echo "<script>window.alert(\"Input Gagal\")</script>";
        }
    }

    header("refresh:0;url=../input-user.php");
}

?>