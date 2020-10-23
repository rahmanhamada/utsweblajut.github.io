<?php 
	if(isset($_SESSION['id_admin'])){
    $id_admin = $_SESSION['id_admin'];
	if((isset($_GET['aksi']))&&(isset($_GET['data']))){
		if($_GET['aksi']=='hapus'){
			$id_admin = $_GET['data'];
			//hapus jurusan
			$sql_dh = "delete from `admin` 
			where `id_admin` = '$id_admin'";
			mysqli_query($koneksi,$sql_dh);
		}
	}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=profil">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Data User</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah_user" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah User</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12">
                  <form method="post" action="index.php?include=user">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br><br><br>
				<!--untuk konfirmasi jika berhasil ditambahkan-->
				<div class="col-sm-12">
					   <?php if(!empty($_GET['notif'])){?>
						 <?php if($_GET['notif']=="tambahberhasil"){?>
							<div class="alert alert-success" role="alert">
							Data Berhasil Ditambahkan</div>
						 <?php } else if($_GET['notif']=="editberhasil"){?>
						   <div class="alert alert-success" role="alert">
						   Data Berhasil Diubah</div>
						 <?php }?>
					<?php }?>
				</div>
                <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="25%">Nama</th>
                        <th width="20%">Email</th>
                        <th width="20%">Username</th>
                        <th width="20%">Level</th>
                        <th width="10%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
							//menampilkan data sesuai halaman
							$batas = 2;
							if(!isset($_GET['halaman'])){
								 $posisi = 0;
								 $halaman = 1;
							}else{
								 $halaman = $_GET['halaman'];
								 $posisi = ($halaman-1) * $batas;
							} 
							
							//menampilkan data 
							$sql_h = "SELECT `id_admin`, `nama`, `email`, `username`, `level` FROM `admin`";
							if (isset($_POST["katakunci"])){
								  $katakunci_user = $_POST["katakunci"];
								  $_SESSION['katakunci_user'] = $katakunci_user;
								  $sql_h .= " where `nama` LIKE '%$katakunci_user%'";
							} 
							$sql_h .= " order by `nama` limit $posisi, $batas ";
							
						  $query_h = mysqli_query($koneksi,$sql_h);
						  $no=$posisi+1;
						  while($data_h = mysqli_fetch_row($query_h)){
						  $id_admin = $data_h[0];
						  $nama = $data_h[1];
						  $email = $data_h[2];
						  $username = $data_h[3];
						  $level = $data_h[4];
					?>	
						 <tr>
						   <td><?php echo $no;?></td>
						   <td><?php echo $nama;?></td>
						   <td><?php echo $email;?></td>
						   <td><?php echo $username;?></td>
						   <td><?php echo $level;?></td>
						   <td>
						   <a href="index.php?include=edit_user&data=<?php echo $id_admin;?>" 
						   class="btn btn-xs btn-info">
						   <i class="fas fa-edit"></i> Edit</a>
						   <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama; ?>?'))
						   window.location.href = 'index.php?include=user&aksi=hapus&data=<?php echo $id_admin;?>'" 
						  class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Hapus 
						  </a> 
						 </td>
						</tr>
					<?php
					$no++;
					}?>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
			  <?php
					//hitung jumlah semua data 	
						$sql_jum = "SELECT `id_admin`, `nama`, `email`, `username`, `level` FROM `admin`"; 
						if (isset($_SESSION["katakunci_user"])){
							  $katakunci_user = $_SESSION["katakunci_user"];
							  $sql_jum .= " where `nama` LIKE '%$katakunci_user%'";
						} 
						 $sql_jum .= " order by `nama`";

						$query_jum = mysqli_query($koneksi,$sql_jum);
						$jum_data = mysqli_num_rows($query_jum);
						$jum_halaman = ceil($jum_data/$batas);
				?>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <?php 
							if($jum_halaman==0){
							   //tidak ada halaman
							}else if($jum_halaman==1){
							   echo "<li class='page-item'><a class='page-link'>1</a></li>";
							}else{
							   $sebelum = $halaman-1;
							   $setelah = $halaman+1;                  
								 if($halaman!=1){
									echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=1'>First</a></li>";
									echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$sebelum'>«</a></li>";
								 }
								 //menampilkan angka halaman
								 for($i=1; $i<=$jum_halaman; $i++){
									if($i!=$halaman){
									   echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$i'>$i</a></li>";
									}else{
									   echo "<li class='page-item'><a class='page-link'>$i</a></li>";
									}
								 }
								 if($halaman!=$jum_halaman){
									echo "<li class='page-item'><a class='page-link'  href='index.php?include=user&halaman=$setelah'>»</a></li>";
									echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$jum_halaman'>Last</a></li>";
								 }
							}?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
<?php } ?>