<?php
ini_set("display_errors",0);
session_start();
if(!isset($_SESSION['nip'])){
	die('Anda belum login');
}
if($_SESSION['hak_akses']!='guru'){
	die('Page Error !');
}
include "../koneksi.php"
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu Guru</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../bootstrap/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>Sistem Informasi Gaji Guru</b></a>
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
						"<img src='../admin/guru/foto/".$data['foto']."' width=20% class='user-image' alt='User Image';>";
					?>
					<?php
						include '../koneksi.php';
						$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
						echo 
						"<b> $data[nm_guru] </b>";
					?>        
				</a>
              <ul class="dropdown-menu">
                <li class="user-header">
					<?php
						include '../koneksi.php';
						$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
						echo 
						"<img src='../admin/guru/foto/".$data['foto']."' width=60%';>";
					?><br>
                  <p>
					<?php
						include '../koneksi.php';
						$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
						echo 
						"<b> $data[nm_guru] </b>";
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
          Portal Menu Guru<br>
          <small><?php include "../waktu.php"?></small>
        </h1>
      </section>

<!-------------------------------------------------------------Tampil Menu Guru-------------------------------->
    <section class="content">
      <div class="row">
        <div class="col-md-2"><br>
          <div class="box box-primary">
            <div class="box-body box-profile">
			<center>
			<?php
				include '../koneksi.php';
				$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
				echo 
				"<img src='../admin/guru/foto/".$data['foto']."' width=70%';>";
			?> 
			<?php
				include '../koneksi.php';
				$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
				echo "<h3> $data[nm_guru] </h3>";
			?>              
			<?php
				include '../koneksi.php';
				$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
				echo "<i>$data[jabatan]</i>";
			?> 			</center><br>
              <?php
				include '../../koneksi.php';
				echo"
              <a href='profil_guru.php?nip=$data[nip]' class='btn btn-primary btn-block'><b>Profil</b></a> 
			  <a href='ganti_fotoguru.php?nip=$data[nip]' class='btn btn-primary btn-block'><b>Ganti Foto</b></a>
			  <a href='ganti_passguru.php?nip=$data[nip]' class='btn btn-primary btn-block'><b>Ganti Password</b></a>
			  ";?>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-10">
			<section class="content">
			<div class="box">
			<div class="box-body">
      <div class="row">
        <div class="col-xs-12">
              <table id="example1" class="table table-bordered table-striped bg-info">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Golongan</th>
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
						$query=mysqli_query($koneksi, "select * from t_gaji where nip = '$_SESSION[nip]'");
						while($data=mysqli_fetch_array($query)){
						$no++;
						echo"		 
						<tr>
						<td>$no </td>
						<td>$data[nip] </td>
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
	</section>
	  
<!-----------------------------------------------------------end Tampil Menu Guru------------------------------>	  

	  </div>
  </div>
  <?php include "../footer.php"?>
</div>
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
      "searching": true,
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