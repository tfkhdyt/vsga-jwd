<?php
// function untuk menjumlahkan variabel a dan b
function penjumlahan($a, $b) {
  return $a + $b;
}

// function untuk pengurangan variabel a dan b
function pengurangan($a, $b) {
  return $a - $b;
}

// function untuk perkalian variabel a dan b
function perkalian($a, $b) {
  return $a * $b;
}

// function untuk pembagian variabel a dan b
function pembagian($a, $b) {
  return $a / $b;
}

// function untuk modulus variabel a dan b
function modulus($a, $b) {
  return $a % $b;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Kalkulator Sederhana</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <main class="grid place-items-center h-screen w-screen container mx-auto  ">
    <section class="flex space-x-6 py-6">
      <form class="bg-gradient-to-br from-sky-100 to-sky-200 p-6 pb-8 shadow hover:shadow-lg transition duration-300 flex flex-col space-y-4 rounded-lg" action="" method="POST">
        <p class="font-bold text-lg text-center bg-gradient-to-r from-blue-700 to-red-500 text-transparent bg-clip-text">Aplikasi Kalkulator Sederhana</p>
        <div class="flex space-x-4 items-center justify-around">
          <label for="bilangan1" class="font-medium text-slate-700">Bilangan 1</label>
          <input type="number" id="bilangan1" name="bilangan1" class="border border-slate-400 focus:ring-2 focus:ring-blue-500 outline-none px-2 py-1 w-4/6 rounded transition duration-300" />
        </div>
        <div class="flex space-x-4 items-center justify-around">
          <label for="bilangan2" class="font-medium text-slate-700">Bilangan 2</label>
          <input type="number" id="bilangan2" name="bilangan2" class="border border-slate-400 focus:ring-2 focus:ring-blue-500 outline-none px-2 py-1 w-4/6 rounded transition duration-300" />
        </div>
        <button class="bg-green-400 text-white font-bold py-2 rounded outline-2 outline-green-500 hover:bg-green-500 active:bg-green-600 transition duration-300" type="submit" name="submit">Hitung</button>
      </form>
      <?php if (isset($_POST["submit"])) : # ketika tombol submit ditekan
        $bilangan1 = $_POST["bilangan1"]; # assign data post ke variable bilangan1
        $bilangan2 = $_POST["bilangan2"]; # assign data post ke variable bilangan2
      ?>
        <section class="bg-gradient-to-br from-sky-100 to-sky-200 p-6 pb-8 shadow hover:shadow-lg transition duration-300 flex flex-col space-y-4 rounded-lg w-72 text-slate-700 font-medium">
          <p class="font-bold text-lg text-center bg-gradient-to-r from-blue-700 to-red-500 text-transparent bg-clip-text">Output</p>
          <div class="tracking-widest leading-loose">
            <!-- Tampilkan output dan gunakan function yang sudah dibuat sebelumnya -->
            <p><?= "$bilangan1 + $bilangan2 = " . penjumlahan($bilangan1, $bilangan2) ?></p>
            <p><?= "$bilangan1 - $bilangan2 = " . pengurangan($bilangan1, $bilangan2) ?></p>
            <p><?= "$bilangan1 * $bilangan2 = " . perkalian($bilangan1, $bilangan2) ?></p>
            <p><?= "$bilangan1 / $bilangan2 = " . number_format(pembagian($bilangan1, $bilangan2), 2) ?></p>
            <p><?= "$bilangan1 % $bilangan2 = " . modulus($bilangan1, $bilangan2) ?></p>
          </div>
          </div>
        </section>
      <?php endif; ?>
    </section>
  </main>
</body>


</html>