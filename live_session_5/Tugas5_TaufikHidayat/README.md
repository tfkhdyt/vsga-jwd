# Hitung Ongkir Pengiriman Barang EntarAja

Ini adalah sebuah aplikasi berbasis web untuk menghitung ongkos kirim pengiriman barang dengan ekspedisi EntarAja

## Tech

- PHP
- Tailwind CSS
- JSON
- HTML

## Requirements

- Apache
- PHP
- Text Editor
- Browser

## Installation

1. Pindahkan folder project ini ke folder htdocs `htdocs/entaraja`
2. Jalankan Apache
3. Buka browser lalu buka URL `localhost/entaraja`

## Structure

.
├── assets // folder untuk menyimpan assets seperti css dan gambar
│   ├── css // folder css
│   │   ├── style.css // file css utama
│   │   └── tailwind.css // file bahan kompilasi tailwind
│   └── images // folder gambar
│       ├── entaraja.png // logo entaraja
│       └── favicon.ico // logo favicon
├── components // folder untuk komponen html kecil agar lebih rapi
│   ├── form.php // komponen form
│   ├── navbar.php // komponen navbar
│   └── table.php // komponen table
├── data // folder untuk menyimpan data json
│   └── data.json // file dta
├── index.php // file php utama
├── node_modules
│   ├── @tailwindcss
│   │   └── forms // folder plugin tailwind untuk form
│   └── tailwindcss // folder dependency tailwind css
├── package.json // file metadata untuk dependency
├── pnpm-lock.yaml // file lock untuk dependency
├── tailwind.config.js // file konfigurasi tailwind
└── utils // folder untuk menyimpan function-function
    ├── generateNoResi.php // function generate no resi
    └── hitungOngkir.php // function hitung ongkir
