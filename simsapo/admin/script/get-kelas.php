<?php

include "./connection.php";

$result = "<option id=\"placeholder-kelas\" value=\"blank\" selected>Pilih Kelas</option>";

$query = "SELECT * FROM kelas ORDER BY kode;";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <option value=\"".$row["kode"]."\">".$row["kode"]."</option>
        ";
    }
}
$result = $result."<option value=\"other\">Lainnya</option>";

echo $result;
?>