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
				"<img src='../guru/foto/".$data['foto']."' width=20%;><br><br><b> $data[nm_guru] </b><br><i> $data[jabatan] </i>";
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
		<li>
          <a href="../guru/tampil_guru.php">
            <i class="fa fa-circle-o"></i> <span>Data Master</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../jabatan/tampil_jabatan.php"><i class="fa fa-circle-o"></i>Jabatan</a></li>
            <li><a href="../guru/tampil_guru.php"><i class="fa fa-circle-o"></i>Guru</a></li>
          </ul>
        </li>
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-circle"></i><span>Penggajian</span>
          </a>
		</li>
		<li class="treeview">
          <a href="../rekap_data/tampil_gaji.php">
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penggajian
        <small><?php include "../../waktu.php"?></small>
      </h1>
      <ol class="breadcrumb">
		<li>
			<button class="btn btn-default btn-md"><a href="../home_admin.php">
			<span class="glyphicon glyphicon-log-out"></span> Kembali</a></button>
		</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
				<form name='input' method='POST' action='proses_gaji.php' class='form-horizontal'>					
					<div class='form-group'>
					<label class='col-sm-2 control-label'>NIP</label>
						<div class='col-sm-3'>
						<select onchange="cek_database()" id="nip" name="nip">
							<option value='' selected>- Pilih -</option>
								<?php
									include "koneksi.php";
									$g_guru = mysqli_query($koneksi,"SELECT * FROM t_jabatan, t_guru where t_jabatan.gol=t_guru.gol order by nip asc");
									while ($row = mysqli_fetch_array($g_guru)) {
										echo "<option value='$row[nip]'>$row[nip]</option>";
									}
								?>
					</select>
					</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-2 control-label'>Golongan</label>
							<div class='col-sm-3'>
						<input type='text' id='gol' name='gol' placeholder='Golongan' class='form-control'>
					</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-2 control-label'>Gaji Pokok</label>
							<div class='col-sm-3'>
						<input type='text' id='gp' name='gp' placeholder='Gaji Pokok' class='form-control'>
					</div>
					</div>	
					<div class='form-group'>
						<label class='col-sm-2 control-label'>Tunjangan</label>
							<div class='col-sm-3'>
						<input type='text' id='tunjangan' name='tunjangan' placeholder='Tunjangan' class='form-control'>
					</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-2 control-label'>Transport</label>
							<div class='col-sm-3'>
						<input type='text' id='transport' name='transport' placeholder='Transport' class='form-control'>
					</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-2 control-label'>Nama Guru</label>
							<div class='col-sm-3'>
						<input type='text' id='nm_guru' name='nm_guru' placeholder='Nama Guru' class='form-control'>
					</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-2 control-label'>Bulan</label>
							<div class='col-sm-3'>
								<select name='bln' class='form-control' required>
									<option value=''>--Pilih--</option>
									<option value='jan-feb'>Jan-Feb</option>
									<option value='feb-mar'>Feb-Mar</option>
									<option value='mar-apr'>Mar-Apr</option>
									<option value='apr-mei'>Apr-Mei</option>
									<option value='mei-jun'>Mei-Jun</option>
									<option value='jun-jul'>Jun-Jul</option>
									<option value='jul-agust'>Jun-Agust</option>
									<option value='agust-sept'>Agust-Sept</option>
									<option value='sept-okt'>Sept-Okt</option>
									<option value='okt-nov'>Okt-Nov</option>
									<option value='nov-des'>Nov-Des</option>
									<option value='des-jan'>Des-Jan</option>
								</select>
							</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-2 control-label'>Jumlah Jam</label>
							<div class='col-sm-3'>
						<input type='text' name='jm' placeholder='Jumlah Jam' class='form-control'>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-sm-2 control-label'></label>
							<div class='col-sm-8'>
						<input type='submit' name='save' value='Simpan' class='btn btn-primary btn-sm'>
						<input type='reset' name='batal' value='Hapus' class='btn btn-danger btn-sm'>
					</div>
					</div>
				</form>

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
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    function cek_database(){
        var nip = $("#nip").val();
        $.ajax({
            url: 'ajax_proses.php',
            data:"nip="+nip ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#gol').val(obj.gol);
            $('#gp').val(obj.gp);
			$('#tunjangan').val(obj.tunjangan);
			$('#transport').val(obj.transport);
			$('#nm_guru').val(obj.nm_guru);
        });
    }
</script>
</body>
</html>
</body>
</html>