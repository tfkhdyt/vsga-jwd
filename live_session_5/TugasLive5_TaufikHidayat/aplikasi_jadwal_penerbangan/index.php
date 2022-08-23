<?php

$berkas = "data/data.json";
$dataJson = file_get_contents($berkas);
$rutePenerbanganAll = json_decode($dataJson, true);

//Array Daftar Bandara dan Pajak
$asalPenerbangan = array("Soekarno-Hatta (CGK)", "Husein Sastranegara (BDO)", "Abdul Rachman Saleh (MLG)", "Juanda (SUB)");									//Array bandara asal penerbangan
$tujuanPenerbangan = array("Ngurah Rai (DPS)", "Hasanuddin (UPG)", "Inanwatan (INX)", "Sultan Iskandarmuda (BTJ)"); 											//Aray bandara tujuan penerbangan 
$pajakAsalPenerbangan = array("Soekarno-Hatta (CGK)" => 50000, "Husein Sastranegara (BDO)" => 30000, "Abdul Rachman Saleh (MLG)" => 40000, "Juanda (SUB)" => 40000);	//Array pajak dari bandara asal
$pajakTujuanPenerbangan = array("Ngurah Rai (DPS)" => 80000, "Hasanuddin (UPG)" => 70000, "Inanwatan (INX)" => 90000, "Sultan Iskandarmuda (BTJ)" => 70000);			//Aray pajak dari bandara tujuan


//Fungsi Menghitung Total Pajak Bandara
/**
		Fungsi ini berguna untuk menghitung total pajak bandara yang harus dibayarkan
		-- Argumen pertama berisi pajak dari bandara asal penerbangan
		-- Argumen kedua berisi pajak dari bandara tujuan penerbangan
		-- Balikan dari Fungsi ini adalah Total Pajak yang harus dibayarkan
		Author : nama
		Tanggal : 19 Oktober 2020
 **/
function totalPajak($pajakAsal, $pajakTujuan) {
	global $pajakAsalPenerbangan, $pajakTujuanPenerbangan;											//Variabel Global

	foreach ($pajakAsalPenerbangan as $pajak1 => $pajak1_value) {									//Mengambil biaya pajak dari bandara asal yang dipilih
		if ($pajakAsal == $pajak1) {
			$nilaiPajakA = $pajak1_value;
		}
	}

	foreach ($pajakTujuanPenerbangan as $pajak2 => $pajak2_value) {									//Mengambil biaya pajak dari bandara tujuan yang dipilih
		if ($pajakTujuan == $pajak2) {
			$nilaiPajakB = $pajak2_value;
		}
	}

	return $nilaiPajakA + $nilaiPajakB;
}

/**
		Fungsi ini berguna untuk menghitung total biaya penerbangan sebuah maskapai
		-- Argumen pertama berisi total pajak dari Bandara
		-- Argumen kedua berisi harga tiket maskapai yang di input oleh user
		-- Balikan dari Fungsi ini adalah Total Biaya penerbangan
 **/
function totalHarga($totalPajak, $hargaTiket) {
	return $totalPajak + $hargaTiket;
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Jadwal Penerbangan</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<img src="img/pesawat.jfif" class="gambar-pesawat">
	<h1>Pendaftaran Rute Penerbangan</h1>

	<!-- Form Pendaftaran Rute Penerbangan -->
	<form action="index.php" method="post">
		<table width="100%">
			<tr>
				<td width="20%"><label>Maskapai</label></td>
				<td>:</td>
				<td width="80%"><input type="text" name="maskapai" class="inputtext" placeholder="Nama Maskapai" required=""></td> <!-- Input nama Maskapai -->
			</tr>
			<tr>
				<td><label>Bandara Asal</label></td>
				<td>:</td>
				<td>
					<select name="ruteasal">
						<!-- Input Bandara Asal -->
						<!-- Perulangan untuk menampilkan Bandara Asal -->
						<?php
						foreach ($asalPenerbangan as $ap) {
							echo "<option value='" . $ap . "'>" . $ap . "</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Bandara Tujuan</label></td> <!-- Input Bandara Tujuan -->
				<td>:</td>
				<td>
					<select name="rutetujuan">
						<!-- Perulangan untuk menampilkan Bandara Tujuan -->
						<?php
						foreach ($tujuanPenerbangan as $tp) {
							echo "<option value='" . $tp . "'>" . $tp . "</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Harga Tiket</label></td>
				<td>:</td>
				<td><input type="number" name="harga" class="inputtext" placeholder="Harga Tiket" required=""></td> <!-- Input Harga Tiket -->
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;"><input type="submit" value="Submit" name="submit"></td> <!-- Submit Form -->
			</tr>
		</table>
	</form> <br>

	<!-- Menampung seluruh hasil inputan User -->
	<?php
	if (isset($_POST['submit'])) {
		$maskapaiPenerbangan = $_POST['maskapai'];
		$ruteAsalPenerbangan = $_POST['ruteasal'];
		$ruteTujuanPenerbangan = $_POST['rutetujuan'];
		$hargaPenerbangan = $_POST['harga'];
		$totalPajakPenerbangan = totalPajak($ruteAsalPenerbangan, $ruteTujuanPenerbangan);
		$totalHargaPeberbangan = totalHarga($totalPajakPenerbangan, $hargaPenerbangan);


		$rutePenerbangan = [$maskapaiPenerbangan, $ruteAsalPenerbangan, $ruteTujuanPenerbangan, $hargaPenerbangan, $totalPajakPenerbangan, $totalHargaPeberbangan];		//Menampung inputan User kedalam Array sementara
		array_push($rutePenerbanganAll, $rutePenerbangan);																												//Memasukan Array baru kedalam Array Daftar Rute Penerbangan
		array_multisort($rutePenerbanganAll, SORT_ASC);																													//Mengurutkan Daftar Maskapai sesuai Abjad dari yang terkecil
		$dataJson = json_encode($rutePenerbanganAll, JSON_PRETTY_PRINT);
		file_put_contents($berkas, $dataJson);
	}

	?>

	<!-- Menampilkan Daftar Maskapai Beserta Rute Penerbangannya -->
	<h1>Daftar Rute Tersedia</h1>
	<table border="1px" width="100%">
		<thead>
			<tr>
				<th>Maskapai</th>
				<th>Asal Penerbangan</th>
				<th>Tujuan Penerbangan</th>
				<th>Harga Tiket</th>
				<th>Pajak</th>
				<th>Total Harga Tiket</th>
			</tr>
		</thead>
		<tbody>
			<!-- Perulangan untuk menampilkan isi Array Daftar Maskapai beserta Rute Penerbangan -->
			<?php
			for ($i = 0; $i < count($rutePenerbanganAll); $i++) {
				echo "<tr>";
				echo "<td>" . $rutePenerbanganAll[$i][0] . "</td>";
				echo "<td style='text-align: center;'>" . $rutePenerbanganAll[$i][1] . "</td>";
				echo "<td style='text-align: center;'>" . $rutePenerbanganAll[$i][2] . "</td>";
				echo "<td style='text-align: center;'>" . $rutePenerbanganAll[$i][3] . "</td>";
				echo "<td style='text-align: center;'>" . $rutePenerbanganAll[$i][4] . "</td>";
				echo "<td style='text-align: center;'>" . $rutePenerbanganAll[$i][5] . "</td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>


</body>

</html>