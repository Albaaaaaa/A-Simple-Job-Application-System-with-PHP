<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- /.col -->
      <?php
      $p = isset($_GET['p']) ? htmlspecialchars($_GET['p']) : null;
      if (!$p) {
      ?>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pekerjaan yang diajukan</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table id="dash-table" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Nama Pekerjaan</th>
                      <th>Perusahaan</th>
                      <th>Lokasi</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT * FROM `tblcompany` c, `tbljobregistration` r, `tbljob` j 
                  WHERE c.`COMPANYID` = r.`COMPANYID` 
                  AND r.`JOBID` = j.`JOBID` 
                  AND r.`APPLICANTID` = {$_SESSION['APPLICANTID']}";

                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $result) {
                      echo '<tr>';
                      echo '<td class="mailbox-star"><a href="index.php?view=appliedjobs&p=job&id=' . htmlentities($result->REGISTRATIONID) . '"><i class="fa fa-pencil-o text-yellow"></i> ' . htmlentities($result->OCCUPATIONTITLE) . '</a></td>';
                      echo '<td class="mailbox-attachment">' . htmlentities($result->COMPANYNAME) . '</td>';
                      echo '<td class="mailbox-attachment">' . htmlentities($result->COMPANYADDRESS) . '</td>';
                      echo '<td class="mailbox-attachment">' . htmlentities($result->REMARKS) . '</td>';
                      echo '</tr>';
                    }
                    ?>

                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      <?php } else {
        if (file_exists("viewjob.php")) {
          require_once("viewjob.php");
        } else {
          echo "File not found.";
        }
      } ?>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>