<?php
include '../../koneksi.php';
$gol			= $_POST['gol'];
$jabatan 		= $_POST['jabatan'];
$gp 			= $_POST['gp'];
$tunjangan 		= $_POST['tunjangan'];
$transport 		= $_POST['transport'];
if (isset($_POST['save'])){
	
$query = mysqli_query($koneksi, "insert into t_jabatan(gol, jabatan,gp, tunjangan, transport)
values ('".$gol."','".$jabatan."','".$gp."','".$tunjangan."','".$transport."')");
}
echo "<script language='javascript'> alert('Simpan Jabatan  Telah Berhasil'); window.location='tampil_jabatan.php'</script> ";
mysqli_query($query);
?>