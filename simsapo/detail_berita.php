<?php
    $id = (int) $_GET["id"];
    $koneksi = mysqli_connect("localhost", "root", "", "sekolah");
    $sql = "SELECT * FROM berita WHERE id_berita = $id";
    $exe = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php while ($row = mysqli_fetch_assoc($exe)) { ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/styleD.css">
        <title><?php echo $row["title"] ?></title>
    </head>

    <body>
        <h3><?php echo $row["sinop"] ?></h3>
        <img src="<?php echo $row["image"] ?>" alt="">
        <div class="isi">
            <p><?php echo $row["isi"] ?></p>
        </div>
    </body>
<?php } ?>

</html>