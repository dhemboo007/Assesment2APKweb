
<?php
session_start();

require_once 'Kendaraan.php';
require_once 'Mobil.php';
require_once 'Motor.php';

if (!isset($_SESSION['kendaraan'])) {
    $_SESSION['kendaraan'] = [];
}

$petugas = $_COOKIE['petugas'] ?? 'Petugas';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Manajemen Parkiran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Sistem Manajemen Kendaraan Parkiran</h2>

    <p>Selamat datang, <b><?= htmlspecialchars($petugas) ?></b>!</p>

    <a href="logout.php" class="logout">Logout</a>

    <h3>Tambah Kendaraan</h3>

    <form action="proses.php" method="POST"
          enctype="multipart/form-data">

        <label>Nama Petugas</label>
        <input type="text" name="petugas" required>

        <label>ID Kendaraan</label>
        <input type="text" name="id" required>

        <label>Plat Nomor</label>
        <input type="text" name="plat" required>

        <label>Nama Pemilik</label>
        <input type="text" name="pemilik" required>

        <label>Jenis Kendaraan</label>
        <select name="jenis" id="jenis" onchange="ubahForm()" required>
            <option value="Mobil">Mobil</option>
            <option value="Motor">Motor</option>
        </select>

        <div id="tipeMobil">
            <label>Tipe Mobil</label>
            <select name="tipe_mobil">
                <option value="SUV">SUV</option>
                <option value="Sedan">Sedan</option>
                <option value="MPV">MPV</option>
            </select>
        </div>

        <div id="kapasitasMotor" style="display:none">
            <label>Kapasitas Mesin (CC)</label>
            <input type="number" name="kapasitas" value="150">
        </div>

        <label>Tarif Parkir Per Jam</label>
        <input type="number" name="tarif" required>

        <label>Durasi Parkir (Jam)</label>
        <input type="number" name="durasi" min="1" required>

        <label>Foto Kendaraan</label>
        <input type="file" name="gambar" accept="image/jpeg,image/png,image/webp">

        <label>Dokumen Kendaraan (PDF/DOC)</label>
        <input type="file" name="dokumen"
               accept=".pdf,.doc,.docx">

        <button type="submit">Simpan Kendaraan</button>

    </form>

    <hr>

    <h3>Daftar Kendaraan Parkir</h3>

    <?php if (empty($_SESSION['kendaraan'])): ?>

        <p>Belum ada kendaraan yang terdaftar.</p>

    <?php else: ?>

        <?php foreach ($_SESSION['kendaraan'] as $key => $data): ?>

            <?php
            if ($data['jenis'] == 'Mobil') {
                $kendaraan = new Mobil(
                    $data['id'],
                    $data['plat'],
                    $data['pemilik'],
                    $data['tarif'],
                    $data['detail']
                );
            } else {
                $kendaraan = new Motor(
                    $data['id'],
                    $data['plat'],
                    $data['pemilik'],
                    $data['tarif'],
                    $data['detail']
                );
            }

            $durasi = $data['durasi'];
            $biaya = $kendaraan->hitungBiayaParkir($durasi);
            ?>

            <div class="card">

                <h4><?= htmlspecialchars($data['jenis']) ?></h4>

                <p><?= htmlspecialchars($kendaraan->displayInfo()) ?></p>

                <p>Durasi: <?= $durasi ?> Jam</p>

                <p class="total">
                    Total Biaya: Rp<?= number_format($biaya, 0, ',', '.') ?>
                </p>

                <?php if (!empty($data['gambar'])): ?>
                    <p>Foto Kendaraan:</p>
                    <img src="<?= htmlspecialchars($data['gambar']) ?>"
                         width="180" alt="Foto kendaraan">
                <?php endif; ?>

                <?php if (!empty($data['dokumen'])): ?>
                    <p>
                        <a href="<?= htmlspecialchars($data['dokumen']) ?>"
                           target="_blank">Lihat Dokumen</a>
                    </p>
                <?php endif; ?>

                <form action="hapus.php" method="POST">
                    <input type="hidden" name="key" value="<?= $key ?>">
                    <button type="submit" class="hapus">Hapus Data</button>
                </form>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

<script>
function ubahForm() {
    let jenis = document.getElementById('jenis').value;

    document.getElementById('tipeMobil').style.display =
        jenis === 'Mobil' ? 'block' : 'none';

    document.getElementById('kapasitasMotor').style.display =
        jenis === 'Motor' ? 'block' : 'none';
}
</script>

</body>
</html>
