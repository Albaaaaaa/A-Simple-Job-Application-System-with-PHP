
<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){

		if ( $_POST['COMPANYID'] == "None") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$job = New Jobs();
			$job->COMPANYID							= $_POST['COMPANYID']; 
			$job->CATEGORY							= $_POST['CATEGORY']; 
			$job->OCCUPATIONTITLE					= $_POST['OCCUPATIONTITLE'];
			$job->REQ_NO_EMPLOYEES					= $_POST['REQ_NO_EMPLOYEES'];
			$job->SALARIES							= $_POST['SALARIES'];
			$job->DURATION_EMPLOYEMENT				= $_POST['DURATION_EMPLOYEMENT'];
			$job->QUALIFICATION_WORKEXPERIENCE		= $_POST['QUALIFICATION_WORKEXPERIENCE'];
			$job->JOBDESCRIPTION					= $_POST['JOBDESCRIPTION'];
			$job->PREFEREDSEX						= $_POST['PREFEREDSEX'];
			$job->SECTOR_VACANCY					= $_POST['SECTOR_VACANCY']; 
			$job->DATEPOSTED						= date('Y-m-d H:i');
			$job->create();

			message("Lowongan Kerja Baru berhasil dibuat!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){
			if ( $_POST['COMPANYID'] == "None") {
				$messageStats = false;
				message("Semua harus diisi!","error");
				redirect('index.php?view=add');
			}else{	
				$job = New Jobs();
				$job->COMPANYID							= $_POST['COMPANYID']; 
				$job->CATEGORY							= $_POST['CATEGORY']; 
				$job->OCCUPATIONTITLE					= $_POST['OCCUPATIONTITLE'];
				$job->REQ_NO_EMPLOYEES					= $_POST['REQ_NO_EMPLOYEES'];
				$job->SALARIES							= $_POST['SALARIES'];
				$job->DURATION_EMPLOYEMENT				= $_POST['DURATION_EMPLOYEMENT'];
				$job->QUALIFICATION_WORKEXPERIENCE		= $_POST['QUALIFICATION_WORKEXPERIENCE'];
				$job->JOBDESCRIPTION					= $_POST['JOBDESCRIPTION'];
				$job->PREFEREDSEX						= $_POST['PREFEREDSEX'];
				$job->SECTOR_VACANCY					= $_POST['SECTOR_VACANCY']; 
				$job->update($_POST['JOBID']);

				message("Lowongan Kerja telah diperbarui!", "success");
				redirect("index.php");
			}
		}

	}


	function doDelete(){

			$id = $_GET['id'];

			$job = New Jobs();
			$job->delete($id);

			message("Perusahaan Telah Dihapus!","info");
			redirect('index.php');
		
	}
?>