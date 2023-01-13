 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <?php 
	$id = $_GET['customer'];
	$hasil = $lihat -> customer_edit($id);
	// echo $hasil['nama'];
?>
 <a href="index.php?page=customer" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Balik </a>
 <h4>Edit Barang</h4>
 <?php if(isset($_GET['success'])){?>
 <div class="alert alert-success">
     <p>Edit Data Berhasil !</p>
 </div>
 <?php }?>
 <?php if(isset($_GET['remove'])){?>
 <div class="alert alert-danger">
     <p>Hapus Data Berhasil !</p>
 </div>
 <?php }?>
<div class="card card-body">
	<div class="table-responsive">
		<table class="table table-striped">
			<form action="fungsi/edit/edit.php?customer=edit" method="POST">
				<tr>
					<td>ID Customer</td>
					<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id'];?>"
							name="id"></td>
				</tr>
				
				<tr>
					<td>Nama Customer</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['nama'];?>" name="nama"></td>
				</tr>
				<tr>
					<td>No Telepon</td>
					<td><input type="number" class="form-control" value="<?php echo $hasil['notelp'];?>" name="notelp"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>
						<textarea class="form-control" value="<?php echo $hasil['alamat'];?>" name="alamat"></textarea>	
					</td>
				</tr>
				<tr><td>Nama Toko</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['namatoko'];?>" name="namatoko"></td>
				</tr>
				<tr>
					<td></td>
					<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
				</tr>
			</form>
		</table>
	</div>
</div>