<?php
include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin – ZakatNow</title>

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

<body>

    <?php
    include 'sidebar.php';
    ?>
    <div class="container">
        <h3 class="fw-bolder mb-3">Tambah Data Zakat</h3>
        <form method="POST">
            <label for="nama_pemberi">Nama Pemberi</label>
            <input type="text" id="nama_pemberi" name="nama_pemberi" placeholder="Nama Pemberi" required>

            <label for="jenis_zakat">Jenis Zakat</label><br>
            <select id="jenis_zakat" name="jenis" required>
                <option>Zakat Mal</option>
                <option>Zakat Fitrah</option>
            </select><br>

            <label for="jumlah_uang">Jumlah Uang</label><br>
                <input type="number"  name="jumlah_uang" placeholder="Jumlah Nominal Uang (Kosongkan Jika Memilih Zakat Fitrah)" required>
                <br>

            <label for="jumlah_beras">Jumlah beras</label><br>
            <input type="number"  name="jumlah_beras" placeholder="Jumlah Berat Beras (Kosongkan Jika Memilih Zakat Mal)" required>
            <br>

            <label for="metode">Metode</label><br>
            <select id="metode" name="metode" required>
                <option value="Transfer">Transfer</option>
                <option value="Langsung">Langsung</option>
            </select>
            <br>

            <label for="tanggal">Tanggal</label><br>
            <input type="date" id="tanggal" name="tanggal" required>
            <br>

            <label for="keterangan">Keterangan</label><br>
            <input type="text" id="keterangan" name="keterangan" placeholder="Keterangan jika ada" required>
            <br>

            <input id="submit" type="submit" value="Submit">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nama = $_POST['nama_pemberi'];
            $jenis = $_POST['jenis'];
            $uang = $_POST['jumlah_uang'];
            $beras = $_POST['jumlah_beras'];
            $metode = $_POST['metode'];
            $tanggal = $_POST['tanggal'];
            $keterangan = $_POST['keterangan'];

            $query = "INSERT INTO tbl_zakat(nama_pemberi, jenis_zakat, jumlah_uang, jumlah_beras, metode, tanggal, keterangan) 
                        VALUES ('$nama','$jenis','$uang', '$beras', '$metode', '$tanggal', '$keterangan')";

            if (mysqli_query($koneksi, $query)) {
                echo "<script>
        Swal.fire({
            title: 'Good job!',
            text: 'Data Berhasil Dikirim!',
            icon: 'success'
        }).then(() => {
            window.location.href = 'admin.php';
        });
    </script>";
            }
        }
        ?>
    </div>
</body>

</html>