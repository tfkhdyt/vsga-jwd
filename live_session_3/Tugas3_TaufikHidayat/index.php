<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nilai Peserta Pelatihan</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="container p-4 lg:px-64 mx-auto space-y-4 md:space-y-8 bg-slate-100">

  <header class="bg-gradient-to-br from-green-200 to-green-400 w-full h-24 flex items-center px-8 rounded-lg shadow justify-between hover:shadow-lg transition-all duration-700">
    <h1 class="text-2xl font-bold">NILAI PESERTA PELATIHAN</h1>
    <p class="text-lg font-medium text-right">Taufik Hidayat</p>
  </header>

  <main class="bg-gradient-to-br from-green-200 to-green-400 w-full flex p-8 rounded-lg shadow hover:shadow-lg transition duration-700 flex-col space-y-8 pb-12">
    <h2 class="text-lg font-semibold">Input Nilai</h2>
    <form action="" method="POST" class="space-y-4">
      <div class="flex flex-col space-y-2">
        <label for="nilaiPraktik">Nilai Praktik</label>
        <input type="number" min="0" max="100" name="nilaiPraktik" id="nilaiPraktik" class="w-full md:w-3/6 lg:w-2/6 border border-slate-400 focus:ring-2 focus:ring-sky-500 outline-none p-2 rounded-lg transition duration-300" />
      </div>
      <div class="flex flex-col space-y-2">
        <label for="nilaiPilihanGanda">Nilai Pilihan Ganda</label>
        <input type="number" min="0" max="100" name="nilaiPilihanGanda" id="nilaiPilihanGanda" class="w-full md:w-3/6 lg:w-2/6 border border-slate-400 focus:ring-2 focus:ring-sky-500 outline-none p-2 rounded-lg transition duration-300" />
      </div>
      <div class="flex flex-col space-y-2">
        <label for="nilaiSikap">Nilai Sikap</label>
        <input type="number" min="0" max="100" name="nilaiSikap" id="nilaiSikap" class="w-full md:w-3/6 lg:w-2/6 border border-slate-400 focus:ring-2 focus:ring-sky-500 outline-none p-2 rounded-lg transition duration-300" />
      </div>
      <div class="flex flex-col space-y-2">
        <label for="nilaiKehadiran">Nilai Kehadiran</label>
        <input type="number" min="0" max="100" name="nilaiKehadiran" id="nilaiKehadiran" class="w-full md:w-3/6 lg:w-2/6 border border-slate-400 focus:ring-2 focus:ring-sky-500 outline-none p-2 rounded-lg transition duration-300" />
      </div>
      <button type="submit" name="submit" class="px-4 py-2 bg-blue-400 hover:bg-blue-500 active:bg-blue-600 text-white rounded-lg font-bold transition">Hitung</button>
    </form>
  </main>

  <script>
    <?php
    if (isset($_POST["submit"])) {
      $nilai_praktik = $_POST["nilaiPraktik"];
      $nilai_pilihan_ganda = $_POST["nilaiPilihanGanda"];
      $nilai_sikap = $_POST["nilaiSikap"];
      $nilai_kehadiran = $_POST["nilaiKehadiran"];

      $nilai_rata = ($nilai_praktik + $nilai_pilihan_ganda + $nilai_sikap + $nilai_kehadiran) / 4;

      echo "alert(`Nilai Praktik = $nilai_praktik
Nilai Pilihan Ganda = $nilai_pilihan_ganda
Nilai Sikap = $nilai_sikap
Nilai Kehadiran = $nilai_kehadiran

Nilai rata-rata = $nilai_rata`)";
    }
    ?>
  </script>
</body>

</html>