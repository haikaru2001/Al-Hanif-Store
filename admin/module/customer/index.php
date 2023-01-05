<h4>Data Customer</h4>
        <br />
        
        <?php if(isset($_GET['success'])){?>
        <div class="alert alert-success">
            <p>Tambah Data Berhasil !</p>
        </div>
        <?php }?>
        <?php if(isset($_GET['remove'])){?>
        <div class="alert alert-danger">
            <p>Hapus Data Berhasil !</p>
        </div>
        <?php }?>

        
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-primary btn-md mr-2" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Insert Data</button>
        <a href="index.php?page=customer" class="btn btn-success btn-md">
            <i class="fa fa-refresh"></i> Refresh Data</a>
        <div class="clearfix"></div>
        <br />
        <!-- view barang -->
        <div class="card card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" id="example1">
                    <thead>
                        <tr style="background:#DFF0D8;color:#333;">
                            <th>No.</th>
                            <th>ID Customer</th>
                            <th>Nama</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Nama Toko</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
						$hasil = $lihat -> customer();
						$no=1;
						foreach($hasil as $isi) {
					?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $isi['id'];?></td>
                            <td><?php echo $isi['nama'];?></td>
                            <td><?php echo $isi['notelp'];?></td>
                            <td><?php echo $isi['alamat'];?></td>
                            <td><?php echo $isi['namatoko'];?></td>
                            <td>

                                <a href="index.php?page=customer/edit&id=<?php echo $isi['id'];?>"><button
                                        class="btn btn-warning btn-xs">Edit</button></a>
                                <a href="fungsi/hapus/hapus.php?customer=hapus&id=<?php echo $isi['id'];?>"
                                    onclick="javascript:return confirm('Hapus Data costumer ?');"><button
                                        class="btn btn-danger btn-xs">Hapus</button></a>
                        </tr>
                        <?php $no++;}?>
                        
                        
                    </tbody>
                    
                </table>
            </div>
        </div>
        <!-- end view barang -->
        <!-- tambah barang MODALS-->
        <!-- Modal -->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style=" border-radius:0px;">
                    <div class="modal-header" style="background:#285c64;color:#fff;">
                        <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Customer</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="fungsi/tambah/tambah.php?customer=tambah" method="POST">
                        <div class="modal-body">
                            <table class="table table-striped bordered"> 
                                <tr>
                                    <td>Nama Customer</td>
                                    <td><input type="text" placeholder="Nama Customer" required class="form-control"
                                            name="nama"></td>
                                </tr>
                                <tr>
                                    <td>No Telepon</td>
                                    <td><input type="text" placeholder="No Telepon" required class="form-control"
                                            name="notelp"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><textarea placeholder="Alamat" name = "alamat" required class="form-control"></textarea>
                                        <!-- <input type="text" placeholder="Alamat" required class="form-control"
                                            name="alamat"> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Toko</td>
                                    <td><input type="text" placeholder="Nama Toko" required class="form-control"
                                            name="namatoko"></td>
                                </tr>
                                
                                
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert
                                Data</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>