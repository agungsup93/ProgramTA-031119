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
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="../../images/dn.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/print.css" />
<script language="javascript" type="text/javascript" src="jquery-3.1.0.js"></script>
<title>Data_GajiGuru//PMDN <?php include "../tgl.php"?></title>
<style>img {max-width:100%;} </style>
<script>window.print()</script>
</head>

<body>
<div class='col-sm-12'>
<center><h3>Slip Gaji Guru PMDN</h3><hr>
<?php
include "../../koneksi.php";	
$no=0;
$nip		= $_POST['nip'];
$sql 		= mysqli_query($koneksi, "SELECT * from t_gaji, t_jabatan  WHERE t_gaji.gol = t_jabatan.gol and nip ='$_GET[nip]'");
while ($data = mysqli_fetch_array($sql)){
$no++;
echo"
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<td>NIP</td>
				<td>: $data[nip]</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>: $data[nm_guru]</td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>: $data[jabatan]</td>
			</tr>
			<tr>
				<td>Golongan</td>
				<td>: $data[gol]</td>
			</tr>
			<tr>
				<td>Gaji Pokok</td>
				<td>: Rp. $data[gp]</td>
			</tr>
			<tr>
				<td>Tunjangan</td>
				<td>: Rp. $data[tunjangan]</td>
			</tr>
			<tr>
				<td>Transport</td>
				<td>: Rp. $data[transport]</td>
			</tr>
			<tr>
				<td>Total Jam Mengajar</td>
				<td>: $data[jm] Jam</td>
			</tr>
		</thead>
	</table>";
			echo"
			<table class='table table-bordered table-striped'>";
			echo"
			<thead>
			<tr>
				<th>Total Gaji</th>
			</tr>
			</thead>";
			echo"<hr><hr>
			</tbody>
			<tr>
				<td><b>Rp. $data[total_gaji]</b></td>
			</tr>
			</tbody>";
		?>
	<?php
	} echo  "</table>";
	?><hr>
</div><br><br>
<div class='col-sm-3'></div>
<div class='col-sm-6'></div>
<div class='col-sm-3'>
<center>
	Kedungwaringin, <?php include "../tgl.php"?><br><br><br><br>
	Abdul Aziz Muslim, S.Pd, M.Pd<br>
	<b><u>Kepala Sekolah</u></b>
</center>
</div>
</body>
</html>