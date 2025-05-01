<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Rute Penerbangan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Pendaftaran Rute Penerbangan</h1>
    <form action="hasil.php" method="post">
        <label>Nama Maskapai:</label><br>
        <input type="text" name="maskapai" required><br><br>

        <label>Bandara Asal:</label><br>
        <select name="asal">
            <?php
            $bandara_asal = [
                "Abdul Rachman Saleh (MLG)" => 40000,
                "Husein Sastranegara (BDO)" => 50000,
                "Juanda (SUB)" => 30000,
                "Soekarno Hatta (CGK)" => 65000
            ];
            ksort($bandara_asal);
            foreach ($bandara_asal as $nama => $pajak) {
                echo "<option value='$nama'>$nama</option>";
            }
            ?>
        </select><br><br>

        <label>Bandara Tujuan:</label><br>
        <select name="tujuan">
            <?php
            $bandara_tujuan = [
                "Hasanuddin (UPG)" => 70000,
                "Inanwatan (INX)" => 90000,
                "Ngurah Rai (DPS)" => 85000,
                "Sultan Iskandar Muda (BTJ)" => 60000
            ];
            ksort($bandara_tujuan);
            foreach ($bandara_tujuan as $nama => $pajak) {
                echo "<option value='$nama'>$nama</option>";
            }
            ?>
        </select><br><br>

        <label>Harga Tiket (Rp):</label><br>
        <input type="number" name="harga" required><br><br>

        <button type="submit">Proses Pendaftaran</button>
    </form>
</body>
</html>
