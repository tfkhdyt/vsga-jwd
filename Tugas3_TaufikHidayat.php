<?php
$me = array(
  "name" => "Taufik Hidayat"
);
$jumlah_perulangan = 100; // deklarasi dan inisialisasi variabel jumlah perulangan dengan nilai 100
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 3 | <?= $me["name"] ?></title>
</head>

<body>
  <?= "==================== CETAK BILANGAN GANJIL GENAP 1 - 100 ====================" ?><br>
  <?php
  // atur nilai variable i dengan 1. lakukan perulangan sampai variable i sama dengan 100, increment variable i dengan 1 setiap setelah dieksekusi
  for ($i = 1; $i <= $jumlah_perulangan; $i++) {
    if ($i % 2 == 0) { // apabila variable i dibagi 2 sisa baginya sama dengan nol
      echo "$i adalah Bilangan Genap <br>"; // maka angka tersebut genap
    } else { // apabila tidak
      echo "$i adalah Bilangan Ganjil <br>"; // maka angka tersebut ganjil
    }
  }
  echo "<br>Dibuat oleh " . $me["name"];
  ?>
</body>

</html>