<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_eris";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query untuk menghitung total perusahaan
$sql_company = "SELECT COUNT(*) as total FROM tblcompany";
$result_company = $conn->query($sql_company);
$total_company = $result_company->fetch_assoc()['total'];

// Query untuk menghitung total kategori pekerjaan
$sql_category = "SELECT COUNT(*) as total FROM tblcategory";
$result_category = $conn->query($sql_category);
$total_category = $result_category->fetch_assoc()['total'];

// Query untuk menghitung total lowongan pekerjaan
$sql_vacancy = "SELECT COUNT(*) as total FROM tbljob";
$result_vacancy = $conn->query($sql_vacancy);
$total_vacancy = $result_vacancy->fetch_assoc()['total'];

// Query untuk menghitung total karyawan
$sql_employee = "SELECT COUNT(*) as total FROM tblemployees";
$result_employee = $conn->query($sql_employee);
$total_employee = $result_employee->fetch_assoc()['total'];

$conn->close();
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> D'Lokerz</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $total_company; ?></h3>
          <p>Perusahaan</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $total_category; ?></h3>
          <p>Kategori Pekerjaan</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $total_vacancy; ?></h3>
          <p>Lowongan Pekerjaan</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $total_employee; ?></h3>
          <p>Karyawan</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
