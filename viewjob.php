<section id="content">
        <div class="container content">

            <?php
            // Memeriksa apakah ada parameter pencarian yang diberikan dalam URL
            if (isset($_GET['search'])) {
                # code...
                $jobid = $_GET['search'];
            } else {
                $jobid = '';
            }
            // Membuat query SQL untuk mendapatkan daftar pekerjaan berdasarkan pencarian
            $sql = "SELECT * FROM `tblcompany` c, `tbljob` j 
    WHERE c.`COMPANYID` = j.`COMPANYID` 
    AND j.`JOBID` = '" . $jobid . "' 
    ORDER BY DATEPOSTED DESC";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            // Menampilkan daftar pekerjaan yang didapat dari hasil query
            foreach ($cur as $result) {
                # code...

            ?>
                <div class="container">
                    <div class="mg-available-rooms">
                        <h5 class="mg-sec-left-title">Tanggal Diposting : <?php echo date_format(date_create($result->DATEPOSTED), 'M d, Y'); ?></h5>
                        <div class="mg-avl-rooms">
                            <div class="mg-avl-room">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="#"><span class="fa fa-building-o" style="font-size: 50px"></span><!-- <img src="img/room-1.png" alt="" class="img-responsive"> --></a>
                                    </div>
                                    <div class="col-sm-10">
                                        <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><?php echo $result->OCCUPATIONTITLE; ?>
                                        </div>
                                        <div class="row contentbody">
                                            <div class="col-sm-6">
                                                <ul>
                                                    <li><i class="fp-ht-bed"></i>Jumlah Karyawan yang dibutuhkan: <?php echo $result->REQ_NO_EMPLOYEES; ?></li>
                                                    <li><i class="fp-ht-food"></i>Gaji : <?php echo number_format($result->SALARIES, 2);  ?></li>
                                                    <li><i class="fa fa-sun-"></i>Durasi Kerja : <?php echo $result->DURATION_EMPLOYEMENT; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul>
                                                    <!-- <li><i class="fp-ht-dumbbell"></i>Qualification/Work Experience : <?php echo $result->QUALIFICATION_WORKEXPERIENCE; ?></li> -->
                                                    <li><i class="fp-ht-tv"></i>Jenis Kelamin : <?php echo $result->PREFEREDSEX; ?></li>
                                                    <li><i class="fp-ht-computer"></i>Sektor Lowongan Kerja : <?php echo $result->SECTOR_VACANCY; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-12">
                                                <p>Kualifikasi/Pengalaman Kerja:</p>
                                                <ul style="list-style: none;">
                                                    <li><?php echo $result->QUALIFICATION_WORKEXPERIENCE; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-12">
                                                <p>Deskripsi Pekerjaan:</p>
                                                <ul style="list-style: none;">
                                                    <li><?php echo $result->JOBDESCRIPTION; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-12">
                                                <p>Perusahaan :</p> : <?php echo  $result->COMPANYNAME; ?></p>
                                                <p>Lokasi: <?php echo  $result->COMPANYADDRESS; ?></p>
                                            </div>
                                        </div>
                                        <a href="<?php echo web_root; ?>index.php?q=apply&job=<?php echo $result->JOBID; ?>&view=personalinfo" class="btn btn-main btn-next-tab">Lamar Sekarang !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <?php  } ?>
        </div>
    </section>