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
				"<img src='foto/".$data['foto']."' width=20%;><br><br><b> $data[nm_guru] </b><br><i> $data[jabatan] </i>";
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
				"<img src='foto/".$data['foto']."' width=40 height=50>";
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
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Data Master</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../jabatan/tampil_jabatan.php"><i class="fa fa-circle-o"></i>Jabatan</a></li>
            <li class="active"><a href="#"><i class="fa fa-circle"></i>Guru</a></li>
          </ul>
        </li>
		<li>
          <a href="../penggajian/hitung_gaji.php">
            <i class="fa fa-circle-o"></i> <span>Penggajian</span>
          </a>
		</li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Rekap Data</span><i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="../rekap_data/tampil_gaji.php"><i class="fa fa-circle-o"></i>Data Gaji Guru</a></li>
          </ul>
        </li>
     </ul>
	  </section>
  </aside>
  <!------------------------------------END MENU RIGHT---------------------------->


<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Ganti Password<br>
        <small>Control Panel Admin</small>
      </h1>
    </section>

    <section class="content">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
		<div class="box-header with-border bg-info">
          <h3 class="box-title">From Ganti Password</h3>
        </div>
        <div class="box box-info">
			<center>
				<div class="box-body box-profile">
					<br><?php
					include '../koneksi.php';
					$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip = '$_GET[nip]'"));
					?>
					<?php
					echo"
						<form method='POST' action='script_gantipass.php' class='form-horizontal'>
							<div class='form-group'>
							  <label class='control-label col-sm-3'>NIP</label>
							  <div class='col-sm-6'>
								<input type='text' name='nip' class='form-control'value='$data[nip]' disabled>
							</div>
							</div>
							<div class='form-group'>
							  <label class='control-label col-sm-3'>Silahkan Isi Password Baru Anda</label>
							  <div class='col-sm-6'>
								<input type='text' name='password' class='form-control'value='$data[password]' required>
							</div>
							</div>
							
							<div class='form-group'>
								<label class='control-label col-sm-3'></label>
								<div class='col-sm-6'>
									<button type='submit' name='editpass' class='btn btn-danger'><span class='glyphicon glyphicon-save'></span> &nbsp; Update</button>	
								</div>
							</div>
						</form>";
					?>
				</div>
			</center>
			</div>
        </div>
        </div>
      </div>
    </section>
	
	<!-----------------------end Tampil Data-------------------------------------------->
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
</body>
</html>
