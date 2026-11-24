# 🚗 Sistem Manajemen Kendaraan di Parkiran

Aplikasi web untuk mengelola data kendaraan yang berada di area parkir menggunakan PHP Native, HTML, CSS, JavaScript, dan Object-Oriented Programming (OOP).

Project ini merupakan pengembangan Final Project Assessment I mata kuliah Aplikasi Web (ISWD201), dengan penambahan fitur Session, Cookie, dan Upload File/Gambar.

## 📌 Fitur Utama

- **Manajemen Kendaraan:** Menambahkan, menampilkan, dan menghapus data mobil dan motor.
- **Perhitungan Parkir:** Menghitung biaya parkir berdasarkan durasi, biaya tambahan mobil, dan diskon motor.
- **Session:** Menyimpan data kendaraan sementara.
- **Cookie:** Mengingat nama petugas parkir selama 7 hari.
- **Upload Gambar:** Mengunggah foto kendaraan ke folder `images`.
- **Upload Dokumen:** Mengunggah dokumen PDF, DOC, dan DOCX ke folder `files`.
- **Validasi Upload:** Memeriksa MIME Type dan membatasi ukuran file.

## 🛠️ Teknologi

- HTML5
- CSS3
- JavaScript
- PHP Native
- PHP Object-Oriented Programming (OOP)
- Session & Cookie
- Apache
- Laragon

## 📂 Struktur Folder

```text
parkiran/
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

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/dhemboo007/parkiran.git
```

### 2. Masukkan ke Folder Laragon

Simpan folder `parkiran` di:

```text
C:\laragon\www\parkiran
```

### 3. Jalankan Laragon

- Buka Laragon.
- Klik Start All.
- Pastikan Apache aktif.
- Pastikan ekstensi PHP `fileinfo` aktif.

### 4. Jalankan Website

Buka browser dan akses:

```text
http://localhost/parkiran/
```

## 💡 Konsep OOP

**Encapsulation:** Menggunakan access modifier `private` dan `protected`.

**Inheritance:** Class `Mobil` dan `Motor` mewarisi class `Kendaraan`.

**Polymorphism:** Melakukan override method `displayInfo()` dan `hitungBiayaParkir()`.

**Constructor:** Menginisialisasi atribut objek kendaraan.

## 🔐 Keamanan

- Validasi MIME Type file.
- Pembatasan ukuran upload.
- Nama file acak.
- Proteksi folder upload menggunakan `.htaccess`.
- Penggunaan `htmlspecialchars()` untuk keamanan output HTML.

## ⚠️ Catatan

Data kendaraan disimpan sementara menggunakan PHP Session, bukan database permanen. Data dapat hilang ketika session berakhir.

## 👨‍💻 Developer

**Fatih El Rayyan**

- GitHub: [@dhemboo007](https://github.com/dhemboo007)

---

Developed as a Web Development Project using PHP Native & OOP.

⭐ Don't forget to star this repository!
