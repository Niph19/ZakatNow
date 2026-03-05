<?php
include '../config.php';
// ambil id dari URL
$id = $_GET['id'] ?? null;

// Proses Delete
mysqli_query($koneksi, "DELETE FROM tbl_zakat WHERE id_zakat='$id'");

// Kembali ke Page Siswa
header("location: index.php");
?>