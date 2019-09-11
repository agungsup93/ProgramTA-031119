<?php
session_start();
include 'koneksi.php';
/* VARIABEL */
$nip = $_POST['nip'];
$password = md5($_POST['password']);
$enc_password = md5($password);

$op = $_GET['op'];
if($op=='in'){
$sql = mysqli_query($koneksi, "select * from t_guru where nip='$nip' AND password='$password'");
if(mysqli_num_rows($sql)==1){
$query = mysqli_fetch_array($sql);
$_SESSION['nip'] = $query['nip'];
$_SESSION['hak_akses'] = $query['hak_akses'];
if($query['hak_akses']=="admin"){
header ("location: admin/home_admin.php");
}
elseif($query['hak_akses']=="guru"){
header ("location: guru/home_guru.php");
}
elseif($query['hak_akses']=="kepsek"){
header ("location: kepsek/home_kepsek.php");
}
}else{
	?>
<script language='javascript'> alert('nip atau password salah'); document.location='index.php'; </script>
<?php
}
}elseif($op=='out'){
unset($_SESSION['nip']);
unset($_SESSION['hak_akses']);
header ("location: index.php");
}
?>