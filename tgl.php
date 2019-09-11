<?php
$tanggal= mktime(date("m"),date("d"),date("Y"));
echo date("d-M-Y", $tanggal);
date_default_timezone_set('Asia/Jakarta');
?>