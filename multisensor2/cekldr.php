<?php 

	$konek = mysqli_connect("localhost","root","","coymentsensor");


	$sql = mysqli_query($konek, "SELECT * FROM tb_sensor ORDER BY id DESC");

	$data = mysqli_fetch_array($sql);
	$ldr = $data['ldr'];

	if($ldr == "") $ldr = 0;

	echo $ldr;


 ?>