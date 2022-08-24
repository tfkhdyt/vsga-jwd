<?php
require 'utils/hitungOngkir.php'; // import function hitungOngkir
require 'utils/generateNoResi.php'; // import function generateNoResi

if (isset($_POST['submit'])) { // apabila tombol submit telah ditekan
  $ongkir = hitungOngkir($_POST['jenisPaket'], $_POST['beratBarang']); // hitung ongkir dengan function yang telah dibuat di folder utils

  $item = [ // buat associative array yang menyimpan semua data hasil imputan user
    "noResi" => generateNoResi(), // panggil function generateNoResi
    "namaBarang" => $_POST['namaBarang'],
    "beratBarang" => $_POST['beratBarang'],
    "jenisPaket" => $_POST['jenisPaket'],
    "namaPenerima" => $_POST['namaPenerima'],
    "alamatPenerima" => $_POST['alamatPenerima'],
    "ongkir" => $ongkir
  ];

  array_push($data, $item); // push array $item ke dalam array $data
  $json = json_encode($data, JSON_PRETTY_PRINT); // encode array $data ke dalam bentuk json
  file_put_contents($berkas, $json); // masukkan data $json ke dalam file $berkas
}
?>

<form action="" method="POST" class="p-8 mb-0 space-y-4 rounded-2xl shadow-xl">
  <p class="text-lg font-medium">Input Pengiriman Barang</p>

  <!-- input field nama barang  -->
  <div>
    <label for="namaBarang" class="text-sm font-medium">Nama Barang</label>
    <div class="relative mt-1">
      <input type="text" id="namaBarang" name="namaBarang" class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm transition duration-300 focus:ring-pink-600" placeholder="Masukkan nama barang" required />
      <span class="absolute inset-y-0 inline-flex items-center right-4">
        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
          <path d="M23 6.066v12.065l-11.001 5.869-11-5.869v-12.131l11-6 11.001 6.066zm-21.001 11.465l9.5 5.069v-10.57l-9.5-4.946v10.447zm20.001-10.388l-9.501 4.889v10.568l9.501-5.069v-10.388zm-5.52 1.716l-9.534-4.964-4.349 2.373 9.404 4.896 4.479-2.305zm-8.476-5.541l9.565 4.98 3.832-1.972-9.405-5.185-3.992 2.177z" />
        </svg>
      </span>
    </div>
  </div>

  <!-- input field berat barang  -->
  <div>
    <label for="beratBarang" class="text-sm font-medium">Berat Barang (Kg)</label>
    <div class="relative mt-1">
      <input min="0" step="0.01" type="number" id="beratBarang" name="beratBarang" class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm transition duration-300 focus:ring-pink-600" placeholder="Masukkan berat barang" required />
      <span class="absolute inset-y-0 inline-flex items-center right-4">
        <svg class="w-5 h-5 text-gray-400" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="m21 4c0-.478-.379-1-1-1h-16c-.62 0-1 .519-1 1v16c0 .621.52 1 1 1h16c.478 0 1-.379 1-1zm-16.5.5h15v15h-15zm6.75 9.25v3.25c0 .53-.47 1-1 1h-3.25c-.53 0-1-.47-1-1v-3.25c0-.53.47-1 1-1h3.25c.53 0 1 .47 1 1zm-3.75.5v2.25h2.25v-2.25zm3.75-7.25v3.25c0 .53-.47 1-1 1h-3.25c-.53 0-1-.47-1-1v-3.25c0-.53.47-1 1-1h3.25c.53 0 1 .47 1 1zm6.75 0v3.25c0 .53-.47 1-1 1h-3.25c-.53 0-1-.47-1-1v-3.25c0-.53.47-1 1-1h3.25c.53 0 1 .47 1 1zm-10.5.5v2.25h2.25v-2.25zm6.75 0v2.25h2.25v-2.25z" fill-rule="nonzero" />
        </svg>
      </span>
    </div>
  </div>

  <!-- input field jenis paket  -->
  <div>
    <label for="beratBarang" class="text-sm font-medium">Jenis Paket</label>
    <div class="relative mt-1">
      <div class="grid grid-cols-2 gap-2">
        <!-- Reguler -->
        <div class="relative">
          <input class="hidden group peer" type="radio" name="jenisPaket" value="reguler" id="reguler" required />
          <label class="block p-4 text-sm font-medium transition-colors border border-gray-100 rounded-lg shadow-sm cursor-pointer peer-checked:border-yellow-400 hover:bg-gray-50 peer-checked:ring-1 peer-checked:ring-yellow-400" for="reguler">
            <span> Reguler </span>
            <span class="block mt-1 text-xs text-gray-500">
              Rp11.000
            </span>
          </label>
          <svg class="absolute w-5 h-5 text-yellow-400 opacity-0 top-4 right-4 peer-checked:opacity-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
        </div>
        <!-- Next Day -->
        <div class="relative">
          <input class="hidden group peer" type="radio" name="jenisPaket" value="nextDay" id="nextDay" />
          <label class="block p-4 text-sm font-medium transition-colors border border-gray-100 rounded-lg shadow-sm cursor-pointer peer-checked:border-yellow-400 hover:bg-gray-50 peer-checked:ring-1 peer-checked:ring-yellow-400" for="nextDay">
            <span> Next Day </span>
            <span class="block mt-1 text-xs text-gray-500">
              Rp16.000
            </span>
          </label>
          <svg class="absolute w-5 h-5 text-yellow-400 opacity-0 top-4 right-4 peer-checked:opacity-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
        </div>
      </div>
    </div>
  </div>

  <!-- input field nama penerima  -->
  <div>
    <label for="namaPenerima" class="text-sm font-medium">Nama Penerima</label>
    <div class="relative mt-1">
      <input type="text" id="namaPenerima" name="namaPenerima" class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm transition duration-300 focus:ring-pink-600" placeholder="Masukkan nama penerima" required />
      <span class="absolute inset-y-0 inline-flex items-center right-4">
        <svg class="w-4 h-4 text-gray-400" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M12 2c2.757 0 5 2.243 5 5.001 0 2.756-2.243 5-5 5s-5-2.244-5-5c0-2.758 2.243-5.001 5-5.001zm0-2c-3.866 0-7 3.134-7 7.001 0 3.865 3.134 7 7 7s7-3.135 7-7c0-3.867-3.134-7.001-7-7.001zm6.369 13.353c-.497.498-1.057.931-1.658 1.302 2.872 1.874 4.378 5.083 4.972 7.346h-19.387c.572-2.29 2.058-5.503 4.973-7.358-.603-.374-1.162-.811-1.658-1.312-4.258 3.072-5.611 8.506-5.611 10.669h24c0-2.142-1.44-7.557-5.631-10.647z" />
        </svg>
      </span>
    </div>
  </div>

  <!-- input field alamat penerima  -->
  <div>
    <label for="alamatPenerima" class="text-sm font-medium">Alamat Penerima</label>
    <div class="relative mt-1">
      <input type="text" id="alamatPenerima" name="alamatPenerima" class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm transition duration-300 focus:ring-pink-600 " placeholder="Masukkan alamat penerima" required />
      <span class="absolute inset-y-0 inline-flex items-center right-4">
        <svg class="w-5 h-5 text-gray-400" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
          <path d="M22 11.414v12.586h-20v-12.586l-1.293 1.293-.707-.707 12-12 12 12-.707.707-1.293-1.293zm-6 11.586h5v-12.586l-9-9-9 9v12.586h5v-9h8v9zm-1-7.889h-6v7.778h6v-7.778z" />
        </svg>
      </span>
    </div>
  </div>

  <!-- tombol submit  -->
  <button type="submit" name="submit" class="block w-full px-5 py-3 text-sm font-bold text-white bg-pink-600 hover:bg-pink-700 active:bg-pink-800 transition duration-300 rounded-lg">
    Submit
  </button>
</form>