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
<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../../bootstrap/css/print.css" />
<script language="javascript" type="text/javascript" src="jquery-3.1.0.js"></script>
<title>Data_GajiGuru//PMDN <?php include "../../tgl.php"?></title>
<style>img {max-width:100%;} </style>
<script>window.print()</script>
</head>

<body>

<div class='col-sm-12'>
<center><h3>DATA GAJI GURU</h3><br>
	<table class='table table-bordered table-hover table-striped'>
		<thead>
		<tr>
			<th>NO</th>
            <th>NIP</th>
			<th>Nama Guru</th>
            <th>Gol</th>
            <th>Tunjangan</th>
            <th>Transport</th>
            <th>Bulan</th>
            <th>Tanggal</th>
            <th>Jumlah Jam</th>
            <th>Total Gaji</th>
		</tr>	
		</thead>
		
		</tbody>
		<?php
			include '../../koneksi.php';
			$no=0;
			
			$bln=$_GET['bln'];
			
			$query=mysqli_query($koneksi, "select * from t_gaji where bln='$bln' order by bln");
			while($data=mysqli_fetch_array($query)){
			$no++;
			echo"		 
		<tr>
			<td>$no</td>
			<td>$data[nip]</td>
			<td>$data[nm_guru]</td>
			<td>$data[gol]</td>
			<td>$data[tunjangan]</td>
			<td>$data[transport]</td>
			<td>$data[bln]</td>
			<td>$data[tgl]</td>
			<td>$data[jm]</td>
			<td>$data[total_gaji]</td>
			
		</tr>
		</tbody>";
		?>
	<?php
		}
		echo "</table>";
		?>
		</center>
</div>
<div class='col-sm-3'></div>
<div class='col-sm-6'></div>
<div class='col-sm-3'>
<center>
	Kedungwaringin, <?php include "../../tgl.php"?><br><br><br><br>
	Abdul Aziz Muslim, S.Pd, M.Pd<br>
	<b><u>Kepala Sekolah</u></b>
</center>
</div>
</body>
</html>