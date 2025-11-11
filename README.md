# TP7DPBO2425C2

Tema Website : Sewa Apartment

Jadi tema dari website ini adalah penyewaan apartment dimana ada 3 kelas yaitu ruangan atau kamar, tenant yaitu penyewa dan payment yaitu pembayaran antara tenan dan ruangannya

Penjelasan dari setiap tabel yang pertama ada ruangan yang memiliki id lalu nomor ruangan lalu ketersediannya ruangan lalu ada harga dan lantai dan juga tipe ruangannya
Lalu ada tabel tenan yang berisi id, nama penyewa, email dan nomor teleponnya
tabel yang terkahir adalah tabel payment yang memiliki id lalu id ruangan dan id penyewa lalu jumlah dan tanggal pembayaran

🏗️Alur kode

Tahap 1: Inisialisasi di index.php

1. memuat kelas
2. membuat Objek
   
Tahap 2:Pemrosesan Aksi di index.php

Mekanisme Kunci (Post/Redirect/Get): Setelah setiap aksi CRUD (Create, Update, Delete) selesai, kode selalu memanggil header('Location: ...') diikuti exit;. Ini memastikan browser dialihkan ke halaman lain. Tujuannya adalah mencegah data formulir ter-submit ulang jika pengguna me-refresh halaman.

Tahap 3: Penayangan Tampilan

Setelah semua aksi diproses, bagian bawah index.php bertugas menampilkan antarmuka pengguna (HTML).

1. Struktur Dasar
2. Navigasi dan penetuan Halaman
3. Tampilan Khusus


Ringkasan Alur Kerja
Setiap kali pengguna mengakses atau berinteraksi dengan halaman:

1. Start: index.php mulai berjalan.

2. Model Load: Kelas-kelas CRUD di-load.

3. Action Check: index.php memeriksa apakah ada formulir yang disubmit atau tautan aksi yang diklik (misalnya, menghapus kamar).

4. Execute & Redirect: Jika ada aksi, method di kelas terkait dipanggil, dan halaman dialihkan (redirect) untuk menghindari resubmit.

5. View Load: Halaman yang diminta (berdasarkan ?page=...) dimuat, yang kemudian mengambil data terbaru dari database (menggunakan objek $room, $tenant, dll.) dan menampilkannya di HTML.

Dokumentasi Crud Setiap Entitas

https://github.com/user-attachments/assets/9c0a44cc-5910-45d9-aa03-b009915a6fdd

