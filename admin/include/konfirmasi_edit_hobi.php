<?php 
	if(isset($_SESSION['kode_hobi'])){
	  $kode_hobi = $_SESSION['kode_hobi'];
	  $hobi = $_POST['hobi'];	 
	   if(empty($hobi)){
	 	    header("Location:index.php?include=edit_hobi&data=".$kode_hobi."&notif=editkosong");
	  }else{
		$sql = "update `hobi` set `hobi`='$hobi' 
		where `kode_hobi`='$kode_hobi'";
		mysqli_query($koneksi,$sql);
		header("Location:index.php?include=hobi&notif=editberhasil");
	  }
	}
	?>
