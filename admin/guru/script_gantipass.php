<?php
include '../../koneksi.php';
	$nip 			= $_GET['nip'];
if(isset($_POST['editpass'])){
	$password		= md5($_POST['password']);
$update = mysqli_query($koneksi, "UPDATE t_guru SET

password			=	'$password' WHERE nip='$nip'") or die(mysqli_error());
echo "<script>alert ('data telah di update '); document.location='tampil_guru.php' </script>";
}
?>
<!-------Edit Script Edit-------->