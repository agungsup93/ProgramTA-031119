<?php
include "../../koneksi.php";
mysqli_query($koneksi, "DELETE from t_jabatan WHERE gol='$_GET[gol]'");
echo "<script language='javascript'> alert ('Data Jabatan Berhasil Dihapus'); window.location = 'tampil_jabatan.php'</script>";
?>