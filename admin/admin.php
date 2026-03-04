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

    <!-- Custom styles for this page -->
    <link href="../assets_admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
include 'sidebar.php';
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <a href="tambah.php" class="btn btn-primary my-2">Tambahkan Data Zakat</a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Laporan Real-Time Penerimaan Zakat 2026</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary">Nomor</th>
                                            <th class="text-secondary">Nama</th>
                                            <th class="text-secondary">Jenis Zakat</th>
                                            <th class="text-secondary">Jumlah Uang</th>
                                            <th class="text-secondary">Jumlah Beras</th>
                                            <th class="text-secondary">Metode</th>
                                            <th class="text-secondary">Tanggal</th>
                                            <th class="text-secondary">Keterangan</th>
                                            <th class="text-secondary">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-secondary">Nomor</th>
                                            <th class="text-secondary">Nama</th>
                                            <th class="text-secondary">Jenis Zakat</th>
                                            <th class="text-secondary"><?php
                                            $query = mysqli_query($koneksi, "SELECT SUM(jumlah_uang) as total_uang from tbl_zakat"); $total_uang = mysqli_fetch_assoc($query);
                                            echo "Rp " . number_format($total_uang['total_uang'], 0, ',', '.');
                                            ?>
                                            </th>
                                            <th class="text-secondary"><?php
                                            $query = mysqli_query($koneksi, "SELECT SUM(jumlah_beras) as total_beras from tbl_zakat"); $total_beras = mysqli_fetch_assoc($query);
                                            echo number_format($total_beras['total_beras'], 0, ',', '.') . " kg";
                                            ?></th>
                                            <th class="text-secondary">Metode</th>
                                            <th class="text-secondary">Tanggal</th>
                                            <th class="text-secondary">Keterangan</th>
                                            <th class="text-secondary">Aksi</th>
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
                                            <td>Rp <?= number_format($data['jumlah_uang'], 0, ',', '.')?></td>
                                            <td><?= $data['jumlah_beras']?> kg</td>
                                            <td><?= $data['metode']?></td>
                                            <td><?= $data['tanggal']?></td>
                                            <td><?= $data['keterangan']?></td>
                                            <td>
                                                <a href="edit.php?id=<?= $data['id_zakat']; ?>" class="btn btn-primary align-middle">Ubah</a>
                                                <a href="hapus.php?id=<?= $data['id_zakat']; ?>" class="btn btn-danger align-middle">Hapus</a>
                                            </td>
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
                        <span>Copyright &copy; ZakatNow 2026</span>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>