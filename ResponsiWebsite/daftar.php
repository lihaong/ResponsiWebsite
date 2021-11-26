<?php

session_start();
error_reporting(0);

include 'functions.php';

$no = 0;
$tabel = "inventaris";
$col = "kode_barang";
if ($_GET['daftar'] > 0) {
  $kategori = $_GET['daftar'];
  $data = query("SELECT * FROM $tabel WHERE kategori like '$kategori'");
} else {
  $data = query("SELECT * FROM $tabel");
}


if (isset($_POST["delete"])) {
  $kode = $_POST['id'];
  $nama = $_POST['nama_barang'];
  header("Location: delete.php?kode=$kode");
} 

if (isset($_POST["update"])) {
  $temp = $_POST['id'];
  header("Location: update.php?kode=$temp");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    Aplikasi Inventaris Berbasis Website
  </title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="tabel.css" />
</head>

<body>
  <nav>
    <div class="container bg-blue">
      <div class="title">
        Daftar Inventaris Barnag Kantor Serba
        Ada
      </div>
    </div>
    <div class="container">
      <div class="flex">
        <ul id="nav-btn">
          <li>
            <a href="./" class="btn">
              Beranda
            </a>
          </li>
          <li>
            <a href="daftar.php" class="btn">
              Daftar Inventaris
            </a>
          </li>
          <li>
            <div class="dropdown">
              <button class="dropbtn">
                List per-Kategori
              </button>
              <div class="dropdown-content">
                <a href="daftar.php?daftar=Bangunan" class="btn">
                  Bangunan
                </a>
                <a href="daftar.php?daftar=Kendaraan" class="btn">
                  Kendaraan
                </a>
                <a href="daftar.php?daftar=Alat Tulis Kantor" class="btn">
                  Alat Tulis Kantor
                </a>
                <a href="daftar.php?daftar=Elektronik" class="btn">
                  Elektronik
                </a>
              </div>
            </div>
          </li>
        </ul>
        <div id="login-container">
          <a class="login-btn btn" href="logout.php">
            Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <header class="container">
    <h2>Data Inventaris</h2>
    <table class="content-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Nama Barang</th>
          <th>Jumlah Satuan</th>
          <th>Tanggal Datang</th>
          <th>Kategori</th>
          <th>Status</th>
          <th>Harga Satuan</th>
          <th>Total Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php foreach ($data as $row) :
        $tot = $row['jumlah'] * $row['harga']; ?>
        <tbody>
          <tr>
            <td><?= $no += 1; ?></td>
            <td><?= $row[$col]; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['jumlah'] . ' ' . $row['satuan']; ?></td>
            <td><?= $newDate = date("d-m-Y", strtotime($row['tgl_datang']));; ?></td>
            <td>
              <?= $row['kategori']; ?>
            </td>
            <td><?= $row['status_barang']; ?></td>
            <td><?= $harga = "RP." . number_format($row['harga'], 2, ',', '.'); ?></td>
            <td><?=
                $totharga = "RP." . number_format($tot, 2, ',', '.');
                ?></td>
            <td>
              <form method="POST">
                <button style="width: 80px;" class="btn" id="update" type="submit" name="update"> Edit
                </button>
                <input type="hidden" name="id" value="<?= $row[$col]; ?>" />
              </form>
              <form method="POST">
                <button style="width: 80px;" class="btn" id="delete" type="submit" name="delete">
                  Delete
                </button>
                <input type="hidden" name="id" value="<?= $row[$col]; ?>" />
              </form>
            </td>
          </tr>
        </tbody>

      <?php endforeach; ?>
    </table>
    <a href="input.php" style="
            text-decoration: none;
            margin-bottom: 100px;
            border : 1px solid #171717;
          " class="login btn">
      Tambah
    </a>
  </header>
  <footer>
    <div class="container bg-blue">
      <div style="font-size: 14px" class="title">
        Inventaris 2016
      </div>
    </div>
  </footer>
</body>

</html>