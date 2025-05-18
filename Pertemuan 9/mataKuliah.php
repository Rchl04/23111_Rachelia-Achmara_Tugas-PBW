<?php
include 'koneksi.php';

// Tambah
if (isset($_POST['tambah'])) {
  $kode = $_POST['kodemk'];
  $nama = $_POST['nama'];
  $sks = $_POST['jumlah_sks'];
  mysqli_query($koneksi, "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES ('$kode', '$nama', '$sks')");
  header("Location: matakuliah.php");
}

// Edit
if (isset($_POST['edit'])) {
  $kode = $_POST['kodemk'];
  $nama = $_POST['nama'];
  $sks = $_POST['jumlah_sks'];
  mysqli_query($koneksi, "UPDATE matakuliah SET nama='$nama', jumlah_sks='$sks' WHERE kodemk='$kode'");
  header("Location: matakuliah.php");
}

// Delete
if (isset($_GET['hapus'])) {
  $kode = $_GET['hapus'];
  mysqli_query($koneksi, "DELETE FROM matakuliah WHERE kodemk='$kode'");
  header("Location: matakuliah.php");
}

$data = mysqli_query($koneksi, "SELECT * FROM matakuliah");

// Untuk edit
$editData = null;
if (isset($_GET['edit'])) {
  $kode = $_GET['edit'];
  $result = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kodemk='$kode'");
  $editData = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Mata Kuliah</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2>Data Mata Kuliah</h2>
  <a href="index.php" class="btn btn-secondary mb-3">⬅️ Kembali</a>

  <form method="post">
    <div class="mb-3">
      <label>Kode MK</label>
      <input type="text" name="kodemk" class="form-control" value="<?= $editData['kodemk'] ?? '' ?>" <?= $editData ? 'readonly' : '' ?> required>
    </div>
    <div class="mb-3">
      <label>Nama Mata Kuliah</label>
      <input type="text" name="nama" class="form-control" value="<?= $editData['nama'] ?? '' ?>" required>
    </div>
    <div class="mb-3">
      <label>Jumlah SKS</label>
      <input type="number" name="jumlah_sks" class="form-control" value="<?= $editData['jumlah_sks'] ?? '' ?>" required>
    </div>
    <button type="submit" name="<?= $editData ? 'edit' : 'tambah' ?>" class="btn btn-primary">
      <?= $editData ? 'Update' : 'Tambah' ?>
    </button>
    <?php if ($editData): ?>
      <a href="matakuliah.php" class="btn btn-secondary">Batal</a>
    <?php endif; ?>
  </form>

  <hr>
  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>Kode MK</th>
        <th>Nama</th>
        <th>SKS</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($data)) : ?>
        <tr>
          <td><?= $row['kodemk'] ?></td>
          <td><?= $row['nama'] ?></td>
          <td><?= $row['jumlah_sks'] ?></td>
          <td>
            <a href="matakuliah.php?edit=<?= $row['kodemk'] ?>" class="btn btn-warning btn-sm">✏️</a>
            <a href="matakuliah.php?hapus=<?= $row['kodemk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">🗑️</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>