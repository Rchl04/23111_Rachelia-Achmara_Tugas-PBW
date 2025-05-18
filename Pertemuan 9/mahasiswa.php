<?php
include 'koneksi.php';

// Tambah
if (isset($_POST['tambah'])) {
  $npm = $_POST['npm'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  mysqli_query($koneksi, "INSERT INTO mahasiswa (npm, nama, alamat) VALUES ('$npm', '$nama', '$alamat')");
  header("Location: mahasiswa.php");
}

// Edit
if (isset($_POST['edit'])) {
  $npm = $_POST['npm'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', alamat='$alamat' WHERE npm='$npm'");
  header("Location: mahasiswa.php");
}

// Delete
if (isset($_GET['hapus'])) {
  $npm = $_GET['hapus'];
  mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm='$npm'");
  header("Location: mahasiswa.php");
}

// Ambil data
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

// Ambil data edit (jika ada)
$editData = null;
if (isset($_GET['edit'])) {
  $npm = $_GET['edit'];
  $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$npm'");
  $editData = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Mahasiswa</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2>Data Mahasiswa</h2>
  <a href="index.php" class="btn btn-secondary mb-3">⬅️ Kembali</a>

  <form method="post">
    <div class="mb-3">
      <label>NPM</label>
      <input type="text" name="npm" class="form-control" value="<?= $editData['npm'] ?? '' ?>" <?= $editData ? 'readonly' : '' ?> required>
    </div>
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= $editData['nama'] ?? '' ?>" required>
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required><?= $editData['alamat'] ?? '' ?></textarea>
    </div>
    <button type="submit" name="<?= $editData ? 'edit' : 'tambah' ?>" class="btn btn-primary">
      <?= $editData ? 'Update' : 'Tambah' ?>
    </button>
    <?php if ($editData): ?>
      <a href="mahasiswa.php" class="btn btn-secondary">Batal</a>
    <?php endif; ?>
  </form>

  <hr>
  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>NPM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($data)) : ?>
        <tr>
          <td><?= $row['npm'] ?></td>
          <td><?= $row['nama'] ?></td>
          <td><?= $row['alamat'] ?></td>
          <td>
            <a href="mahasiswa.php?edit=<?= $row['npm'] ?>" class="btn btn-warning btn-sm">✏️</a>
            <a href="mahasiswa.php?hapus=<?= $row['npm'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">🗑️</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
