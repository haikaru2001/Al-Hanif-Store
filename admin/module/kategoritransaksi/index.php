<h4>Kategori Transaksi</h4>
<br />
<?php if(isset($_GET['success'])){?>
<div class="alert alert-success">
    <p>Tambah Data Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['success-edit'])){?>
<div class="alert alert-success">
    <p>Update Data Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['remove'])){?>
<div class="alert alert-danger">
    <p>Hapus Data Berhasil !</p>
</div>
<?php }?>
<?php 
	if(!empty($_GET['uid'])){
	$sql = "SELECT * FROM kategori_transaksi WHERE id = ?";
	$row = $config->prepare($sql);
	$row->execute(array($_GET['uid']));
	$edit = $row->fetch();
?>
<form method="POST" action="fungsi/edit/edit.php?kategoritransaksi=edit">
    <table>
        <tr>
            <td style="width:25pc;"><input type="text" class="form-control" value="<?= $edit['nama'];?>"
                    required name="kategoritransaksi" placeholder="Masukan Kategori Barang Baru">
                <input type="hidden" name="id" value="<?= $edit['id'];?>">
            </td>
            <td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i>
                    Ubah Data</button></td>
        </tr>
    </table>
</form>
<?php }else{?>
<form method="POST" action="fungsi/tambah/tambah.php?kategoritransaksi=tambah">
    <table>
        <tr>
            <td style="width:25pc;"><input type="text" class="form-control" required name="kategoritransaksi"
                    placeholder="Masukan Kategori Transaksi Baru"></td>
            <td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-plus"></i>
                    Insert Data</button></td>
        </tr>
    </table>
</form>
<?php }?>
<br />
<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="example1">
            <thead>
                <tr style="background:#DFF0D8;color:#333;">
                    <th>No.</th>
                    <th>Kategori Transaksi</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
				$hasil = $lihat -> kategoritransaksi();
				$no=1;
				foreach($hasil as $isi){
			?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $isi['nama'];?></td>
                    <td><?php echo $isi['tgl_input'];?></td>
                    <td>
                        <a href="index.php?page=kategoritransaksi&uid=<?php echo $isi['id'];?>"><button
                                class="btn btn-warning">Edit</button></a>
                        <a href="fungsi/hapus/hapus.php?kategoritransaksi=hapus&id=<?php echo $isi['id'];?>"
                            onclick="javascript:return confirm('Hapus Data Kategori ?');"><button
                                class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>
                <?php $no++; }?>
            </tbody>
        </table>
    </div>
</div>