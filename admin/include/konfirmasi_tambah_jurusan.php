<?php 
	$jurusan = $_POST['jurusan'];
	if(empty($jurusan)){
		header("Location:index.php?include=tambah_jurusan&notif=tambahkosong");
	}else{
		$sql = "insert into `jurusan` (`jurusan`) 
		values ('$jurusan')";
		mysqli_query($koneksi,$sql);
	header("Location:index.php?include=jurusan&notif=tambahberhasil");	
	}
	?>
