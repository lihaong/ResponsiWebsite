<?php

$conn = mysqli_connect('localhost', 'root', '', 'ResponsiWeb');

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function login($data)
{
  global $conn;
  $username = htmlspecialchars($data["username"]);
  $pass = htmlspecialchars($data["password"]);

  $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    if ($pass === $row["password"]) {
      // set session
      $_SESSION['login'] = true;
      $_SESSION['user']  = $row['nama_lengkap'];
      header("Location: index.php");
    } else {
      echo "<script> alert('Password Salah!') </script>";
    }
  } else {
    echo "<script> alert('Email belum terdaftar!') </script>";
  }

  return mysqli_affected_rows($conn);
}


function inputData($input)
{
  global $conn;
  $kodebarang = htmlspecialchars($input["kode-barang"]);
  $namabarang = htmlspecialchars($input["nama-barang"]);
  $jumlah = htmlspecialchars($input["jumlah"]);
  $satuan = htmlspecialchars($input["satuan"]);
  $tanggal = htmlspecialchars($input["tanggal"]);
  $kategori = htmlspecialchars($input["kategori"]);
  $status = htmlspecialchars($input["status"]);
  $harga = htmlspecialchars($input["harga"]);

  $query = "INSERT INTO `inventaris` (`kode_barang`, `nama_barang`, `jumlah`, `satuan`, `tgl_datang`, `kategori`, `status_barang`, `harga`) VALUES ('$kodebarang', '$namabarang', '$jumlah', '$satuan', '$tanggal', '$kategori', '$status', '$harga'); ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


function delete($data)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM `inventaris` WHERE `inventaris`.`kode_barang` = '$data' ");
  return mysqli_affected_rows($conn);
}


function updateData($input, $id)
{
  global $conn;
  $kodebarang = htmlspecialchars($input["kode-barang"]);
  $namabarang = htmlspecialchars($input["nama-barang"]);
  $jumlah = htmlspecialchars($input["jumlah"]);
  $satuan = htmlspecialchars($input["satuan"]);
  $tanggal = htmlspecialchars($input["tanggal"]);
  $kategori = htmlspecialchars($input["kategori"]);
  $status = htmlspecialchars($input["status"]);
  $harga = htmlspecialchars($input["harga"]);

  $query = " 
  UPDATE `inventaris` SET `kode_barang`='$kodebarang',`nama_barang`='$namabarang',`jumlah`='$jumlah',`satuan`='$satuan',`tgl_datang`='$tanggal',`kategori`='$kategori',`status_barang`='$status',`harga`='$harga' WHERE kode_barang = '$id';
			";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function addItem()
{
  if (isset($_POST["add"])) {
    if (isset($_SESSION['cart'])) {
      //
      $item_array_id = array_column($_SESSION['cart'], "product_id");
      if (in_array($_POST['product_id'], $item_array_id)) {
        echo "
      <script>
      alert('Data telah di keranjang!');
      </script>
      ";
        header("Refresh:0");
      } else {
        $count = count($_SESSION['cart']);

        $item_array = array(
          'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][$count] = $item_array;
      }
    } else {
      $item_array = array(
        'product_id' => $_POST['product_id']
      );
      $_SESSION['cart'][0] = $item_array;
    }
  }
}
