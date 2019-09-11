<?php
ini_set("display_errors",0);
session_start();
if(!isset($_SESSION['nip'])){
	die('Anda belum login');
}
if($_SESSION['hak_akses']!='admin'){
	die('Page Error !');
}
include "../../koneksi.php"
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cpanel Admin</title>
  <link rel="shortcut icon" href="../../images/dn.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../bootstrap/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../../bootstrap/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../bootstrap/dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <span class="logo-mini"><b>PMDM</b></span>
      <span class="logo-lg"><b>Cpanel ADMIN</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-chevron-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
		<!-----------Tampil Foto nama jabatan----------->
			<?php
				include '../../koneksi.php';
				$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
				echo 
				"<img src='../guru/foto/".$data['foto']."' width=50%;><br><b> $data[nm_guru] </b>";
			?>                <p>
		<!----------------------end--------------------->
                </p>
              </li>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../../logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
  
  <!-----------------------------------------MENU RIGHT---------------------------->
    <section class="sidebar">

	<div class="user-panel">
        <div class="pull-left image">
			<?php
				include '../../koneksi.php';
				$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
				echo 
				"<img src='../guru/foto/".$data['foto']."' width=40 height=50>";
			?>
        </div>
        <div class="pull-left info">
		<!-----tampil nama session--->
			<?php
			include '../../koneksi.php';
			$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
			echo "<b> $data[nm_guru] </b>";
			?>
		<!-----end tampil nama session--->
				<br>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
     <ul class="sidebar-menu">
        <li class="header">
		<center><b>MENU UTAMA</b></center>
		</li>
        <li>
          <a href="../home_admin.php">
            <i class="fa fa-circle-o"></i> <span>Home</span>
          </a>
		</li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Tambah Data</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../jabatan/tampil_jabatan.php"><i class="fa fa-circle-o"></i>Jabatan</a></li>
            <li><a href="../guru/tampil_guru.php"><i class="fa fa-circle-o"></i>Guru</a></li>
          </ul>
        </li>
		<li>
          <a href="../penggajian/hitung_gaji.php">
            <i class="fa fa-circle-o"></i> <span>Penggajian</span>
          </a>
		</li>
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Rekap Data</span><i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li class="active"><a href="#"><i class="fa fa-circle"></i>Data Gaji Guru</a></li>
          </ul>
        </li>
      </ul>
	  </section>
  </aside>
  <!------------------------------------END MENU RIGHT---------------------------->


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Gaji Guru
        <small><?php include "../../waktu.php"?></small>
      </h1>
      <ol class="breadcrumb">
		<?php 
			echo'
				<form method="POST" action="cari_gaji.php" class="form-inline">
					<input type="search" name="bln" placeholder="Pilih Bulan" class="form-control" class="col-sm-4" />
					<input type="submit" class="btn btn-info btn-sm" name="cari" value="GO">
					
				</form>';
		?>
		<button class="btn btn-default btn-sm"><a href="print_gaji.php"  target="_blank">
					<span class="glyphicon glyphicon-print"></span> Print</a></button>
      </ol>
    </section><br><br>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
			  <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NIP</th>
				  <th>Nama Guru</th>
				  <th>Jabatan</th>
                  <th>Tunjangan</th>
                  <th>Transport</th>
                  <th>Bulan</th>
                  <th>Tanggal</th>
                  <th>Jumlah Jam</th>
                  <th>Total Gaji</th>
                  <th>Action</th>
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
					<td>$data[tunjangan] </td>
					<td>$data[transport] </td>
					<td>$data[bln] </td>
					<td>$data[tgl] </td>
					<td>$data[jm] </td>
					<td>$data[total_gaji] </td>
					<td><center>
						<a href='hapus_gaji.php?nip=$data[nip]' class='btn btn-danger btn-xs' onClick='return hapus()'title='Hapus Data'>
							<span class='glyphicon glyphicon-remove'></span> Hapus</a>
						<a href='slip_gaji.php?nip=$data[nip]' target='_blank' class='btn btn-info btn-xs' title='Print Slip'>
							<span class='glyphicon glyphicon-print'></span> Print</a>
						</center></td>
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
  
  
   <?php include "../../footer.php"?>

  <aside class="control-sidebar control-sidebar-dark">
   
  </aside>
  <div class="control-sidebar-bg"></div>
</div>

<script src="../../bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../bootstrap/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../../bootstrap/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../../bootstrap/plugins/fastclick/fastclick.js"></script>
<script src="../../bootstrap/dist/js/app.min.js"></script>
<script src="../../bootstrap/dist/js/demo.js"></script>
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
<script>
function hapus(pesan){
	var pesan;
	pesan = 'Apakah Anda ingin menghapus data ini? Jika yakin tekan OK, jika tidak tekan Cancel';
	
	if(confirm(pesan)){
		return true;
	}
	else{
		return false;
	}
}
</script>
</body>
</html>