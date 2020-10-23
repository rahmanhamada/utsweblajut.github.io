<?php 
	session_start();
	include('../koneksi/koneksi.php');
	if(isset($_GET["include"])){
	  $include = $_GET["include"];
	  if($include=="konfirmasi_login"){
	    include("include/konfirmasi_login.php");
	  }else if($include=="sign_out"){
	    include("include/sign_out.php");
		
	  }else if($include=="konfirmasi_tambah_hobi"){
	    include("include/konfirmasi_tambah_hobi.php");
	  }else if($include=="konfirmasi_edit_hobi"){
	    include("include/konfirmasi_edit_hobi.php");
		
	  }else if($include=="konfirmasi_tambah_jurusan"){
	    include("include/konfirmasi_tambah_jurusan.php");
	  }else if($include=="konfirmasi_edit_jurusan"){
	    include("include/konfirmasi_edit_jurusan.php");
		
	  }else if($include=="konfirmasi_tambah_mahasiswa"){
	    include("include/konfirmasi_tambah_mahasiswa.php");
	  }else if($include=="konfirmasi_edit_mahasiswa"){
	    include("include/konfirmasi_edit_mahasiswa.php");
	
      }else if($include=="konfirmasi_tambah_user"){
	    include("include/konfirmasi_tambah_user.php");
	  }else if($include=="konfirmasi_edit_user"){
	    include("include/konfirmasi_edit_user.php");
		
	  }else if($include=="konfirmasi_edit_profil"){
	    include("include/konfirmasi_edit_profil.php");
	  }
 
	}
	?>
<!DOCTYPE html>
<html>
<head>
  <?php include("includes/head.php")?>
</head>
	<?php
	//cek ada get include
	if(isset($_GET["include"])){
		$include = $_GET["include"];
		  //cek apakah ada session id admin
		  if(isset($_SESSION['id_admin'])){

		//pemanggilan ke halaman-halaman menu admin

	    ?>
	    <body class="hold-transition sidebar-mini layout-fixed">
			<div class="wrapper">
				<?php include("includes/header.php")?>
				<?php include("includes/sidebar.php")?>
			 
				  <!-- Content Wrapper. Contains page content -->
				  <div class="content-wrapper">
					<?php
					if($include=="hobi"){
						include("include/hobi.php");
					}else if($include=="tambah_hobi"){
						include("include/tambah_hobi.php");
					}else if($include=="edit_hobi"){
						include("include/edit_hobi.php");
						
					}else if($include=="jurusan"){
						include("include/jurusan.php");
					}else if($include=="tambah_jurusan"){
						include("include/tambah_jurusan.php");
					}else if($include=="edit_jurusan"){
						include("include/edit_jurusan.php");
						
					}else if($include=="mahasiswa"){
						include("include/mahasiswa.php");
					}else if($include=="tambah_mahasiswa"){
						include("include/tambah_mahasiswa.php");
					}else if($include=="edit_mahasiswa"){
						include("include/edit_mahasiswa.php");
					}else if($include=="detail_mahasiswa"){
						include("include/detail_mahasiswa.php");
					
					}else if($include=="user"){
						include("include/user.php");
					}else if($include=="tambah_user"){
						include("include/tambah_user.php");
					}else if($include=="edit_user"){
						include("include/edit_user.php");
						
					}else if($include=="edit_profil"){
						include("include/edit_profil.php");
					}else{
					  include("include/profil.php");
					}?>
					
					<!-- /.content -->
					</div>
					<!-- /.content-wrapper -->
					<?php include("includes/footer.php")?>
					
				  <?php include("includes/script.php")?>
			
			</div>
	      </body>
		<?php
		
		}else{  
			//pemanggilan halaman form login	
			  include("include/login.php");
		}		  
	}else{
	  //jika tidak ada include pemanggilan halaman form login
	  include("include/login.php");
	}
		?>   

</html>
