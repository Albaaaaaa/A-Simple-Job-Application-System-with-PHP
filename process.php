<?php  
// Memanggil file initialize.php untuk menginisialisasi aplikasi
require_once ("include/initialize.php");

// Menentukan tindakan yang akan dilakukan berdasarkan parameter 'action' yang diterima
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

// Melakukan pemilihan tindakan berdasarkan nilai dari parameter 'action'
switch ($action) {
	case 'submitapplication' :
		// Jika 'action' adalah 'submitapplication', panggil fungsi doSubmitApplication()
		doSubmitApplication();
		break;
  
	case 'register' :
		// Jika 'action' adalah 'register', panggil fungsi doRegister()
		doRegister();
		break;  

	case 'login' :
		// Jika 'action' adalah 'login', panggil fungsi doLogin()
		doLogin();
		break; 
}

// Fungsi untuk menangani pengajuan aplikasi
function doSubmitApplication() { 
	global $mydb;   
	$jobid  = $_GET['JOBID'];

	// Mendapatkan nomor otomatis untuk 'APPLICANTID' dan 'FILEID'
	$autonum = New Autonumber();
	$applicantid = $autonum->set_autonumber('APPLICANT');
	$fileid = $autonum->set_autonumber('FILEID');

	// Upload gambar dan mendapatkan lokasinya
// Unggah gambar dan dapatkan namanya
$picture = UploadImage();

// Tentukan lokasi di mana gambar akan disimpan
$location = "photos/" . $picture;

// Periksa apakah gambar kosong
if ($picture == "") {
    // Redirect ke halaman tertentu jika gambar kosong
    redirect(web_root . "index.php?q=apply&job=" . $jobid . "&view=personalinfo");
} else {
    // Jika gambar diunggah dan pengguna sudah masuk
    if (isset($_SESSION['APPLICANTID'])) {
        // Masukkan informasi tentang file yang diunggah ke dalam database
        $sql = "INSERT INTO `tblattachmentfile` (FILEID,`USERATTACHMENTID`, `FILE_NAME`, `FILE_LOCATION`, `JOBID`) 
                VALUES ('" . date('Y') . $fileid->AUTO . "','{$_SESSION['APPLICANTID']}','Resume','{$location}','{$jobid}')";
        $mydb->setQuery($sql);
        $res = $mydb->executeQuery();
        
        // Lakukan operasi update dengan jobid dan fileid
        doUpdate($jobid, $fileid->AUTO);
    } else {
        // Jika pengguna tidak masuk
        // Masukkan informasi tentang file yang diunggah ke dalam database
        $sql = "INSERT INTO `tblattachmentfile` (FILEID,`USERATTACHMENTID`, `FILE_NAME`, `FILE_LOCATION`, `JOBID`) 
                VALUES ('" . date('Y') . $fileid->AUTO . "','" . date('Y') . $applicantid->AUTO . "','Resume','{$location}','{$jobid}')";
        $mydb->setQuery($sql);
        $res = $mydb->executeQuery();
        
        // Lakukan operasi insert dengan jobid dan fileid
        doInsert($jobid, $fileid->AUTO);
        
        // Perbarui nomor otomatis untuk tabel APPLICANT
        $autonum = New Autonumber();
        $autonum->auto_update('APPLICANT');
    }
}

// Perbarui nomor otomatis untuk tabel FILEID
$autonum = New Autonumber();
$autonum->auto_update('FILEID');
}




// Fungsi untuk menangani penambahan data aplikasi
function doInsert($jobid=0,$fileid=0) {
    // Periksa apakah tombol submit telah ditekan
    if (isset($_POST['submit'])) {  
        global $mydb; 
        
        // Hitung usia berdasarkan tanggal lahir yang diinput
        $birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
        $age = date_diff(date_create($birthdate),date_create('today'))->y;
        
        // Periksa apakah usia kurang dari 20 tahun
        if ($age < 20){
            // Jika usia kurang dari 20 tahun, tampilkan pesan kesalahan dan redirect kembali ke halaman pengisian data personal
            message("usia tidak valid. Usia 20 tahun ke atas diperbolehkan.", "error");
            redirect("index.php?q=apply&view=personalinfo&job=".$jobid);
        } else {
            // Jika usia 20 tahun ke atas, lanjutkan dengan memasukkan data aplikasi ke dalam database
            
            // Mendapatkan nomor otomatis untuk APPLICANT
            $autonum = New Autonumber();
            $auto = $autonum->set_autonumber('APPLICANT');
            
            // Membuat objek Applicants dan mengisi propertinya
            $applicant = New Applicants();
            $applicant->APPLICANTID = date('Y').$auto->AUTO;
            $applicant->FNAME = $_POST['FNAME'];
            $applicant->LNAME = $_POST['LNAME'];
            $applicant->MNAME = $_POST['MNAME'];
            $applicant->ADDRESS = $_POST['ADDRESS'];
            $applicant->SEX = $_POST['optionsRadios'];
            $applicant->CIVILSTATUS = $_POST['CIVILSTATUS'];
            $applicant->BIRTHDATE = $birthdate;
            $applicant->BIRTHPLACE = $_POST['BIRTHPLACE'];
            $applicant->AGE = $age;
            $applicant->USERNAME = $_POST['USERNAME'];
            $applicant->PASS = sha1($_POST['PASS']);
            $applicant->EMAILADDRESS = $_POST['EMAILADDRESS'];
            $applicant->CONTACTNO = $_POST['TELNO'];
            $applicant->DEGREE = $_POST['DEGREE'];
            
            // Memasukkan data aplikasi ke dalam database
            $applicant->create();
            
            // Memasukkan data registrasi pekerjaan ke dalam database
            $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` AND JOBID = '{$jobid}'" ;
            $mydb->setQuery($sql);
            $result = $mydb->loadSingleResult();
            $jobreg = New JobRegistration(); 
            $jobreg->COMPANYID = $result->COMPANYID;
            $jobreg->JOBID     = $result->JOBID;
            $jobreg->APPLICANTID = date('Y').$auto->AUTO;
            $jobreg->APPLICANT   = $_POST['FNAME'] . ' ' . $_POST['LNAME'];
            $jobreg->REGISTRATIONDATE = date('Y-m-d');
            $jobreg->FILEID = date('Y').$fileid;
            $jobreg->REMARKS = 'Pending';
            $jobreg->DATETIMEAPPROVED = date('Y-m-d H:i');
            $jobreg->create();
            
            // Tampilkan pesan sukses dan redirect ke halaman sukses
            message("Lamaran Anda sudah dikirimkan. Mohon tunggu konfirmasi dari perusahaan jika Anda memenuhi syarat untuk pekerjaan ini.","success");
            redirect("index.php?q=success&job=".$result->JOBID);
        }
    }
}




// Fungsi untuk menangani pembaruan data aplikasi
function doUpdate($jobid=0,$fileid=0) {
    // Periksa apakah tombol submit telah ditekan
    if (isset($_POST['submit'])) {
        global $mydb;   
        
        // Mendapatkan informasi pengguna yang sedang login
        $applicant = New Applicants();
        $appl = $applicant->single_applicant($_SESSION['APPLICANTID']);
        
        // Mendapatkan informasi perusahaan dan pekerjaan yang diajukan
        $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` AND JOBID = '{$jobid}'" ;
        $mydb->setQuery($sql);
        $result = $mydb->loadSingleResult();
        
        // Membuat objek JobRegistration dan mengisi propertinya dengan informasi yang diperoleh
        $jobreg = New JobRegistration(); 
        $jobreg->COMPANYID = $result->COMPANYID;
        $jobreg->JOBID     = $result->JOBID;
        $jobreg->APPLICANTID = $appl->APPLICANTID;
        $jobreg->APPLICANT   = $appl->FNAME . ' ' . $appl->LNAME;
        $jobreg->REGISTRATIONDATE = date('Y-m-d');
        $jobreg->FILEID = date('Y').$fileid;
        $jobreg->REMARKS = 'Pending';
        $jobreg->DATETIMEAPPROVED = date('Y-m-d H:i');
        
        // Memasukkan data registrasi pekerjaan ke dalam database
        $jobreg->create();
        
        // Tampilkan pesan sukses dan redirect ke halaman sukses
        message("Lamaran Anda sudah dikirimkan. Mohon tunggu konfirmasi dari perusahaan jika Anda memenuhi syarat untuk pekerjaan ini.","success");
        redirect("index.php?q=success&job=".$result->JOBID);
    }
}




// Fungsi untuk melakukan pendaftaran
function doRegister(){
    global $mydb;
    // Periksa apakah tombol Register telah ditekan
    if (isset($_POST['btnRegister'])) { 
        // Hitung usia berdasarkan tanggal lahir yang diinput
        $birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
        $age = date_diff(date_create($birthdate),date_create('today'))->y;
        
        // Periksa apakah usia kurang dari 20 tahun
        if ($age < 20){
            // Jika usia kurang dari 20 tahun, tampilkan pesan kesalahan dan redirect kembali ke halaman pendaftaran
            message("usia tidak valid. Usia 20 tahun ke atas diperbolehkan.", "error");
            redirect("index.php?q=register");
        } else {
            // Jika usia 20 tahun ke atas, lanjutkan dengan proses pendaftaran
            
            // Mendapatkan nomor otomatis untuk APPLICANT
            $autonum = New Autonumber();
            $auto = $autonum->set_autonumber('APPLICANT');
            
            // Membuat objek Applicants dan mengisi propertinya dengan data yang diperoleh dari formulir pendaftaran
            $applicant = New Applicants();
            $applicant->APPLICANTID = date('Y').$auto->AUTO;
            $applicant->FNAME = $_POST['FNAME'];
            $applicant->LNAME = $_POST['LNAME'];
            $applicant->MNAME = $_POST['MNAME'];
            $applicant->ADDRESS = $_POST['ADDRESS'];
            $applicant->SEX = $_POST['optionsRadios'];
            $applicant->CIVILSTATUS = $_POST['CIVILSTATUS'];
            $applicant->BIRTHDATE = $birthdate;
            $applicant->BIRTHPLACE = $_POST['BIRTHPLACE'];
            $applicant->AGE = $age;
            $applicant->USERNAME = $_POST['USERNAME'];
            $applicant->PASS = sha1($_POST['PASS']);
            $applicant->EMAILADDRESS = $_POST['EMAILADDRESS'];
            $applicant->CONTACTNO = $_POST['TELNO'];
            $applicant->DEGREE = $_POST['DEGREE'];
            
            // Memasukkan data pengguna baru ke dalam database
            $applicant->create();
            
            // Memperbarui nomor otomatis untuk APPLICANT
            $autonum = New Autonumber();
            $autonum->auto_update('APPLICANT');
            
            // Tampilkan pesan sukses dan redirect ke halaman sukses
            message("Anda telah berhasil terdaftar. Anda dapat login sekarang!","success");
            redirect("index.php?q=success");
        }
    }
}




// Fungsi untuk melakukan login
function doLogin(){
    // Mengambil data email dan password yang dikirimkan melalui formulir login
    $email = trim($_POST['USERNAME']);
    $upass  = trim($_POST['PASS']);
    $h_upass = sha1($upass); // Melakukan hash terhadap password
    
    // Membuat objek Applicants dan memanggil metode applicantAuthentication untuk memeriksa kredensial login
    $applicant = new Applicants();
    $res = $applicant->applicantAuthentication($email, $h_upass);
    
    // Jika kredensial benar, arahkan pengguna ke halaman aplikasi dan tampilkan pesan sukses
    if ($res == true) { 
        message("Anda sekarang berhasil login!","success");
        redirect(web_root."applicant/");
    } else {
        // Jika kredensial salah, tampilkan pesan kesalahan
        echo "akun tidak ada! Silakan Mendaftar Terlebih Dahulu."; 
    } 
}





// Fungsi untuk mengunggah gambar
function UploadImage($jobid=0){
    // Tentukan direktori tempat file akan disimpan
    $target_dir = "applicant/photos/";
    
    // Tentukan nama file target dengan menambahkan tanggal dan waktu saat ini ke nama file yang diunggah
    $target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
    
    // Inisialisasi variabel untuk status upload dan jenis file gambar
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Periksa apakah jenis file yang diunggah adalah gambar
    if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "gif" ) {
        // Pindahkan file yang diunggah ke lokasi target jika jenis file adalah gambar yang didukung
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
            // Kembalikan nama file yang diunggah
            return  date("dmYhis") . basename($_FILES["picture"]["name"]);
        } else {
            // Tampilkan pesan kesalahan jika terjadi kesalahan saat mengunggah file
            message("Error Unggah File","error");
        }
    } else {
        // Tampilkan pesan kesalahan jika jenis file yang diunggah bukan gambar
        message("File tidak Mendukung","error");
    }
} 

?>
