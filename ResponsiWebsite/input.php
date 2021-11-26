<?php
session_start();
error_reporting(0);
include 'functions.php';
// kode-barang, nama-barang, jumlah, satuan, tanggal, kategori, status, harga
if (isset($_POST["input"])) {
    if (inputData($_POST) > 0) {
        echo "<script> alert('Item berhasil ditambahkan!'); </script>";
    } else {
        echo "<script> alert('Gagal menambahkan Item!'); </script>";
        echo mysqli_error($conn);
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
                <h1 class="text-title">Tambah Data Inventaris</h1>
                <div class="field-group">
                    <div class=" flex">
                        <label class="label" for="kode-barang">Kode Barang</label>
                        <input class="input" type="text" id="kode-barang" name="kode-barang" placeholder="Kode Barang" required />
                    </div>
                </div>

                <div class="field-group">
                    <div class=" flex">
                        <label class="label" for="nama-barang">Nama Barang</label>
                        <input class=" input" type="text" id="nama-barang" name="nama-barang" placeholder="Nama Barang" required />
                    </div>
                </div>
                <div class="field-group">
                    <div class=" flex">
                        <label class="label" for="jumlah">Jumlah</label>
                        <input class=" input" type="number" id="jumlah" name="jumlah" placeholder="Jumlah" required />
                    </div>
                </div>
                <div class="field-group">
                    <div class=" flex">
                        <label class="label" for="satuan">Satuan</label>
                        <input class=" input" type="text" id="satuan" name="satuan" placeholder="Satuan" required />
                    </div>
                </div>
                <div class="field-group">
                    <div class=" flex">
                        <label class="label" for="tanggal">Tanggal Datang</label>
                        <input class=" input" type="date" id="tanggal" name="tanggal" required />
                    </div>
                </div>
                <div class="field-group">
                    <div class=" flex">
                        <label class="label" for="txt-kategori">Kategori</label>
                        <select class="input" id="txt-kategori" name="kategori" required>
                            <option disabled selected value>
                                -- Pilih Kategori --
                            </option>
                            <option value="Bangunan">
                                Bangunan
                            </option>
                            <option value="Kendaraan">
                                Kendaraan
                            </option>
                            <option value="Alat Tulis Kantor">
                                Alat Tulis Kantor
                            </option>
                            <option value="Elektronik">
                                Elektronik
                            </option>
                        </select>
                    </div>
                </div>
                <div class="field-group">
                    <div class=" flex">
                        <label class="label">Status</label>
                        <input type="radio" id="Baik" name="status" value="Baik" />
                        <label class="label" for="Baik">Baik</label>
                        <input type="radio" id="Perawatan" name="status" value="Perawatan" />
                        <label class="label" for="Perawatan">Perawatan</label>
                        <input type="radio" id="Rusak" name="status" value="Rusak" />
                        <label class="label" for="Rusak">Rusak</label>
                    </div>
                </div>
                <div class="field-group">
                    <div class=" flex">
                        <label class="label" for="harga">Harga Satuan</label>
                        <input class="input" type="number" id="harga" name="harga" placeholder="Harga Satuan" required />
                    </div>
                </div>

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