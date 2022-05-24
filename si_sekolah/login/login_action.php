<?php
    $koneksi = mysqli_connect("localhost","root","","sekolah");

    $ni = mysqli_real_escape_string($koneksi,$_POST['no_induk']);
    $pas = mysqli_real_escape_string($koneksi,$_POST['password']);
    $sql = "SELECT * FROM login WHERE nomor_induk = $ni";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query)){
        if(password_verify($pas, $data['password'])){
            header("Refresh:0; url=../data_nilai/guru.php", true, 303);
        }else{
            echo "Password Salah";
            header("Refresh:1; url=./login.html", true, 303);
        }
    }else{
        echo "NO induk tidak ditemukan";
        header("Refresh:1; url=./login.html", true, 303);
    }
?>