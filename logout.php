<?php 
// Memanggil file initialize.php untuk menginisialisasi aplikasi
require_once 'include/initialize.php';

// Memulai atau melanjutkan sesi yang ada
@session_start();

// Menghapus variabel sesi 'APPLICANTID' dan 'USERNAME' untuk logout
unset($_SESSION['APPLICANTID']);
unset($_SESSION['USERNAME']);    

// Mengarahkan pengguna kembali ke halaman utama setelah logout
redirect(web_root."index.php");
?>
