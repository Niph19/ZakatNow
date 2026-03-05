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

    <title>Tambah Data – ZakatNow</title>
    <link href="../assets_admin/img/ZakatNowAdmin.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="../assets_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
            <link href="../assets_admin/css/color.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets_admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets_admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../assets_admin/css/tambah.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav text-light sidebar sidebar-dark accordion" id="color-asli">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-star-and-crescent"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ZakatNow</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fa-solid fa-chart-bar"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tambahan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="tambah.php">
                    <i class="fa-regular fa-square-plus"></i>
                    <span>Tambah Data</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel Data</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <div class="container">
                            <h3 class="fw-bolder mb-3">Tambah Data Zakat</h3>
                            <form method="POST">
                                <label for="nama_pemberi">Nama Pemberi</label>
                                <input type="text" id="nama_pemberi" name="nama_pemberi" placeholder="Nama Pemberi"
                                    required>

                                <label for="jenis_zakat">Jenis Zakat</label><br>
                                <select id="jenis_zakat" name="jenis" required>
                                    <option>Zakat Mal</option>
                                    <option>Zakat Fitrah</option>
                                </select><br>

                                <label for="jumlah_uang">Jumlah Uang</label><br>
                                <input type="number" name="jumlah_uang"
                                    placeholder="Jumlah Nominal Uang (Kosongkan Jika Memilih Zakat Fitrah)" required>
                                <br>

                                <label for="jumlah_beras">Jumlah beras</label><br>
                                <input type="number" name="jumlah_beras"
                                    placeholder="Jumlah Berat Beras (Kosongkan Jika Memilih Zakat Mal)" required>
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
                                <input type="text" id="keterangan" name="keterangan" placeholder="Keterangan jika ada"
                                    required>
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
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- End of Footer -->
                
            </div>
            <!-- End of Content Wrapper -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ZakatNow 2026</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


</body>

</html>