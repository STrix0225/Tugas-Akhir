# Sistem Manajemen Gym

Project ini merupakan pengembangan Sistem Manajemen Gym yang berfokus pada pembuatan antarmuka responsif dan implementasi sistem autentikasi dinamis.

## 1. index.php
Pada file `index.php`, terdapat struktur utama halaman web yang dibuat menggunakan HTML dan framework Bootstrap. File ini berisi pemanggilan ke file eksternal `style.css` untuk kustomisasi tampilan serta memuat Bootstrap Icons untuk elemen visual pendukung. Keseluruhan halaman dibungkus dengan tata letak yang responsif agar dapat menyesuaikan ukuran antarmuka pada berbagai perangkat mobile maupun desktop.

Struktur halamannya terdiri dari beberapa bagian utama, dimulai dengan elemen Navbar untuk memuat menu navigasi. Di bawahnya terdapat Hero Section yang menampilkan judul serta deskripsi singkat mengenai sistem manajemen gym. Selanjutnya, halaman menampilkan Section Statistik dan Daftar Paket Membership yang memanfaatkan komponen Card serta sistem Grid Bootstrap secara optimal untuk membagi layar menjadi tiga kolom yang sejajar.

Di bagian bawah, terdapat form registrasi input data yang terdiri dari empat field utama (nama, nomor telepon, pilihan paket, dan tanggal mulai). Setiap field tersebut dilengkapi dengan atribut `required` yang berfungsi sebagai validasi sederhana di sisi klien untuk memastikan tidak ada data yang kosong sebelum disimpan. Halaman web ini kemudian ditutup dengan elemen Footer.

## 2. style.css
Pada file `style.css`, didefinisikan variabel root untuk mengatur tema warna utama menjadi merah. File ini mengelola visual spesifik yang tidak dicakup oleh Bootstrap, seperti efek box-shadow, penyesuaian background image pada Hero Section, serta penambahan efek hover pada Card dan tombol agar desain terasa lebih interaktif dan menarik.

## 3. Fitur Autentikasi
Pada iterasi terbaru ini, website diubah menjadi dinamis menggunakan PHP dengan penambahan fitur berikut:
* **Sistem Login (Session):** Halaman utama diproteksi. Pengguna wajib melakukan login melalui form yang tersedia. [cite_start]Status login disimpan dan dikelola menggunakan `$_SESSION`[cite: 9, 10, 13].
* [cite_start]**Remember Me (Cookies):** Terdapat checkbox "Remember Me" pada halaman login yang memanfaatkan sistem Cookies untuk menyimpan username, sehingga form akan otomatis terisi saat pengguna kembali[cite: 20, 21, 22, 23].
* [cite_start]**Logout:** Fitur untuk mengakhiri sesi pengguna secara aman dan mengembalikan pengguna ke halaman login[cite: 16, 18, 19].
* [cite_start]**Validasi Alert Bootstrap:** Notifikasi kegagalan login kini menggunakan komponen Alert dari Bootstrap untuk memberikan pengalaman pengguna yang lebih baik, menggantikan alert bawaan JavaScript[cite: 25, 26].

### Kredensial Login
* **Username:** `admin`
* **Password:** `admin123`