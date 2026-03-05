<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>ZakatNow</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/fav_zakat.png" rel="icon">
    <link href="assets/img/fav_zakat.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets_admin/css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="index-page">

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center gy-5">

                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="hero-content">
                            <div class="hero-tag" data-aos="fade-up" data-aos-delay="250">
                                <span class="tag-dot"></span>
                                <span class="tag-text">ZakatNow</span>
                            </div>

                            <h1 class="hero-headline" data-aos="fade-up" data-aos-delay="300">Penerimaan Zakat Masjid
                                Riyadhus Shalihin 2026</h1>

                            <p class="hero-text" data-aos="fade-up" data-aos-delay="350">Zakat adalah bukti kepedulian
                                untuk menguatkan sesama. Bersama Masjid Riyadhus Shalihin, zakat Anda dikelola secara
                                amanah dan disalurkan tepat sasaran. Mari tunaikan kewajiban, bangun umat yang lebih
                                berdaya.</p>

                            <div class="hero-cta" data-aos="fade-up" data-aos-delay="400">
                                <a href="#services" class="cta-button">
                                    <span>Tunaikan Zakat</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">                        
                        <div class="about-images-wrapper">
                            <div class="image-main">
                                <img id="img-hero" src="assets/img/zakat/juan-camilo-guarin-p-njEXjDmYn8w-unsplash.jpg" class="img-fluid">
                            </div>
                        </div>
                        <div class="stats-grid">
                            <div class="stat-card stat-card-primary" data-aos="zoom-in" data-aos-delay="350">
                                <div class="stat-icon-wrap">
                                    <i class="fa-solid fa-rupiah-sign"></i>
                                </div>
                                <div class="stat-info">
                                    <span class="stat-value" id="font_stat_title"><?php
                                            $query = mysqli_query($koneksi, "SELECT SUM(jumlah_uang) as total_uang from tbl_zakat"); $total_uang = mysqli_fetch_assoc($query);
                                            echo "Rp " . number_format($total_uang['total_uang'], 0, ',', '.');
                                            ?></span>
                                    <span class="stat-title" id="font_stat_value">Total Zakat Mal Terkelola</span>
                                </div>
                            </div>

                            <div class="stat-card" data-aos="zoom-in" data-aos-delay="400">
                                <div class="stat-icon-wrap">
                                    <i class="fa-solid fa-bowl-rice"></i>
                                </div>
                                <div class="stat-info">
                                    <span class="stat-value" id="font_stat_title"><?php
                                            $query = mysqli_query($koneksi, "SELECT SUM(jumlah_beras) as total_beras from tbl_zakat"); $total_beras = mysqli_fetch_assoc($query);
                                            echo number_format($total_beras['total_beras'], 0, ',', '.') . " kg";
                                            ?></span>
                                    <span class="stat-title" id="font_stat_value">Paket Beras Fitrah</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        </section><!-- /Hero Section -->

        <!-- DataTales Example -->
                    <div id="table" class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Laporan Real-Time Penerimaan Zakat 2026</h6>
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
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-secondary">Nomor</th>
                                            <th class="text-secondary"><?php 
                                            $query = mysqli_query($koneksi, "SELECT COUNT(nama_pemberi) AS total_pemberi_zakat FROM tbl_zakat;");
                                            echo mysqli_fetch_assoc($query)['total_pemberi_zakat'] . " Orang";
                                            ?></th>
                                            <th class="text-secondary">Jenis Zakat</th>
                                            <th class="text-secondary"><?php
                                            $query = mysqli_query($koneksi, "SELECT SUM(jumlah_uang) as total_uang from tbl_zakat"); $total_uang = mysqli_fetch_assoc($query);
                                            echo "Rp " . number_format($total_uang['total_uang'], 0, ',', '.');
                                            ?></th>
                                            <th class="text-secondary"><?php
                                            $query = mysqli_query($koneksi, "SELECT SUM(jumlah_beras) as total_beras from tbl_zakat"); $total_beras = mysqli_fetch_assoc($query);
                                            echo number_format($total_beras['total_beras'], 0, ',', '.') . " kg";
                                            ?></th>
                                            <th class="text-secondary">Metode</th>
                                            <th class="text-secondary">Tanggal</th>
                                            <th class="text-secondary">Keterangan</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM `tbl_zakat`");
                foreach ($query as $dataTabel): ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $dataTabel['nama_pemberi']?></td>
                                            <td><?= $dataTabel['jenis_zakat']?></td>
                                            <td>Rp <?= number_format($dataTabel['jumlah_uang'], 0, ',', '.')?></td>
                                            <td><?= $dataTabel['jumlah_beras']?> kg</td>
                                            <td><?= $dataTabel['metode']?></td>
                                            <td><?= $dataTabel['tanggal']?></td>
                                            <td><?= $dataTabel['keterangan']?></td>
                                        </tr>
                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



    </main>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>