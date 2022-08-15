<?php
$data_diri = array(
  "nama" => "Taufik Hidayat",
  "link_web" => "https://www.tfkhdyt.my.id"
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 2 | <?= $data_diri["nama"] ?></title>
</head>

<body>
  <?= "Selamat Datang" ?><br>
  <?= "Ayo kita belajar Junior Web Developer bersama" ?><br>
  <?= "di BPPTIK Cikarang" ?><br><br>
  Dibuat oleh <a href="<?= $data_diri["link_web"] ?>" target="_blank"><?= $data_diri["nama"] ?></a>
</body>

</html>