<?php
function hitungOngkir($jenisPaket, $beratBarang) { // function untuk menghitung ongkir dengan parameter jenisPaket dan beratBarang
  $ongkir = 0; // buat variabel $ongkir dengan nilai awal 0

  if ($jenisPaket == 'reguler') { // jika jenis paket nya reguler
    $ongkir += 11000; // tambah ongkir menjadi 11rb
  } else { // jika tidak
    $ongkir += 16000; // tambah ongkir menjadi 16rb
  }

  if ($beratBarang < 1) { // jika berat barang kurang dari 1 kg
    $ongkir += 0; // tidak ada tambahan ongkir
  } else if ($beratBarang < 5) { // jika berat barang kurang dari 5 kg
    $ongkir += $ongkir * 0.50; // tambah ongkir sebesar 50% dari ongkir sebelumnya
  } else if ($beratBarang < 10) { // jika berat barang kurang dari 10 kg
    $ongkir += $ongkir * 1.5; // tambah ongkir sebesar 150% dari ongkir sebelumnya
  } else if ($beratBarang < 50) { // jika berat barang kurang dari 50 kg
    $ongkir += $ongkir * 2; // tambah ongkir sebesar 200% dari ongkir sebelumnya
  } else { // jika berat barang lebih dari atau sama dengan 50 kg
    $ongkir += $ongkir * 5; // tambah ongkir sebesar 500% dari ongkir sebelumnya
  }

  return $ongkir; // return nilai variabel $ongkir
}
