<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
  $npm = $_POST['mahasiswa_npm'];
  $kodemk = $_POST['matakuliah_kodemk'];
  mysqli_query($koneksi, "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$npm', '$kodemk')");
  header("Location: krs.php");
}

if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  mysqli_query($koneksi, "DELETE FROM krs WHERE id='$id'");
  header("Location: krs.php");
}

// Ambil data untuk form dropdown
$mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
$matakuliah = mysqli_query($koneksi, "SELECT * FROM matakuliah");

// Gabung data KRS
$data = mysqli_query($koneksi, "SELECT k.id, m.nama AS nama_mahasiswa, mk.nama AS nama_mk, mk.jumlah_sks 
                                FROM krs k
                                JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
                                JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data KRS</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2>Data KRS Mahasiswa</h2>
  <a href="index.php" class="btn btn-secondary mb-3">⬅️ Kembali</a>

  <form method="post" class="mb-4">
    <div class="mb-3">
      <label>Mahasiswa</label>
      <select name="mahasiswa_npm" class="form-control" required>
        <option value="">-- Pilih Mahasiswa --</option>
        <?php while ($m = mysqli_fetch_assoc($mahasiswa)) : ?>
          <option value="<?= $m['npm'] ?>"><?= $m['nama'] ?> (<?= $m['npm'] ?>)</option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Mata Kuliah</label>
      <select name="matakuliah_kodemk" class="form-control" required>
        <option value="">-- Pilih Mata Kuliah --</option>
        <?php while ($mk = mysqli_fetch_assoc($matakuliah)) : ?>
          <option value="<?= $mk['kodemk'] ?>"><?= $mk['nama'] ?> (<?= $mk['jumlah_sks'] ?> SKS)</option>
        <?php endwhile; ?>
      </select>
    </div>
    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
  </form>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Mahasiswa</th>
        <th>Mata Kuliah</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; while ($row = mysqli_fetch_assoc($data)) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['nama_mahasiswa'] ?></td>
          <td><?= $row['nama_mk'] ?></td>
          <td><?= $row['nama_mahasiswa'] ?> mengambil <strong><?= $row['nama_mk'] ?></strong> (<?= $row['jumlah_sks'] ?> SKS)</td>
          <td>
            <a href="krs.php?hapus=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">🗑️</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>