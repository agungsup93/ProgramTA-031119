<?php
include '../../koneksi.php';
$nip			= $_POST['nip'];
$gol			= $_POST['gol'];
$password		= md5($_POST['password']);
$hak_akses 		= $_POST['hak_akses'];
$nm_guru		= $_POST['nm_guru'];
$jekel 			= $_POST['jekel'];
$tmp_lahir		= $_POST['tmp_lahir'];
$tgl_lahir		= $_POST['tgl_lahir'];
$alamat 		= $_POST['alamat'];
$tlp 			= $_POST['tlp'];
$foto     		= ($_FILES['foto']['name']);
if (isset($_POST['save'])){
	$fileName = $_FILES['foto']['name'];
	
$query = mysqli_query($koneksi, "insert into t_guru(nip, gol, password, hak_akses, nm_guru, jekel, tmp_lahir, tgl_lahir, alamat, tlp, foto)
values ('".$nip."','".$gol."','".$password."','".$hak_akses."','".$nm_guru."','".$jekel."','".$tmp_lahir."','".$tgl_lahir."','".$alamat."','".$tlp."','$fileName')");
move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
}
echo "<script language='javascript'> alert('Data Berhasil di Tambahkan'); window.location='tampil_guru.php'</script> ";
mysqli_query($query);
?>