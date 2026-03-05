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
    <link href="../assets_admin/img/ZakatNowAdmin.png" rel="icon">
    <!-- Custom fonts for this template -->
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
            <li class="nav-item">
                <a class="nav-link" href="tambah.php">
                    <i class="fa-regular fa-square-plus"></i>
                    <span>Tambah Data</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
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

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin Zakat</h1>                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mx-auto">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" id="color-text">Laporan Real-Time Penerimaan Zakat 2026</h6>
                        </div>
                        <div class="card-body">
                                <table class="table table-bordered table-hover table-lg" id="dataTable" width="100%" cellspacing="0" style="white-space:nowrap;">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary text-nowrap" style="min-width: 50px;">No.</th>
                                            <th class="text-secondary text-nowrap" style="min-width: 150px;">Nama</th>
                                            <th class="text-secondary text-nowrap" style="min-width: 120px;">Jenis Zakat</th>
                                            <th class="text-secondary text-nowrap text-end" style="min-width: 120px;">Jumlah Uang</th>
                                            <th class="text-secondary text-nowrap text-end" style="min-width: 120px;">Jumlah Beras</th>
                                            <th class="text-secondary text-nowrap" style="min-width: 100px;">Metode</th>
                                            <th class="text-secondary text-nowrap" style="min-width: 100px;">Tanggal</th>
                                            <th class="text-secondary text-nowrap" style="min-width: 200px;">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-secondary text-nowrap" style="min-width: 50px;">Nomor</th>
                                            <th class="text-secondary text-nowrap" style="min-width: 150px;"><?php 
                                            $query = mysqli_query($koneksi, "SELECT COUNT(nama_pemberi) AS total_pemberi_zakat FROM tbl_zakat;");
                                            echo mysqli_fetch_assoc($query)['total_pemberi_zakat'] . " Orang";
                                            ?>
                                            </th>
                                            <th class="text-secondary text-nowrap" style="min-width: 120px;">Jenis Zakat</th>
                                            <th class="text-secondary text-nowrap text-end" style="min-width: 120px;"><?php
                                            $query = mysqli_query($koneksi, "SELECT SUM(jumlah_uang) as total_uang from tbl_zakat"); $total_uang = mysqli_fetch_assoc($query);
                                            echo "Rp " . number_format($total_uang['total_uang'], 0, ',', '.');
                                            ?>
                                            </th>
                                            <th class="text-secondary text-nowrap text-end" style="min-width: 120px;"><?php
                                            $query = mysqli_query($koneksi, "SELECT SUM(jumlah_beras) as total_beras from tbl_zakat"); $total_beras = mysqli_fetch_assoc($query);
                                            echo number_format($total_beras['total_beras'], 0, ',', '.') . " kg";
                                            ?></th>
                                            <th class="text-secondary text-nowrap" style="min-width: 100px;">Metode</th>
                                            <th class="text-secondary text-nowrap" style="min-width: 100px;">Tanggal</th>
                                            <th class="text-secondary text-nowrap" style="min-width: 200px;">Keterangan</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM `tbl_zakat`");
                foreach ($query as $data): ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama_pemberi']?></td>
                                            <td><?= $data['jenis_zakat']?></td>
                                            <td class="text-end">Rp <?= number_format($data['jumlah_uang'], 0, ',', '.')?></td>
                                            <td class="text-end"><?= $data['jumlah_beras']?> kg</td>
                                            <td><?= $data['metode']?></td>
                                            <td><?= $data['tanggal']?></td>
                                            <td class="text-nowrap"><?= $data['keterangan']?></td>
                                        </tr>
                        <?php endforeach ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2026 <b>Hanif El Hakim</b></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            
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