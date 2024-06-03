  <section id="banner">
   
  <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Inovasi</h3> 
          <p>Kami memberikan kesempatan anda untuk berinovasi</p> 
           
                </div>
              </li>
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Specialisasi</h3> 
          <p>Kesuksesan bergantug pada pekerjaanmu </p> 
           
                </div>
              </li>
            </ul>
        </div>
  <!-- end slider -->
 
  </section> 
  <section id="call-to-action-2">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <h3>Berkolaborasi dengan pemimpin bisnis</h3>
          <p>Membuat kesuksesan, Jangka Panjang, Strategi membangun relasi antara pelanggan dan supplier, berdasarkan pencapaian praktek terbaik dan keunggulan kompetitif yang berkelanjutan. Di dalam kolaborasi bisnis model, Para profesional SDM bekerja sama dengan para pemimpin bisnis dan manajer lini untuk mencapai tujuan organisasi bersama.</p>
        </div>
       <!--  <div class="col-md-2 col-sm-3">
          <a href="#" class="btn btn-primary">Read More</a>
        </div> -->
      </div>
    </div>
  </section>
  
  <section id="content">
  
  
  <div class="container">
        <div class="row">
      <div class="col-md-12">
        <div class="aligncenter"><h2 class="aligncenter">Perusahaan</h2><!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt.. --></div>
        <br/>
      </div>
    </div>

    <?php 
      $sql = "SELECT * FROM `tblcompany`";  // Mengambil semua data perusahaan dari tabel tblcompany
      $mydb->setQuery($sql);        
      $comp = $mydb->loadResultList(); // Menyimpan hasil query dalam variabel $comp


      foreach ($comp as $company ) {  // Melakukan iterasi melalui setiap baris hasil query
        # code...
    
    ?>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-building-o"></i>
                <div class="info-blocks-in">
                    <h3><?php echo $company->COMPANYNAME;?></h3>
                    <!-- <p><?php echo $company->COMPANYMISSION;?></p> -->
                    <p>Alamat :<?php echo $company->COMPANYADDRESS;?></p>
                    <p>No. kontak :<?php echo $company->COMPANYCONTACTNO;?></p>
                </div>
            </div>

    <?php } ?> 
  </div>
  </section>
  
  <section class="section-padding gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h2 >Pekerjaan Populer</h2>  
          </div>
        </div>
      </div>
      <div class="col-md-12">
      <?php
    $sql = "SELECT * FROM tblcategory";
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();

    foreach ($cur as $result) {
        // Melakukan sanitasi pada nama kategori sebelum digunakan di URL
        $category = urlencode($result->CATEGORY);
        // Menghindari XSS dengan menggunakan htmlspecialchars pada teks yang ditampilkan
        $categoryName = htmlspecialchars($result->CATEGORY, ENT_QUOTES, 'UTF-8');
        ?>
        <div class="col-md-3" style="font-size:15px;padding:5px">* <a href="<?= web_root ?>index.php?q=category&search=<?= $category ?>"><?= $categoryName ?></a></div>
    <?php } ?>
</div>


          ?>
        </div>
      </div>
 
    </div>
  </section>    
  <section id="content-3-10" class="content-block data-section nopad content-3-10">
  <div class="image-container col-sm-6 col-xs-12 pull-left">
    <div class="background-image-holder">

    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-6 col-xs-12 content">
        <div class="editContent">
          <h3>Tim Kita</h3>
        </div>
        <div class="editContent"  style="height:235px;">
          <p> 
          &nbsp;&nbsp;Sikap “satu tim” kami meruntuhkan sekat-sekat dan membantu kami untuk terlibat secara efektif mulai dari C-suite hingga ke lini depan. Gaya kerja kolaboratif kami menekankan kerja sama tim, kepercayaan, dan toleransi terhadap perbedaan pendapat. Orang-orang mengatakan bahwa kami membumi, mudah didekati, dan menyenangkan.<br/><br/>

          &nbsp;&nbsp;Kami memiliki hasrat untuk mendapatkan hasil yang nyata dari klien kami dan dorongan pragmatis untuk bertindak yang dimulai pada hari Senin pukul 8 pagi dan tidak pernah berhenti. Kami menggalang klien dengan energi kami yang menular, untuk membuat perubahan tetap bertahan.<br/><br/>

          &nbsp;&nbsp;Dan kami tidak pernah bekerja sendirian. Kami mendukung dan didukung untuk mengembangkan kisah hasil pribadi kami sendiri. Kami menyeimbangkan antara tantangan dan kreasi bersama dengan klien kami, membangun kemampuan internal yang diperlukan agar mereka dapat menciptakan hasil yang berulang. </p>
        </div> 
      </div>
    </div><!-- /.row-->
  </div><!-- /.container -->
</section>
  
  <div class="about home-about">

            
          </div>