
<?php
session_start();

if (!isset($_SESSION['kendaraan'])) {
    $_SESSION['kendaraan'] = [];
}

// Menyimpan nama petugas menggunakan cookie
$petugas = trim($_POST['petugas'] ?? '');

if ($petugas !== '') {
    setcookie('petugas', $petugas, [
        'expires' => time() + (86400 * 7),
        'path' => '/',
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
}

// Mengambil data kendaraan
$id = trim($_POST['id'] ?? '');
$plat = trim($_POST['plat'] ?? '');
$pemilik = trim($_POST['pemilik'] ?? '');
$jenis = $_POST['jenis'] ?? '';
$tarif = (int) ($_POST['tarif'] ?? 0);
$durasi = (int) ($_POST['durasi'] ?? 0);

if ($id === '' || $plat === '' || $pemilik === ''
    || $tarif <= 0 || $durasi <= 0
    || !in_array($jenis, ['Mobil', 'Motor'])) {
    die("Data kendaraan tidak valid.");
}

// Detail kendaraan
$detail = '';

if ($jenis === 'Mobil') {
    $detail = $_POST['tipe_mobil'] ?? 'SUV';
    if (!in_array($detail, ['SUV', 'Sedan', 'MPV'])) {
        die("Tipe mobil tidak valid.");
    }
} else {
    $detail = (int) ($_POST['kapasitas'] ?? 0);
    if ($detail <= 0) {
        die("Kapasitas mesin tidak valid.");
    }
}

// Fungsi upload
function uploadFile($field, $folder, $allowedTypes, $maxSize) {

    if (!isset($_FILES[$field]) ||
        $_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE) {
        return '';
    }

    $file = $_FILES[$field];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Upload gagal.");
    }

    if ($file['size'] > $maxSize) {
        die("Ukuran file terlalu besar.");
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime, $allowedTypes)) {
        die("Jenis file tidak diizinkan.");
    }

    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = bin2hex(random_bytes(16)) . '.' .
                strtolower($extension);

    $destination = $folder . '/' . $filename;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        die("Gagal menyimpan file.");
    }

    return $destination;
}

// Upload gambar maksimal 2 MB
$gambar = uploadFile(
    'gambar',
    'images',
    ['image/jpeg', 'image/png', 'image/webp'],
    2 * 1024 * 1024
);

// Upload dokumen maksimal 5 MB
$dokumen = uploadFile(
    'dokumen',
    'files',
    [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ],
    5 * 1024 * 1024
);

// Menyimpan data ke session
$_SESSION['kendaraan'][] = [
    'id' => $id,
    'plat' => $plat,
    'pemilik' => $pemilik,
    'jenis' => $jenis,
    'tarif' => $tarif,
    'durasi' => $durasi,
    'detail' => $detail,
    'gambar' => $gambar,
    'dokumen' => $dokumen
];

header("Location: index.php");
exit;
?>
