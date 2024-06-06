<section id="content">
    <div class="container content">    
     <p> <?php check_message();?></p>      
		<form class="row form-horizontal span6  wow fadeInDown" action="process.php?action=register" method="POST">
		<h2 class=" ">Data Pribadi</h2>
		<div class="row"> 
			<div class="form-group">
				<div class="col-md-8">
				<label class="col-md-4 control-label" for=
					"FNAME">Nama Depan:</label>

					<div class="col-md-8">
					  <input name="JOBID" type="hidden">
					   <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
					      "Nama Depan" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for=
					"LNAME">Nama Belakang:</label>

					<div class="col-md-8">
					  <input name="deptid" type="hidden" value="">
					  <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
					      "Nama belakang"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
					  </div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for=
					"MNAME">Nama Tengah:</label>

					<div class="col-md-8">
					  <input name="deptid" type="hidden" value="">
					  <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
					      "Nama tengah"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
					   <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
					      "Description" type="text" value=""> -->
					</div>
				</div>
			</div> 

			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for=
					"ADDRESS">Alamat:</label>

					<div class="col-md-8">

					 <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
					    "Alamat" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
					</div>
				</div>
			</div> 

			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for=
					"Gender">Jenis Kelamin:</label>

					<div class="col-md-8">
					 <div class="col-lg-5">
					    <div class="radio">
					      <label><input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female">Perempuan</label>
					    </div>
					  </div>

					  <div class="col-lg-4">
					    <div class="radio">
					      <label><input id="optionsRadios2"   name="optionsRadios" type="radio" value="Male"> Laki-Laki</label>
					    </div>
					  </div> 
					 
					</div>
				</div>
			</div>

			<div class="form-group">
			  <div class="rows">
			    <div class="col-md-8"> 
			      <div class="col-md-4">
			        <label class="col-lg-12 control-label">Tanggal Lahir:</label>
			      </div>

			      <div class="col-lg-3">
			        <select class="form-control input-sm" name="month">
			          <option>Bulan</option>
			          <?php
							// Bagian PHP yang digunakan untuk membuat dropdown menu untuk memilih bulan lahir. Setiap bulan dari array $mon ditampilkan sebagai opsi dalam elemen <select>.
			             $mon = array('Jan' => 1 ,'Feb'=> 2,'Mar' => 3 ,'Apr'=> 4,'May' => 5 ,'Jun'=> 6,'Jul' => 7 ,'Aug'=> 8,'Sep' => 9 ,'Oct'=> 10,'Nov' => 11 ,'Dec'=> 8 );    
			          
			        
			            foreach ($mon as $month => $value ) {
			              
			                  # code...
			                   echo '<option value='.$value.'>'.$month.'</option>';
			                } 
			          ?>
			        </select>
			      </div>

			      <div class="col-lg-2">
			        <select class="form-control input-sm" name="day">
			          <option>Hari</option>
			        <?php 
			          $d = range(31, 1);
			          foreach ($d as $day) {
			            echo '<option value='.$day.'>'.$day.'</option>';
			          }
			        
			        ?>
			          
			        </select>
			      </div>

			      <div class="col-lg-3">
			        <select class="form-control input-sm" name="year">
			          <option>Tahun</option>
			        <?php 
			          $years = range(2010, 1900);
			          foreach ($years as $yr) {
			            echo '<option value='.$yr.'>'.$yr.'</option>';
			          }
			        
			        ?>
			        
			        </select>
			      </div> 
			    </div>
			  </div>
			</div> 

			 <div class="form-group">
			    <div class="col-md-8">
			      <label class="col-md-4 control-label" for=
			      "BIRTHPLACE">Tempat Lahir :</label>

			      <div class="col-md-8">
			        
			         <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder=
			            "Tempat Kelahiran" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
			      </div>
			    </div>
			  </div> 


			 <div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "TELNO">No. Kontak:</label>

			    <div class="col-md-8">
			      
			       <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
			          "Nomor Telepon" type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
			    </div>
			  </div>
			</div> 

			 <div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "CIVILSTATUS">Status:</label>

			    <div class="col-md-8">
			      <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
			          <option value="none" >Pilih</option>
			          <option value="Single">Belum Menikah</option>
			          <option value="Married">Menikah</option>
			          <option value="Widow" >Bercerai</option>
			          <!-- <option value="Fourth" >Fourth</option> -->
			      </select> 
			    </div>
			  </div>
			</div>  

			 <div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "EMAILADDRESS">Alamat Email:</label> 
			    <div class="col-md-8">
			       <input type="Email" class="form-control input-sm" id="EMAILADDRESS" name="EMAILADDRESS" placeholder="Alamat Email"   autocomplete="false"/> 
			    </div>
			  </div>
			</div>  
			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "USERNAME">Nama Pengguna:</label>

			    <div class="col-md-8">
			      <input name="deptid" type="hidden" value="">
			      <input  class="form-control input-sm" id="USERNAME" name="USERNAME" placeholder=
			          "Nama Pengguna"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
			      </div>
			  </div>
			</div>

			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "PASS">Kata Sandi:</label>

			    <div class="col-md-8">
			      <input name="deptid" type="hidden" value="">
			      <input  class="form-control input-sm" id="PASS" name="PASS" placeholder=
			          "Kata Sandi" type="password"   onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
			       <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
			          "Description" type="text" value=""> -->
			    </div>
			  </div>
			</div> 
			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "DEGREE">Pendidikan Terakhir:</label>

			    <div class="col-md-8">
			      <input name="deptid" type="hidden" value="">
			      <input  class="form-control input-sm" id="DEGREE" name="DEGREE" placeholder=
			          "Pendidikan Terakhir"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
			      </div>
			  </div>
			</div>  
			<div class="form-group">
			    <div class="col-md-8">
			      <label class="col-md-4 control-label" for=
			      ""></label>  

			      <div class="col-md-8"> 
			      		<label><input type="checkbox"> Dengan mendaftar, Anda setuju dengan ketentuan kami <a href="#">Syarat Dan Ketentuan</a></label>
			     </div>
			    </div>
			</div>    
			<div class="form-group">
			    <div class="col-md-8">
			      <label class="col-md-4 control-label" for=
			      "idno"></label>  

			      <div class="col-md-8">
			         <button class="btn btn-primary btn-sm" name="btnRegister" type="submit" ><span class="fa fa-save fw-fa"></span> Simpan</button> 
			     
			     </div>
			    </div>
			</div>    
		</form>
	</div>
</section>