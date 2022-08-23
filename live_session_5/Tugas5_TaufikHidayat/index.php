<?php
$berkas = 'data/data.json'; // buat variable dengan lokasi file json
$json = file_get_contents($berkas); // baca isi file $berkas, lalu masukkan ke variabel $json
$data = json_decode($json, true); // decode data $json tadi ke dalam bentuk yang dimengerti PHP, dan masukkan ke variabel $data
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EntarAja</title>
  <link rel="stylesheet" href="assets/css/style.css"> <!-- import file css -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"> <!-- import file gambar favicon -->
</head>

<body>
  <!-- pisahkan komponen navbar ke file terpisah agar lebih rapi -->
  <?php include "components/navbar.php" ?>
  <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:max-w-[1600px] p-8 mx-auto mt-8 gap-4">
    <!-- pisahkan komponen form ke file terpisah agar lebih rapi -->
    <?php include "components/form.php" ?>
    <!-- pisahkan komponen table ke file terpisah agar lebih rapi -->
    <?php include "components/table.php" ?>
  </main>
</body>

</html>