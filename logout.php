<?php
 session_start();
 session_unset();
 session_destroy();
	echo "<script language='javascript'> alert('Terimakasih....Anda Telah Keluar'); window.location='index.php'</script> ";
	mysqli_query($query);

?>