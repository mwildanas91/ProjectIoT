<?php 



$konek = mysqli_connect("localhost","root","","coymentsensor");

		$suhu = $_GET['suhu'];
		$kelembaban = $_GET['kelembaban'];
		$ldr = $_GET['ldr'];

		mysqli_query($konek, "ALTER TABLE tb_sensor AUTO_INCREMENT = 1");

		$simpan = mysqli_query($konek, "insert into tb_sensor(suhu, 
			kelembaban, ldr)values('$suhu','$kelembaban','$ldr')");

		if($simpan)
			echo "Berhasil dikirim";
		else
			echo "Gagal dikirim";


 ?>