<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


  $jobid = $_GET['id'];
  $job = New Jobs();
  $res = $job->single_job($jobid);

?> 
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

  <div class="row">
                   <div class="col-lg-12">
                      <h1 class="page-header">Perbarui Lowongan Pekerjaan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                 </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYNAME">Nama Perusahaan:</label>

                      <div class="col-md-8">
                        <input type="hidden" name="JOBID" value="<?php echo $res->JOBID;?>">
                        <select class="form-control input-sm" id="COMPANYID" name="COMPANYID">
                          <option value="None">Pilih</option>
                          <?php 
                            $sql ="Select * From tblcompany WHERE COMPANYID=".$res->COMPANYID;
                            $mydb->setQuery($sql);
                            $result  = $mydb->loadResultList();
                            foreach ($result as $row) {
                              # code...
                              echo '<option SELECTED value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
                            }
                            $sql ="Select * From tblcompany WHERE COMPANYID!=".$res->COMPANYID;
                            $mydb->setQuery($sql);
                            $result  = $mydb->loadResultList();
                            foreach ($result as $row) {
                              # code...
                              echo '<option value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
                            }

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORY">Kategori:</label>

                      <div class="col-md-8"> 
                        <select class="form-control input-sm" id="CATEGORY" name="CATEGORY">
                          <option value="None">Pilih</option>
                          <?php 
                            $sql ="SELECT * FROM `tblcategory` WHERE CATEGORY='".$res->CATEGORY."'";
                            $mydb->setQuery($sql);
                            $cur  = $mydb->loadResultList();
                            foreach ($cur as $result) {
                              # code...
                              echo '<option SELECTED value='.$result->CATEGORY.'>'.$result->CATEGORY.'</option>';
                            }
                            $sql ="SELECT * FROM `tblcategory` WHERE CATEGORY!='".$res->CATEGORY."'";
                            $mydb->setQuery($sql);
                            $cur  = $mydb->loadResultList();
                            foreach ($cur as $result) {
                              # code...
                              echo '<option value='.$result->CATEGORY.'>'.$result->CATEGORY.'</option>';
                            }

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "OCCUPATIONTITLE">Judul Pekerjaan:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="OCCUPATIONTITLE" name="OCCUPATIONTITLE" placeholder="Masukan Judul Pekerjaan"   autocomplete="none" value="<?php echo $res->OCCUPATIONTITLE; ?>"/> 
                      </div>
                    </div>
                  </div>  

                    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "REQ_NO_EMPLOYEES">Jumlah Karyawan yang dibutuhkan:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="REQ_NO_EMPLOYEES" name="REQ_NO_EMPLOYEES" placeholder="Masukan Jumlah Karyawan "   autocomplete="none" value="<?php echo $res->REQ_NO_EMPLOYEES ?>"/> 
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SALARIES">Gaji:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="SALARIES" name="SALARIES" placeholder="Masukan Jumlah Gaji"   autocomplete="none" value="<?php echo $res->SALARIES ?>"/> 
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DURATION_EMPLOYEMENT">Masa Kerja:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="DURATION_EMPLOYEMENT" name="DURATION_EMPLOYEMENT" placeholder="Masukan Masa Kerja"   autocomplete="none" value="<?php echo $res->DURATION_EMPLOYEMENT ?>"/> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "QUALIFICATION_WORKEXPERIENCE">Kualifikasi/Pengalaman Kerja:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="QUALIFICATION_WORKEXPERIENCE" name="QUALIFICATION_WORKEXPERIENCE" placeholder="Masukan Kualifikasi/Pengalaman Kerja"   autocomplete="none" ><?php echo $res->QUALIFICATION_WORKEXPERIENCE ?></textarea> 
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "JOBDESCRIPTION">Deskripsi Pekerjaan</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="JOBDESCRIPTION" name="JOBDESCRIPTION" placeholder="Masukan Deskripsi Pekerjaan"   autocomplete="none"><?php echo $res->JOBDESCRIPTION ?></textarea> 
                      </div>
                    </div>
                  </div>  

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PREFEREDSEX">Jenis Kelamin:</label> 
                      <div class="col-md-8">
                          <select class="form-control input-sm" id="PREFEREDSEX" name="PREFEREDSEX">
                          <option value="None">Pilih</option>
                           <option <?php echo ($res->PREFEREDSEX=='Male') ? "SELECTED" :"" ?>>Laki-Laki</option>
                           <option <?php echo ($res->PREFEREDSEX=='Female') ? "SELECTED" :"" ?>>Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SECTOR_VACANCY">Sektor Lowongan Kerja:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="SECTOR_VACANCY" name="SECTOR_VACANCY" placeholder="Msasuka Sektor Lowongan Kerja:"   autocomplete="none"><?php echo $res->SECTOR_VACANCY ?></textarea> 
                      </div>
                    </div>
                  </div>  
 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Simpan</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 



</form>
       