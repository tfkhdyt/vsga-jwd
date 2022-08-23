<?php
function Jumlahkan($a, $b) {
  $hasil = $a + $b;
  return $hasil;
}

$bil = 0;
echo "Nilai bil mula-mula adalah $bil <br>";
$bil = Jumlahkan(2, 5);
echo "Nilai bil setelah memanggil function adalah $bil <br>";
