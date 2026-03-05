<?php
include("../config.php");

// Ambil id dari URL
// Jika di URL ada id, simpan ke var $id
// Jika tidak, isi $id dengan null, jadi $id = null
$id = $_GET["id"] ?? null;

// Ambil data id
if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_zakat WHERE id_zakat = '$id'");
    $datanow = mysqli_fetch_assoc($query);
    // mysqli_fetch_assoc = mengambil 1 baris data hasil dari query
}

// Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nama = $_POST['nama_pemberi'];
            $jenis = $_POST['jenis'];
            $uang = $_POST['jumlah_uang'];
            $beras = $_POST['jumlah_beras'];
            $metode = $_POST['metode'];
            $tanggal = $_POST['tanggal'];
            $keterangan = $_POST['keterangan'];

    $sql = "UPDATE tbl_zakat SET nama_pemberi='$nama', jenis_zakat='$jenis', jumlah_uang='$uang', jumlah_beras='$beras', metode='$metode', tanggal='$tanggal', keterangan='$keterangan' WHERE id_zakat='$id'";

    
    mysqli_query($koneksi, $sql);   
    
    header("Location: index.php");
    exit;
    }

include '../config.php';
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin – ZakatNow</title>
    <link href="../assets_admin/img/ZakatNowAdmin.png" rel="icon">

    <!-- Custom fonts for this template -->
    <link href="../assets_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets_admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets_admin/css/tambah.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets_admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<div class="container mt-5">
        <h3 class="fw-bolder mb-3">Ubah Data Zakat</h3>
        <form method="POST">
            <label for="nama_pemberi">Nama Pemberi</label>
            <input type="text" id="nama_pemberi" name="nama_pemberi" placeholder="Nama Pemberi" value="<?= $datanow['nama_pemberi']?>" required>

            <label for="jenis_zakat">Jenis Zakat</label><br>
            <select id="jenis_zakat" name="jenis" required>
                <option value="Zakat Mal" <?= ($datanow['jenis_zakat'] === 'Zakat Mal') ? 'selected' : '' ?>>Zakat Mal</option>




                <option value="Zakat Fitrah" <?= ($datanow['jenis_zakat'] === 'Zakat Fitrah') ? 'selected' : '' ?>>Zakat Fitrah</option>



            </select><br>

            <label for="jumlah_uang">Jumlah Uang</label><br>
                <input type="number"  name="jumlah_uang" placeholder="Jumlah Nominal Uang (Kosongkan Jika Memilih Zakat Fitrah)" value="<?= $datanow['jumlah_uang']?>"required>
                <br>

            <label for="jumlah_beras">Jumlah beras</label><br>
            <input type="number"  name="jumlah_beras" placeholder="Jumlah Berat Beras (Kosongkan Jika Memilih Zakat Mal)" value="<?= $datanow['jumlah_beras']?>"required>
            <br>

            <label for="metode">Metode</label><br>
            <select id="metode" name="metode" required>
                <option value="Transfer" <?= ($datanow['metode'] === 'Transfer') ? 'selected' : '' ?>>Transfer</option>
                <option value="Langsung" <?= ($datanow['metode'] === 'Langsung') ? 'selected' : '' ?>>Langsung</option>
            </select>
            <br>

            <label for="tanggal">Tanggal</label><br>
            <input type="date" id="tanggal" name="tanggal" value="<?= $datanow['tanggal']?>" required>
            <br>

            <label for="keterangan">Keterangan</label><br>
            <input type="text" id="keterangan" name="keterangan" placeholder="Keterangan jika ada" value="<?= $datanow['keterangan']?>" required>
            <br>

            <input id="submit" type="submit" value="Edit Data">
        </form>