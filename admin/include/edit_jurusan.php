<?php 
	if(isset($_GET['data'])){
		$kode_jurusan = $_GET['data'];
		$_SESSION['kode_jurusan']=$kode_jurusan;
		
	  //get data jurusan
		$sql_d = "select `jurusan` from `jurusan` where `kode_jurusan` = '$kode_jurusan'";
	$query_d = mysqli_query($koneksi,$sql_d);
	while($data_d = mysqli_fetch_row($query_d)){
	     $jurusan= $data_d[0];
	}
	}
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Jurusan</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=profil">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=jurusan">Jurusan</a></li>
              <li class="breadcrumb-item active">Edit Jurusan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Jurusan</h3>
        <div class="card-tools">
          <a href="index.php?include=jurusan" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
		<div class="col-sm-10">
		   <?php if(!empty($_GET['notif'])){?>
			<?php if($_GET['notif']=="editkosong"){?>
	      <div class="alert alert-danger" role="alert">
	      Maaf data jurusan wajib di isi</div>
	   <?php }?>
	<?php }?>
	</div>

   <form class="form-horizontal" action="index.php?include=konfirmasi_edit_jurusan" method="post">
	        <div class="card-body">
	          <div class="form-group row">
	            <label for="jurusan" 
	             class="col-sm-3 col-form-label">Jurusan</label>
	            <div class="col-sm-7">
	              <input type="text" class="form-control" 
	              id="jurusan" name="jurusan" value="<?php echo $jurusan;?>">
	            </div>
	          </div>
	        </div>
	        <!-- /.card-body -->
	        <div class="card-footer">
	          <div class="col-sm-10">
	            <button type="submit" class="btn btn-info float-right">
	            <i class="fas fa-save"></i> Simpan</button>
	          </div>  
	        </div>
	        <!-- /.card-footer -->
	</form> 

    </div>
    <!-- /.card -->

    </section>
