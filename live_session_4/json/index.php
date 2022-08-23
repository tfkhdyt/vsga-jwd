<!DOCTYPE html>
<html>

<body>
		<h3>Data Customer</h3>
		<!-- Form untuk memasukkan data pelanggan. -->
		<table style="width:100%">
		<form action="index.php" method="post" id="formItem">
			<tr>
				<!-- Masukan data nama. -->
				<td><label for="nama">Nama:</label></td>
				<td><input type="text" id="nama" name="nama"></td>
			</tr>
			<tr>
				<!-- Masukan data nomor induk. -->
				<td><label for="nohp">No HP:</label></td>
				<td><input type="number" id="nohp" name="nohp"></td>
			</tr>
			<tr>
				<!-- Masukan data jenis kelamin. -->
				<td><label for="jenisKelamin">Jenis Kelamin:</label></td>
				<td><input type="radio" id="lakiLaki" name="jenisKelamin" value="L">
				<label for="lakilaki">Laki-laki</label><br>
				<input type="radio" id="perempuan" name="jenisKelamin" value="P">
				<label for="perempuan">Perempuan</label><br></td>
			</tr>
			<tr>
				<!-- Masukan data harga item1. -->
				<td><label for="item1">Harga item 1:</label></td>
				<td><input type="number" id="item1" name="item1"></td>
			</tr>
			<tr>
				<!-- Masukan data harga item2. -->
				<td><label for="item2">Harga item 2:</label></td>
				<td><input type="number" id="item2" name="item2"></td>
			</tr>
			<tr>
				<!-- Masukan data harga item3. -->
				<td><label for="item3">Harga item3:</label></td>
				<td><input type="number" id="item3" name="item3"></td>
			</tr>
			<tr>
				<!-- Tombol Kirim/Submit -->
				<td><button type="submit" form="formItem" value="Kirim" name="Kirim">Kirim</button></td>
				<td></td>
			</tr>
		</form>
		</table>

<?php

	//	Fungsi untuk menghitung Total Item.
	//	Total item didapat dengan cara menjumlahkan item1, item2, dan item3.
	//	Variabel $a, $b, $c secara berurutan merupakan item1, item2, dan item3.
	//	Fungsi ini mengembalikan value Total Item.
	function totalItem($a, $b, $c){
		$total = $a + $b + $c;
		return $total;
	}

	$berkas = "data/data.json"; //Variabel berisi nama berkas di mana data dibaca dan ditulis.
	$dataCustomer = array(); //Variabel array kosong untuk menampung data customer dari berkas.
	
	//Mengambil data dari berkas dan mengkonversi data tersebut menjadi array PHP.
	//Variabel $dataJson berisi data dari berkas dalam bentuk array Json.
	//Variabel $dataCustomer berisi data pada $dataJson yang sudah dikonversi menjadi array PHP.
	$dataJson = file_get_contents($berkas);
	$dataCustomer = json_decode($dataJson, true);

	//echo "$dataJson"; //menampilkan isi data json
	//echo "<br><br>"; 
	//print_r($dataCustomer); //menampilkan isi dataCustomer yang sudah berupa array
	
    if(isset($_POST['Kirim'])){
		$item = array(); //Variabel array kosong untuk menampung data nilai yang dimasukkan dari form.
		
		//Memasukkan data masing-masing item ke dalam array $item.
		array_push($item, $_POST['item1'], $_POST['item2'], $_POST['item3']);
		
		//Memasukkan data customer dari form ke dalam array $databaru.
		$dataBaru = array(
			'nama' => $_POST['nama'],
			'nohp' => $_POST['nohp'],
			'jenisKelamin' => $_POST['jenisKelamin'],
			'item' => $item,
		);

		//print_r($dataBaru);
		
		array_push($dataCustomer,$dataBaru); //Menambahkan data baru ke dalam data yang sudah ada dalam berkas. 
		
		//Mengkonversi kembali data customer dari array PHP menjadi array Json dan menyimpannya ke dalam berkas.
		$dataJson = json_encode($dataCustomer, JSON_PRETTY_PRINT);
		file_put_contents($berkas, $dataJson);

	}
?>    

		<p><br><br>
		
		<!-- Tabel untuk menampilkan data Customer. -->
		<table style="width:100%" border="1">
			<tr>
				<!-- Header tabel data Customer. -->
				<th>Nama</th>
				<th>No HP</th>
				<th>Jenis Kelamin</th>
				<th>Item 1</th>
				<th>Item 2</th>
				<th>Item 3</th>
				<!-- <th>Total Harga Item</th> -->
			</tr>
			
<?php
	//	Perulangan untuk menampilkan data customer.
	//	Variabel $i adalah index data customer pada array $dataCustomer.
	for ($i=0; $i < count($dataCustomer); $i++){
		
		//	Memindahkan data dari dalam array $dataCustomer ke variabel baru.
		//	$nama adalah data nama customer.
		//	$nohp adalah data nomor hp customer.
		//	$jenisKelamin adalah data jenis kelamin customer.
		//	$item adalah data berisi item dalam bentuk array berisikan item1, item2, dan item3.
		$nama = $dataCustomer[$i]['nama']; // Contoh isi variabel: "Harry Pitter".
		$nohp = $dataCustomer[$i]['nohp']; // Contoh isi variabel: "089977641321".
		$jenisKelamin = $dataCustomer[$i]['jenisKelamin']; // Isi variabel: "L" atau "P".
		$item = $dataCustomer[$i]['item']; // Contoh isi variabel: ["1000", "2000", "500"]
		
		//	Percabangan untuk mengganti tampilan data jenis kelamin.
		//	Variabel $teksJenisKelamin berisi teks yang akan ditampilkan sesuai dengan data pada variabel $jenisKelamin.
		if ($jenisKelamin == "L") $teksJenisKelamin = "Laki-laki";
		elseif ($jenisKelamin == "P") $teksJenisKelamin = "Perempuan";
		
		//	Baris untuk menampilkan data customer.
		echo "<tr>
				<td>".$nama."</td> <!-- Data nama. -->
				<td>".$nohp."</td> <!-- Data nomor hp. -->
				<td>".$teksJenisKelamin."</td> <!-- Data jenis kelamin. -->
				<td>".$item[0]."</td> <!-- Data item1. -->
				<td>".$item[1]."</td> <!-- Data item2. -->
				<td>".$item[2]."</td> <!-- Data item3. -->
				
			</tr>";
	}
?>
		</table>
		
	</body>
</html>
<!-- <td>".totalItem($item[0], $item[1], $item[2])."</td> <!-- Data total item, dengan memanggil fungsi totalItem(). --> -->