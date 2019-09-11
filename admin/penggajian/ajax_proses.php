<?php
include "../../koneksi.php";
$g_guru = mysqli_fetch_array(mysqli_query($koneksi, "select * from t_jabatan, t_guru where t_jabatan.gol = t_guru.gol and nip='$_GET[nip]'"));
$data_pegawai = array('gol'   			=>  $g_guru['gol'],
						'gp'  			=>  $g_guru['gp'],
						'tunjangan'  	=>  $g_guru['tunjangan'],
						'transport'  	=>  $g_guru['transport'],
						'nm_guru'    	=>  $g_guru['nm_guru'],);
 echo json_encode($data_pegawai);