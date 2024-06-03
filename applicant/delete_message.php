<?php
require_once ("../include/initialize.php");

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['APPLICANTID'])) {
    redirect(web_root."index.php");
}

// Periksa apakah formulir telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Hapus pesan dari database
    $sql = "DELETE FROM `tblfeedback` WHERE `REGISTRATIONID`='{$id}'";
    $mydb->setQuery($sql);

    if ($mydb->executeQuery()) {
        // Redirect ke halaman pesan dengan pesan sukses
        message("Pesan berhasil dihapus.", "success");
        redirect("index.php?view=message");
    } else {
        // Redirect ke halaman pesan dengan pesan error
        message("Gagal menghapus pesan.", "error");
        redirect("index.php?view=message");
    }
} else {
    // Redirect ke halaman pesan jika diakses langsung
    redirect("index.php?view=message");
}
?>
