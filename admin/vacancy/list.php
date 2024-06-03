<?php 
	  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Daftar Lowongan Kerja  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Tambah Lowongan </a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>

				  		<!-- <th>No.</th> -->
				  		<th>Nama Perusahaan</th> 
				  		<th>Judul Pekerjaan</th> 
				  		<th>Jumlah Karyawan yang dibutuhkan</th> 
				  		<th>Gaji</th> 
				  		<th>Durasi Pekerjaan</th> 
				  		<th>Kualifikasi/Pengalaman Kerja</th> 
				  		<th>Deskripsi Pekerjaan</th> 
				  		<th>Jenis Kelamin </th> 
				  		<th>Sektor Lowongan Kerja</th> 
				  		<th>Status Pekerjaan</th> 
				  		 <th width="10%" align="center">Action</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tbljob` j, `tblcompany` c WHERE j.COMPANYID=c.COMPANYID");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				  			echo '<td>' . $result->COMPANYNAME.'</td>';
				  			echo '<td>' . $result->OCCUPATIONTITLE.'</td>';
				  			echo '<td>' . $result->REQ_NO_EMPLOYEES.'</td>';
				  			echo '<td>' . $result->SALARIES.'</td>';
				  			echo '<td>' . $result->DURATION_EMPLOYEMENT.'</td>';
				  			echo '<td>' . $result->QUALIFICATION_WORKEXPERIENCE.'</td>';
				  			echo '<td>' . $result->JOBDESCRIPTION.'</td>';
				  			echo '<td>' . $result->PREFEREDSEX.'</td>';
				  			echo '<td>' . $result->SECTOR_VACANCY.'</td>';
				  			echo '<td>' . $result->JOBSTATUS.'</td>';
				  		echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->JOBID.'" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->JOBID.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
						<div class="btn-group">
					<?php
					if($_SESSION['ADMIN_ROLE']=='Administrator'){
					; }?>
				</div>
			
			
				</form>
	
 <div class="table-responsive">	 