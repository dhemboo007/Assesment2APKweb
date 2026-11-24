# 🚗 Sistem Manajemen Kendaraan di Parkiran

Aplikasi web untuk mengelola data kendaraan yang berada di area parkir menggunakan **PHP Native, HTML, CSS, dan Object-Oriented Programming (OOP)**.

Project ini merupakan pengembangan dari Final Project Assessment I mata kuliah **Aplikasi Web (ISWD201)** dengan penambahan fitur Session, Cookie, dan Upload File/Gambar.

## 📌 Fitur Utama

### 1. Manajemen Kendaraan
- Menambahkan data kendaraan mobil dan motor.
- Menampilkan informasi kendaraan.
- Menghitung biaya parkir berdasarkan durasi.
- Menghitung biaya tambahan khusus mobil.
- Memberikan diskon parkir motor lebih dari 5 jam.
- Menghapus data kendaraan.

### 2. Session & Cookie
- Menggunakan PHP Session untuk menyimpan data kendaraan sementara.
- Menggunakan Cookie untuk mengingat nama petugas parkir.
- Session dapat dihapus melalui fitur Logout.
- Cookie nama petugas memiliki masa berlaku 7 hari.

### 3. Upload File & Gambar
- Upload foto kendaraan.
- Upload dokumen kendaraan dalam format PDF, DOC, dan DOCX.
- Menyimpan gambar ke folder `images`.
- Menyimpan dokumen ke folder `files`.
- Validasi tipe file menggunakan MIME Type.
- Membatasi ukuran gambar maksimal 2 MB.
- Membatasi ukuran dokumen maksimal 5 MB.
- Menggunakan nama file acak untuk menghindari konflik nama.

## 🛠️ Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| HTML5 | Struktur halaman web |
| CSS3 | Desain dan tampilan |
| JavaScript | Interaksi form |
| PHP Native | Backend aplikasi |
| PHP OOP | Pengelolaan objek kendaraan |
| Session & Cookie | Penyimpanan data sementara |
| Apache | Web server |
| Laragon | Local development environment |

## 📂 Struktur Folder

```text
Assessment1/
│
├── index.php
├── Kendaraan.php
├── Mobil.php
├── Motor.php
├── proses.php
├── hapus.php
├── logout.php
├── style.css
│
├── images/
│   └── .htaccess
│
└── files/
    └── .htaccess
```

## 🚀 Cara Instalasi dan Menjalankan

### 1. Persiapan
Pastikan perangkat sudah memiliki:
- Laragon
- PHP
- Apache
- Visual Studio Code (opsional)

### 2. Clone Repository

Buka terminal dan jalankan:

```bash
git clone https://github.com/USERNAME/Assessment1.git
```

Ganti `USERNAME` dengan username GitHub kamu.

### 3. Pindahkan Project

Simpan folder project ke:

```text
C:\laragon\www\Assessment1
```

### 4. Jalankan Laragon

1. Buka aplikasi Laragon.
2. Klik **Start All**.
3. Pastikan Apache berjalan.
4. Aktifkan ekstensi PHP `fileinfo`.

### 5. Buka Website

Akses melalui browser:

```text
http://localhost/Assessment1/
```

## 💻 Konsep OOP yang Diterapkan

Project ini menerapkan beberapa konsep Object-Oriented Programming:

**1. Encapsulation**

Menggunakan access modifier `private` dan `protected` untuk melindungi atribut class.

**2. Inheritance**

Class `Mobil` dan `Motor` mewarisi class induk `Kendaraan`.

**3. Polymorphism**

Melakukan override method `displayInfo()` dan `hitungBiayaParkir()` sesuai karakteristik masing-masing kendaraan.

**4. Constructor**

Menginisialisasi atribut objek kendaraan saat objek dibuat.

## 🔐 Keamanan Aplikasi

Beberapa mekanisme keamanan yang diterapkan:

- Validasi tipe file berdasarkan MIME Type.
- Pembatasan ukuran file upload.
- Penggunaan nama file acak.
- Perlindungan folder upload menggunakan `.htaccess`.
- Penggunaan `htmlspecialchars()` untuk mencegah output HTML yang tidak aman.

## 📚 Informasi Project

| Keterangan | Detail |
|---|---|
| Nama Project | Sistem Manajemen Kendaraan di Parkiran |
| Mata Kuliah | Aplikasi Web |
| Kode Mata Kuliah | ISWD201 |
| Bahasa Pemrograman | PHP |
| Framework | PHP Native |
| Development Tool | Laragon & VS Code |
| Penyimpanan | PHP Session (sementara) |

## ⚠️ Catatan

Project ini menggunakan PHP Session untuk menyimpan data kendaraan sementara. Data tidak disimpan secara permanen ke database MySQL dan dapat hilang ketika session berakhir.

Project ini dikembangkan sebagai bagian dari pembelajaran dan implementasi konsep Web Development serta Object-Oriented Programming.

## 👨‍💻 Developer

**Fatih El Rayyan**

- GitHub: [@dhemboo007](https://github.com/dhemboo007)
- LinkedIn: [Fatih El Rayyan](https://www.linkedin.com/)

---

⭐ Jika project ini bermanfaat, jangan lupa berikan star pada repository ini!

**Built with PHP & ❤️**
