<?php 
// Memanggil file initialize.php yang berisi konfigurasi dasar
require_once("include/initialize.php"); 

// Menginisialisasi variabel $content dengan nilai default 'home.php'
$content='home.php';

// Memeriksa apakah parameter 'q' ada dan tidak kosong dalam URL
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';

// Melakukan pemilihan berdasarkan nilai variabel $view
switch ($view) { 
	case 'apply' :
        // Jika $view adalah 'apply', maka set judul halaman dan content-nya ke halaman aplikasi pelamar
		$title="Pengajuan Pelamar";	
		$content='applicationform.php';		
		break;
	case 'login' : 
        // Jika $view adalah 'login', maka set judul halaman dan content-nya ke halaman login
		$title="Login";	
		$content='login.php';		
		break;
	case 'company' :
        // Jika $view adalah 'company', maka set judul halaman dan content-nya ke halaman perusahaan
		$title="Perusahaan";	
		$content='company.php';		
		break;
	case 'hiring' :
		// Jika $view adalah 'hiring', maka set judul halaman berdasarkan parameter 'search' jika ada, jika tidak, set judul ke "Rekrut Sekarang"
		$title = isset($_GET['search']) ? 'Hiring in '.$_GET['search'] :"Rekrut Sekarang"; 
		$content='hirring.php';		
		break;		
	case 'category' :
        // Jika $view adalah 'category', maka set judul halaman berdasarkan parameter 'search'
		$title='Lowongan Untuk '. $_GET['search'];	
		$content='category.php';		
		break;
	case 'viewjob' :
        // Jika $view adalah 'viewjob', maka set judul halaman dan content-nya ke halaman detail pekerjaan
		$title="Detail Pekerjaan";	
		$content='viewjob.php';		
		break;
	case 'success' :
        // Jika $view adalah 'success', maka set judul halaman dan content-nya ke halaman sukses
		$title="Sukses";	
		$content='success.php';		
		break;
	case 'register' :
        // Jika $view adalah 'register', maka set judul halaman dan content-nya ke halaman pendaftaran
		$title="Pendaftaran";	
		$content='register.php';		
		break;
	case 'Contact' :
        // Jika $view adalah 'Contact', maka set judul halaman dan content-nya ke halaman kontak
		$title='Kontak Kami';	
		$content='Contact.php';		
		break;	
	case 'About' :
        // Jika $view adalah 'About', maka set judul halaman dan content-nya ke halaman tentang projek
		$title='Tentang Projek';	
		$content='About.php';		
		break;	
	case 'advancesearch' :
        // Jika $view adalah 'advancesearch', maka set judul halaman dan content-nya ke halaman pencarian lanjutan
		$title='Pencarian Lanjutan';	
		$content='advancesearch.php';		
		break;	

	case 'result' :
        // Jika $view adalah 'result', maka set judul halaman dan content-nya ke halaman hasil pencarian lanjutan
		$title='Pencarian Lanjutan';	
		$content='advancesearchresult.php';		
		break;
	case 'search-company' :
        // Jika $view adalah 'search-company', maka set judul halaman dan content-nya ke halaman pencarian berdasarkan perusahaan
		$title='Pencarian Perusahaan';	
		$content='searchbycompany.php';		
		break;	
	case 'search-function' :
        // Jika $view adalah 'search-function', maka set judul halaman dan content-nya ke halaman pencarian berdasarkan fungsi
		$title='Pencarian Fungsi';	
		$content='searchbyfunction.php';		
		break;	
	case 'search-jobtitle' :
        // Jika $view adalah 'search-jobtitle', maka set judul halaman dan content-nya ke halaman pencarian berdasarkan judul pekerjaan
		$title='Pencarian Judul';	
		$content='searchbytitle.php';		
		break;						
	default :
	    // Jika $view tidak sesuai dengan kondisi di atas, maka set halaman aktif ke halaman utama
	    // dan set judul halaman dan content-nya ke halaman utama
	    $active_home='active';
	    $title="Home";	
		$content ='home.php';		
}

// Memanggil file templates.php untuk menampilkan halaman dengan judul dan content yang telah diatur
require_once("theme/templates.php");
?>
