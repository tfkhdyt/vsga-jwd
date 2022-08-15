<?php
function penjumlahan($a, $b)
{
  return $a + $b;
}

function pengurangan($a, $b)
{
  return $a - $b;
}

function perkalian($a, $b)
{
  return $a * $b;
}

function pembagian($a, $b)
{
  return $a / $b;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 5 | Taufik Hidayat</title>
</head>

<body>
  <?php
  $bilangan = [9, 3];
  echo "Bilangan 1: $bilangan[0] <br>";
  echo "Bilangan 2: $bilangan[1] <br>";
  echo "==================================== <br>";
  echo "Hasil penjumlahan adalah : " . penjumlahan($bilangan[0], $bilangan[1]) . "<br>";
  echo "Hasil pengurangan adalah : " . pengurangan($bilangan[0], $bilangan[1]) . "<br>";
  echo "Hasil perkalian adalah : " . perkalian($bilangan[0], $bilangan[1]) . "<br>";
  echo "Hasil pembagian adalah : " . pembagian($bilangan[0], $bilangan[1]) . "<br>";

  echo "<br>Dibuat oleh Taufik Hidayat";
  ?>

</body>

</html>