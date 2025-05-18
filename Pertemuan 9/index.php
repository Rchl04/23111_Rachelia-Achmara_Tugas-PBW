<?php
include 'koneksi.php';
$sql = "SELECT m.nama AS nama_mahasiswa, mk.nama AS nama_mk, mk.jumlah_sks 
        FROM krs k
        JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
        JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk";
$data = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas Praktikum Pertemuan 9</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      background-color: #8F87F1;
      color: white;
      padding-top: 20px;
      position: fixed;
      width: 220px;
    }
    .sidebar h4 {
      text-align: center;
      margin-bottom: 30px;
    }
    .sidebar a {
      color: white;
      display: block;
      padding: 10px 20px;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color:rgb(108, 96, 244);
    }
    .main-content {
      margin-left: 220px;
      padding: 30px;
    }
    .card-header {
      background-color: #8F87F1;
      color: white;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h4>E-Campus</h4>
    <a href="index.php">🏠 Home</a>
    <a href="mahasiswa.php">👨‍🎓 Mahasiswa</a>
    <a href="mataKuliah.php">📘 Mata Kuliah</a>
    <a href="krs.php">📝 KRS</a>

  </div>

  <div class="main-content">
    <h1 class="mb-4">Dashboard KRS Mahasiswa</h1>

    <div class="card">
      <div class="card-header">Data KRS</div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Mata Kuliah</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; while ($row = $data->fetch_assoc()) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_mahasiswa'] ?></td>
                <td><?= $row['nama_mk'] ?></td>
                <td><span style="color:#d63384"><strong><?= $row['nama_mahasiswa'] ?></strong></span> Mengambil Mata Kuliah <span style="color:#0d6efd"><strong><?= $row['nama_mk'] ?></strong></span> (<?= $row['jumlah_sks'] ?> SKS)</td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>