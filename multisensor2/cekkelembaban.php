<?php 

	$konek = mysqli_connect("localhost","root","","coymentsensor");


	$sql = mysqli_query($konek, "SELECT * FROM tb_sensor ORDER BY id DESC");

	$data = mysqli_fetch_array($sql);
	$kelembaban = $data['kelembaban'];

	if($kelembaban == "") $kelembaban = 0;

	echo $kelembaban;


 ?>