<?php
$berkas = 'data/data.json';
$json = file_get_contents($berkas);
$buku = json_decode($json, true);

if (isset($_POST['submit'])) {
  $item = [
    "judul" => $_POST['judul'],
    "penulis" => $_POST['penulis'],
    "penerbit" => $_POST['penerbit']
  ];
  array_push($buku, $item);
  $json = json_encode($buku, JSON_PRETTY_PRINT);
  file_put_contents($berkas, $json);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 4 | Kelola Buku</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="grid place-items-center min-h-screen bg-slate-50 container mx-auto w-full px-6">
  <main class="grid grid-cols-1 lg:grid-cols-3 bg-gradient-to-br from-green-300 to-green-400 rounded-xl shadow">
    <div class="p-8 space-y-4">
      <p class="font-black bg-gradient-to-r from-red-600 to-violet-600 text-transparent bg-clip-text text-center text-xl lg:text-2xl">Aplikasi Pengelolaan Buku</p>
      <form action="" method="POST" class="space-y-4">
        <div class="flex flex-col space-y-2">
          <label for="judul" class="text-gray-900 font-medium">Judul Buku</label>
          <input type="text" name="judul" id="judul" class="border border-slate-400 focus:ring-2 focus:ring-blue-500 outline-none px-2 py-1 w-full rounded transition duration-300" />
        </div>
        <div class="flex flex-col space-y-2">
          <label for="penulis" class="text-gray-900 font-medium">Penulis Buku</label>
          <input type="text" name="penulis" id="penulis" class="border border-slate-400 focus:ring-2 focus:ring-blue-500 outline-none px-2 py-1 w-full rounded transition duration-300" />
        </div>
        <div class="flex flex-col space-y-2">
          <label for="penerbit" class="text-gray-900 font-medium">Penerbit Buku</label>
          <input type="text" name="penerbit" id="penerbit" class="border border-slate-400 focus:ring-2 focus:ring-blue-500 outline-none px-2 py-1 w-full rounded transition duration-300" />
        </div>
        <button type="submit" class="px-3 py-2 w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold rounded-full" name="submit">Submit</button>
      </form>
    </div>
    <div class="p-8 lg:col-span-2">
      <div class="overflow-hidden overflow-x-auto border border-gray-100 rounded">
        <table class="min-w-full text-sm divide-y divide-gray-200">
          <thead>
            <tr class="bg-gray-50">
              <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">#</th>
              <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Judul Buku</th>
              <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Penulis Buku</th>
              <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Penerbit Buku</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-100 bg-gray-100">
            <?php for ($i = 0; $i < count($buku); $i++) : ?>
              <tr>
                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap"><?= $i + 1 ?></td>
                <td class="px-4 py-2 text-gray-700 whitespace-nowrap"><?= $buku[$i]['judul'] ?></td>
                <td class="px-4 py-2 text-gray-700 whitespace-nowrap"><?= $buku[$i]['penulis'] ?></td>
                <td class="px-4 py-2 text-gray-700 whitespace-nowrap"><?= $buku[$i]['penerbit'] ?></td>
              </tr>
            <?php endfor ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>