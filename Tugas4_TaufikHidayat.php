<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 4 | Taufik Hidayat</title>
</head>

<body>
  <form action="" method="POST">
    <label for="jumlahBintang">Jumlah Bintang</label> =
    <input type="number" id="jumlahBintang" name="jumlahBintang" /> <br>
    <button type="submit">Kirim</button>
  </form>

  <?php
  if (isset($_POST["jumlahBintang"])) {
    $jumlah_bintang = $_POST["jumlahBintang"];

    for ($i = 0; $i <= $jumlah_bintang; $i++) {
      for ($j = 0; $j < $i; $j++) {
        echo "*";
      }
      echo "<br>";
    }
  }
  echo "<br>Dibuat oleh Taufik Hidayat";
  ?>
</body>

</html>