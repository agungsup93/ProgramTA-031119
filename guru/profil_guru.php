<?php
ini_set("display_errors",0);
session_start();
if(!isset($_SESSION['nip'])){
	die('Anda belum login');
}
if($_SESSION['hak_akses']!='guru'){
	die('Page Error !');
}
include "../bootstrap/koneksi.php"
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu Guru</title>
  <link rel="shortcut icon" href="../images/dn.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
       <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>Sistem Informasi Gaji Guru</a>
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
						"<img src='../admin/guru/foto/".$data['foto']."' width=40%';>";
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
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
			<center>
			<?php
				include '../koneksi.php';
				$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
				echo 
				"<img src='../admin/guru/foto/".$data['foto']."' width=80%';>";
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
             
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-8">
		
		<div class="box-header with-border bg-info">
		  <table>
		  <thead>
			<tr>
				<td width="150px">
					<h4>Profil Guru</h4>
				</td>
				<td> 	
					
				</td>
			</tr>
		  </thead>
		  </table>
        </div>
        <div class="box box-info">
		    <div class="box-body box-profile">
			<center>
				<table class='table table stripped table-bordered'>
					<thead>
					<tr>
						<td>NIP</td>
						<td>
							<?php
								include '../koneksi.php';
								$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
								echo "$data[nip]";
							?>
						</td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td>
							<?php
								include '../koneksi.php';
								$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru,t_jabatan WHERE t_guru.gol=t_jabatan.gol and nip ='$_SESSION[nip]'"));
								echo "$data[jabatan]";
							?>
						</td>
					</tr>
					<tr>
						<td>Nama Guru</td>
						<td>
							<?php
								include '../koneksi.php';
								$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
								echo "<b>$data[nm_guru]</b>";
							?>
						</td>
					</tr>
					<tr>
						<td>TTL</td>
						<td>
							<?php
								include '../koneksi.php';
								$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
								echo "$data[tmp_lahir], $data[tgl_lahir]";
							?>
						</td>
					</tr>
					<tr>
						<td>Telepone</td>
						<td>
							<?php
								include '../koneksi.php';
								$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
								echo "$data[tlp]";
							?>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>
							<?php
								include '../koneksi.php';
								$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
								echo "$data[alamat]";
							?>
						</td>
					</tr>
					</thead>
				</table>
						<form method='POST' action='#' class='form-horizontal' enctype='multipart/form-data'>
							<div class='form-group'>
								<label class='control-label col-sm-3'></label>
								<div class='col-sm-6'>
									<button type='submit' class='btn btn-default'>
										<a href='home_guru.php'>
										<span class='glyphicon glyphicon-log-out'></span> &nbsp; Kembali</a>	
									</button>
								</div>
							</div>
						</form>
				
			</center>
			</div>
        </div>
        </div>
      </div>
    </section>
	  </div>
  </div>
   <?php include "../footer.php"?>
</div>
<script src="../bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../bootstrap/plugins/fastclick/fastclick.js"></script>
<script src="../bootstrap/dist/js/app.min.js"></script>
<script src="../bootstrap/dist/js/demo.js"></script>
</body>
</html>