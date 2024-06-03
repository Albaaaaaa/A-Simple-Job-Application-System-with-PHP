
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


		if ( $_POST['CATEGORY'] == "" ) {
			$messageStats = false;
			message("Semua harus diisi!","error");
			redirect('index.php?view=add');
		}else{	
			$category = New Category();
			$category->CATEGORY	= $_POST['CATEGORY'];
			$category->create();

			message("Kategori[". $_POST['CATEGORY'] ."] berhasil dibuat!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){

			$category = New Category();
			$category->CATEGORY	= $_POST['CATEGORY'];
			$category->update($_POST['CATEGORYID']);

			message("[". $_POST['CATEGORY'] ."] telah diperbarui!", "success");
			redirect("index.php");
		}

	}


	function doDelete(){

			$id = $_GET['id'];

			$category = New Category();
			$category->delete($id);

			message("Kategori Telah Berhasil dihapus!","info");
			redirect('index.php');
		
	}
?>