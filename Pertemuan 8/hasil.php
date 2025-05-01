<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Hasil Pendaftaran Rute Penerbangan</h1>

    <?php
    $maskapai = $_POST['maskapai'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $harga = $_POST['harga'];

    $pajak_asal_list = [
        "Soekarno Hatta (CGK)" => 65000,
        "Husein Sastranegara (BDO)" => 50000,
        "Abdul Rachman Saleh (MLG)" => 40000,
        "Juanda (SUB)" => 30000
    ];

    $pajak_tujuan_list = [
        "Ngurah Rai (DPS)" => 85000,
        "Hasanuddin (UPG)" => 70000,
        "Inanwatan (INX)" => 90000,
        "Sultan Iskandar Muda (BTJ)" => 60000
    ];

    $pajak_asal = $pajak_asal_list[$asal] ?? 0;
    $pajak_tujuan = $pajak_tujuan_list[$tujuan] ?? 0;
    $total_pajak = $pajak_asal + $pajak_tujuan;
    $total_harga = $harga + $total_pajak;
    $tanggal = date("d-m-Y H:i:s");
    ?>

    <h2>Detail Penerbangan</h2>
    <strong><?= $maskapai ?></strong>
    <table>
        <tr><td>Asal Penerbangan</td><td><?= $asal ?></td></tr>
        <tr><td>Tujuan Penerbangan</td><td><?= $tujuan ?></td></tr>
        <tr><td>Harga Tiket</td><td>Rp <?= number_format($harga, 0, ',', '.') ?></td></tr>
        <tr><td>Pajak</td><td>Rp <?= number_format($total_pajak, 0, ',', '.') ?></td></tr>
        <tr><td><strong>Total Harga Tiket</strong></td><td><strong>Rp <?= number_format($total_harga, 0, ',', '.') ?></strong></td></tr>
    </table>

    <h2>Detail Pajak</h2>
    <table>
        <tr><th>Bandara</th><th>Pajak</th></tr>
        <tr><td><?= $asal ?></td><td>Rp <?= number_format($pajak_asal, 0, ',', '.') ?></td></tr>
        <tr><td><?= $tujuan ?></td><td>Rp <?= number_format($pajak_tujuan, 0, ',', '.') ?></td></tr>
        <tr><td><strong>Total Pajak</strong></td><td><strong>Rp <?= number_format($total_pajak, 0, ',', '.') ?></strong></td></tr>
    </table>

    <p>Tanggal pendaftaran: <?= $tanggal ?></p>

    <a href="formPenerbangan.php" class="btn">Kembali ke Form Pendaftaran</a>
    <a href="hasil.php" class="btn">Bersihkan Data</a>
</body>
</html>
