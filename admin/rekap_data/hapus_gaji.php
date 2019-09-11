<?php
include "../../koneksi.php";
mysqli_query($koneksi, "DELETE from t_gaji WHERE nip='$_GET[nip]'");
echo "<script language='javascript'> alert ('Data Berhasil Dihapus'); window.location = 'tampil_gaji.php'</script>";
?>