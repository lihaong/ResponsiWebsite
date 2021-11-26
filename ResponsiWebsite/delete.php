<?php
session_start();
error_reporting(0);
include 'functions.php';

$kode = $_GET['kode'];
$tabel = "inventaris";

$data = query("SELECT * FROM $tabel");
foreach ($data as $row) {
    if ($row['kode_barang'] == $kode) {
        $tempnama = $row['nama_barang'];
    }
}
$data['kode_barang'];
if (isset($_POST["input"])) {
    if (delete($kode) > 0) {
        echo "<script> alert('Data berhasil dihapus!'); </script>";
        echo  '<script>window.location="daftar.php";</script>';
    } else {
        echo "<script> alert('Data tidak berhasil dihapus!'); </script>";
    }
} else if (isset($_POST['batal'])) {
    echo  '<script>window.location="daftar.php";</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="input.css" type="text/css" />
    <title>Tambah Data Inventaris</title>
</head>


<body>
    <div class="content-body">
        <div class="form-wrapper">
            <form class="bg-white" method="POST">
                <h2 class="text-title">Hapus Data Inventaris</h2>

                <h3 class="text-title">Yakin ingin menghapus <mark><?php echo $tempnama; ?></mark> ?</h3>

                <div class="field-group">
                    <div class=" flex">
                        <input style="background-color: #71BC68;" class="btn-submit" type="submit" name="input" value="Simpan" />
                        <input class="btn-submit" type="submit" name="batal" value="Batal" />
                    </div>
                </div>

        </div>
        </form>
    </div>
    </div>
</body>

</html>