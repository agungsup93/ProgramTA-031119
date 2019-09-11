<?php
ini_set("display_errors",0);
session_start();
if(!isset($_SESSION['nip'])){
	die('Anda belum login');
}
if($_SESSION['hak_akses']!='kepsek'){
	die('Page Error !');
}
include "../koneksi.php"
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu Kepala Sekolah</title>
  <link rel="shortcut icon" href="../images/dn.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../bootstrap/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="home_kepsek.php" class="navbar-brand"><b>Sistem Informasi Penggajian Guru</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php
						include '../koneksi.php';
						$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
						echo 
						"<b> $data[nm_guru] </b>";
					?>        
				</a>
              <ul class="dropdown-menu">
                <li class="user-header">
					<img alt="Lambang" src="../images/dn.png" height="200" width="100" />
				<p>
					<?php
						include '../koneksi.php';
						$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
						echo 
						"<b> $data[nm_guru] </b>";
					?><br>
					<?php
						include '../koneksi.php';
						$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru, t_jabatan WHERE t_guru.gol = t_jabatan.gol and nip ='$_SESSION[nip]'"));
						echo 
						"$data[jabatan]";
					?>                   
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="content-wrapper">
    <div class="container">
      <section class="content-header">
        <h1>
          Portal Menu Kepala Sekolah<br>
          <small><?php include "../waktu.php"?></small>
        </h1>
      </section>
	<section class="content-header">
	<ol class="breadcrumb">
		<?php
			if($_POST[bln]){
				$bln= $_POST['bln'];
			}
			echo'
				<form method="POST" action="cari_gaji_guru.php" class="form-inline">
					<input type="search" name="bln" placeholder="Pencarian" class="form-control" class="col-sm-4" />
					<input type="submit" class="btn btn-danger btn-sm" name="cari" value="GO"></form>
					<button class="btn btn-default btn-sm"><a href="print_gaji.php?bln='.$bln.'">
					<span class="glyphicon glyphicon-print"></span> Print</a></button>
				';
		?>
      </ol>
	</section><br><br><br>
	<div class="col-md-12">
				  <section class="content">
					  <div class="row">
						<div class="col-xs-12">
						  <div class="box">
							<div class="box-body">
							  <table id="example2" class="table table-bordered table-striped bg-info">
								<thead>
								<tr>
								  <th>NO</th>
								  <th>NIP</th>
								  <th>Nama Guru</th>
								  <th>Jabatan</th>
								  <th>Gol</th>
								  <th>Tunjangan</th>
								  <th>Transport</th>
								  <th>Bulan</th>
								  <th>Tanggal</th>
								  <th>Jumlah Jam</th>
								  <th>Total Gaji</th>
								</tr>
								</thead>
								<tbody>
									<?php
									include '../../koneksi.php';
									$no=0;
									$query=mysqli_query($koneksi, "select * from t_gaji, t_jabatan where t_gaji.gol = t_jabatan.gol order by nip ASC");
									while($data=mysqli_fetch_array($query)){
									$no++;
									echo"		 
									<tr>
									<td>$no </td>
									<td>$data[nip] </td>
									<td>$data[nm_guru] </td>
									<td>$data[jabatan] </td>
									<td>$data[gol] </td>
									<td>$data[tunjangan] </td>
									<td>$data[transport] </td>
									<td>$data[bln] </td>
									<td>$data[tgl] </td>
									<td>$data[jm] </td>
									<td>$data[total_gaji] </td>
									
									</tr>
								";
									?>
									<?php
									}
								echo "</tbody></table>";
									?>
							</div>						  
					</div>
						</div>
					  </div>
				</section>
				</div>
    </div>
  </div>
  <?php include "../footer.php"?>
<script src="../bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../bootstrap/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../bootstrap/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../bootstrap/plugins/fastclick/fastclick.js"></script>
<script src="../bootstrap/dist/js/app.min.js"></script>
<script src="../bootstrap/dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
</body>
</html>