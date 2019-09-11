<?php
include "../../koneksi.php";
mysqli_query($koneksi, "DELETE from t_guru WHERE nip='$_GET[nip]'");
echo "<script language='javascript'> alert ('Data Guru Berhasil Dihapus'); window.location = 'tampil_guru.php'</script>";
?>