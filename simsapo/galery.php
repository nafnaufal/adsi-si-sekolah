<?php
  $koneksi = mysqli_connect("localhost", "root", "", "sekolah");
  $sql = "SELECT * FROM galery ORDER BY (id_foto) DESC LIMIT 9";
  $exe = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=<div class=" container mt-5 align-text-bottom">
  <link rel="stylesheet" href="assets/css/styleG.css">
  <title>Galery</title>
</head>

<body>
  <h1>Galery MTs 1 Pontianak</h1>
  <table>
    <tr>
      <?php $i = 0; while ($data = mysqli_fetch_assoc($exe)) {
        $i = $i + 1; ?>
        <td><a href="./home.html?id= <?php echo $data['id_foto'] ?>">
          <img src="<?php echo $data['path'] ?>" alt="<?php echo $data['title'] ?>"></a></td>
        <?php if ($i % 3 == 0) { ?>
    </tr>
        <?php } ?>
      <?php } ?>
  </table>
</body>

</html>