<?php
session_start();
include("functions.php");
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
} else {
 $user = $_SESSION['user'];
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
            <a href="index.php" class="btn">
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
  <header>
    <div class="container">
      <h2 style="color: black" class="title">
        Selamat Datang
      </h2>
      <h1 style="color: black" class="title">
        <?php echo $user; ?>
      </h1>
    </div>
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