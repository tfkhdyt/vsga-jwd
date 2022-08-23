<div class="lg:col-span-2 p-0 md:p-4 lg:p-8">
  <div class="overflow-hidden overflow-x-auto border border-gray-100 rounded">
    <table class="min-w-full text-sm divide-y divide-gray-200">
      <thead>
        <tr class="bg-gray-50">
          <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">No. Resi</th>
          <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">Nama Barang</th>
          <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">Berat (Kg)</th>
          <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">Jenis</th>
          <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">Nama Penerima</th>
          <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">Alamat Penerima</th>
          <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">Ongkir</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-100">
        <!-- lakukan perulangan sebanyak jumlah data -->
        <?php for ($i = 0; $i < count($data); $i++) : ?>
          <tr>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap"><?= $data[$i]['noResi'] ?></td> <!-- tampilkan field no resi -->
            <td class="px-4 py-2 text-gray-700 whitespace-nowrap"><?= $data[$i]['namaBarang'] ?></td> <!-- tampilkan field nama barang -->
            <td class="px-4 py-2 text-gray-700 whitespace-nowrap text-right"><?= $data[$i]['beratBarang'] ?></td> <!-- tampilkan field berat barang -->
            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
              <p class="<?= $data[$i]['jenisPaket'] == 'reguler' ? 'bg-blue-500' : 'bg-amber-500' ?> text-white px-3 py-1 rounded-full font-bold text-center"><?= $data[$i]['jenisPaket'] == 'reguler' ? 'Reguler' : 'Next Day' ?></p> <!-- tampilkan field jenis paket dan tentukan warna bg berdasarkan jenis nya -->
            </td>
            <td class="px-4 py-2 text-gray-700 whitespace-nowrap"><?= $data[$i]['namaPenerima'] ?></td> <!-- tampilkan field nama penerima -->
            <td class="px-4 py-2 text-gray-700 whitespace-nowrap"><?= $data[$i]['alamatPenerima'] ?></td> <!-- tampilkan field alamat penerima -->
            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
              <!-- tampilkan field ongkir dan format angka nya agar seperti mata uang rupiah -->
              <p class="bg-pink-600 text-white px-3 py-1 rounded-full font-bold text-center"><?= 'Rp' . number_format($data[$i]['ongkir'], 0, ',', '.') ?></p>
            </td>
          </tr>
        <?php endfor ?>
      </tbody>
    </table>
  </div>
</div>