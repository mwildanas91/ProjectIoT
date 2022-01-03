<?php 

	$konek = mysqli_connect("localhost","root","","coymentsensor");


	$sql = mysqli_query($konek, "SELECT * FROM tb_sensor ORDER BY id DESC");

	$data = mysqli_fetch_array($sql);
	$suhu = $data['suhu'];

	if($suhu == "") $suhu = 0;

	echo $suhu;


 ?>