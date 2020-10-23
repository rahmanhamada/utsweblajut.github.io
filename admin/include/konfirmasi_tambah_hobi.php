<?php 
	$hobi = $_POST['hobi'];
	if(empty($hobi)){
		header("Location:index.php?include=tambah_hobi&notif=tambahkosong");
	}else{
		$sql = "insert into `hobi` (`hobi`) 
		values ('$hobi')";
		mysqli_query($koneksi,$sql);
	header("Location:index.php?include=hobi&notif=tambahberhasil");	
	}
	?>
