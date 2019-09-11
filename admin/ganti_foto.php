<?php
ini_set("display_errors",0);
session_start();
if(!isset($_SESSION['nip'])){
	die('Anda belum login');
}
if($_SESSION['hak_akses']!='admin'){
	die('Page Error !');
}
include "../koneksi.php"
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cpanel Admin</title>
  <link rel="shortcut icon" href="../images/dn.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../bootstrap/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../bootstrap/plugins/morris/morris.css">
  <link rel="stylesheet" href="../bootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../bootstrap/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../bootstrap/plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" href="../bootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
				include '../koneksi.php';
				$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
				echo 
				"<img src='guru/foto/".$data['foto']."' width=20%;><br><br><b> $data[nm_guru] </b><br>";
			?>              
		<!----------------------end--------------------->
              </li>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>Sign out</a>
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
				include '../koneksi.php';
				$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_guru WHERE nip ='$_SESSION[nip]'"));
				echo 
				"<img src='guru/foto/".$data['foto']."' width=40 height=50>";
			?>
        </div>
        <div class="pull-left info">
		<!-----tampil nama session--->
			<?php
			include '../koneksi.php';
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
           <a href="home_admin.php">
            <i class="fa fa-circle-o"></i> <span>Home</span>
          </a>
		</li>
		
      </ul>
	<ul class="sidebar-menu">
	  <li class="header">
	  	<center>						
		<?php include "../waktu.php"?>
		</center> 						
	  </li>
	</ul>
	  </section>
  </aside>
  <!------------------------------------END MENU RIGHT---------------------------->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Ganti Foto<br>
        <small>Control Panel Admin</small>
      </h1>
    </section>

    <section class="content">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
		<div class="box-header with-border bg-info">
          <h3 class="box-title">From Ganti Foto</h3>
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
						<form method='POST' action='#' class='form-horizontal' enctype='multipart/form-data'>
							<div class='form-group'>
							  <label class='control-label col-sm-3'>NIP</label>
							  <div class='col-sm-6'>
								<input type='text' name='nip' class='form-control'value='$data[nip]' disabled>
							</div>
							</div>
							<div class='form-group'>
								<label class='control-label col-sm-3'></label>
								<div class='col-sm-6'>
									<input type='file' name='foto' maxlength='50' autocomplete='off' required class='form-control'>
								</div>
							</div>
							
							<div class='form-group'>
								<label class='control-label col-sm-3'></label>
								<div class='col-sm-6'>
									<button type='submit' name='editfoto' class='btn btn-danger'><span class='glyphicon glyphicon-save'></span> &nbsp; Update</button>	
									<button type='submit' class='btn btn-default'>
										<a href='profile.php'>
											<span class='glyphicon glyphicon-log-out'></span> &nbsp; Kembali</a>
									</button>
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
  </div>
   <?php include "../footer.php"?>
  <aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <div class="tab-pane" id="control-sidebar-settings-tab">
      </div>
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<script src="../bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../bootstrap/plugins/morris/morris.min.js"></script>
<script src="../bootstrap/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="../bootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../bootstrap/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../bootstrap/plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../bootstrap/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../bootstrap/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../bootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../bootstrap/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../bootstrap/plugins/fastclick/fastclick.js"></script>
<script src="../bootstrap/dist/js/app.min.js"></script>
<script src="../bootstrap/dist/js/pages/dashboard.js"></script>
<script src="../bootstrap/dist/js/demo.js"></script>
</body>
</html>

<?php
include '../koneksi.php';
include '../fungsi.php';

$nip = $_GET['nip'];
if(isset($_POST['editfoto'])){
	$filename	= $_FILES['foto']['name'];
	$move		= move_uploaded_file($_FILES['foto']['tmp_name'],'guru/foto/'.$filename);
	$nip		= aman($_GET['nip']);
	$foto    	= aman($_FILES['foto']['name']);
	$update 	= mysqli_query($koneksi, "UPDATE t_guru SET nip='$nip', foto='$foto' WHERE nip='$nip'") or die(mysqli_error()); @unlink("guru/foto/".$_POST['last_foto']);
	echo "<script>alert ('data telah di update '); document.location='profile.php' </script> ";
}
?>