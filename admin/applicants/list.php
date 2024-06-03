<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
    redirect(web_root . "admin/index.php");
}
?> 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Pelamar</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<form class="wow fadeInDownaction" action="controller.php?action=delete" method="POST">
    <table id="dash-table" class="table table-striped table-hover table-responsive" style="font-size:12px" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Pelamar</th>
                <th>Judul Pekerjaan</th>
                <th>Perusahaan</th>
                <th>Waktu Melamar</th>
                <th>Komentar</th>
                <th width="14%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php   
                $mydb->setQuery("SELECT * FROM `tblcompany` c, `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID`");
                $cur = $mydb->loadResultList();
                foreach ($cur as $result) { 
                    echo '<tr>';
                    echo '<td>'. htmlentities($result->APPLICANT) .'</td>';
                    echo '<td>' . htmlentities($result->OCCUPATIONTITLE) .'</td>';
                    echo '<td>' . htmlentities($result->COMPANYNAME) .'</td>'; 
                    echo '<td>'. htmlentities($result->REGISTRATIONDATE) .'</td>';
                    echo '<td>'. htmlentities($result->REMARKS) .'</td>';  
                    echo '<td align="center">    
                        <a title="View" href="index.php?view=view&id='. htmlentities($result->REGISTRATIONID) .'" class="btn btn-info btn-xs">
                        <span class="fa fa-info fw-fa"></span> View</a> 
                        <button type="submit" name="delete" value="'. htmlentities($result->REGISTRATIONID) .'" class="btn btn-danger btn-xs">
                        <span class="fa fa-trash-o fw-fa"></span> Remove</button>
                    </td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</form>
