<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Tandai pesan sebagai sudah dibaca
$sql = "UPDATE `tbljobregistration` SET HVIEW=1 WHERE `REGISTRATIONID`='{$id}'";
$mydb->setQuery($sql);
$mydb->executeQuery();

// Ambil informasi pesan
$sql = "SELECT * FROM `tblcompany` c,`tbljobregistration` jr,  `tbljob` j  WHERE c.`COMPANYID`=jr.`COMPANYID` AND jr.`JOBID`=j.`JOBID` AND `REGISTRATIONID`='{$id}'";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();

// Ambil informasi pelamar
$applicant = new Applicants();
$appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);
?> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
        <div class="row"> 
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Baca Pesan</h3> 
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3><?php echo $res->OCCUPATIONTITLE; ?></h3>
                            <h5>From: <?php echo $res->COMPANYNAME; ?>
                                <span class="mailbox-read-time pull-right"><?php echo date_format(date_create($res->DATETIMEAPPROVED),'d M Y h:i'); ?></span></h5>
                        </div>
                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <pllo <?php echo $appl->FNAME; ?>,</p>  
                            <p><?php echo $res->REMARKS; ?></p>
                            <p>Thanks,<br><?php echo $res->COMPANYNAME; ?></p>
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <form action="delete_message.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-default"><i class="fa fa-trash-o"></i> Hapus</button>
                        </form>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
