<?php 
	include('../koneksi/koneksi.php');
	session_start();
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	$_SESSION['nama']=$nama;
	$_SESSION['email']=$email;
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	$_SESSION['level']=$level;
	if(empty($nama)){
	header("Location:index.php?include=tambah_user&notif=tambahkosong&jenis=nama");
	}else if(empty($email)){
	header("Location:index.php?include=tambah_user&notif=tambahkosong&jenis=email");
	}else if(empty($username)){
	header("Location:index.php?include=tambah_user&notif=tambahkosong&data=username");
	}else if(empty($password)){
	header("Location:index.php?include=tambah_user&notif=tambahkosong&data=password");
	}else{
	$sql = "insert into `admin` (`nama`, `email`, `username`, `password`, `level`) 
	values ('$nama', '$email', '$username', '$password', '$level')";
	mysqli_query($koneksi,$sql);
	header("Location:index.php?include=user&notif=tambahberhasil");
	unset($_SESSION['nama']);
	unset($_SESSION['email']);
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['level']);
	header("Location:index.php?include=user&notif=tambahberhasil");
	}
	?>