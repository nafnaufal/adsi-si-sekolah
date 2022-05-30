<?php
  $koneksi = mysqli_connect("localhost", "root", "", "sekolah");
  $sql = "SELECT * FROM berita ORDER BY (id_berita) DESC";
  $exe = mysqli_query($koneksi, $sql);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Berita</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <h1>Berita MTs 1 Pontianak</h1>
  <table>
    <tr>
      <?php $i = 0;
      while ($row = mysqli_fetch_assoc($exe)) {
        $i += 1 ?>
        <td>
          <div class="card">
            <img src="<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>" style="width:100%">
            <div class="container">
              <h4><b><?php echo $row['title'] ?></b></h4>
              <p><?php echo $row['sinop'] ?></p>
              <a href="detail_berita.php?id=<?php echo $row['id_berita'] ?>">Selengkapnya..</a>
            </div>
          </div>
        </td>
        <?php if ($i % 3 == 0) { ?>
    </tr>
  <?php } ?>
<?php } ?>
  </table>
</body>
</html>