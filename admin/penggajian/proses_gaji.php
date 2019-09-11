<?php
include '../../koneksi.php';
$nip			= $_POST['nip'];
$gol 			= $_POST['gol'];
$gp 			= $_POST['gp'];
$tunjangan 		= $_POST['tunjangan'];
$transport 		= $_POST['transport'];
$nm_guru 		= $_POST['nm_guru'];
$bln	 		= $_POST['bln'];
$tgl	 		= date("Y-m-d");
$jm		 		= $_POST['jm'];
if (isset($_POST['save'])){
	
	
	
//Rumus Perhitungan Gaji Guru

$totalgaji=($gp*$jm)+$tunjangan+$transport;
//Simpan KE data Base



$query = mysqli_query($koneksi, "insert into t_gaji (nip, gol,gp, tunjangan, transport, nm_guru, bln, tgl, jm,total_gaji)
values ('".$nip."','".$gol."','".$gp."','".$tunjangan."','".$transport."','".$nm_guru."','".$bln."','".$tgl."','".$jm."','$totalgaji')");
}
echo "<script language='javascript'> alert('Input Gaji Sukses'); window.location='../rekap_data/tampil_gaji.php'</script> ";
mysqli_query($query);
?>