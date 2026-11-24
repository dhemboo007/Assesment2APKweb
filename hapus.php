
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['key'])) {

    $key = filter_var($_POST['key'], FILTER_VALIDATE_INT);

    if ($key !== false && isset($_SESSION['kendaraan'][$key])) {

        $data = $_SESSION['kendaraan'][$key];

        // Menghapus gambar
        if (!empty($data['gambar']) && is_file($data['gambar'])) {
            unlink($data['gambar']);
        }

        // Menghapus dokumen
        if (!empty($data['dokumen']) && is_file($data['dokumen'])) {
            unlink($data['dokumen']);
        }

        unset($_SESSION['kendaraan'][$key]);

        // Merapikan index array
        $_SESSION['kendaraan'] = array_values(
            $_SESSION['kendaraan']
        );
    }
}

header("Location: index.php");
exit;
?>
