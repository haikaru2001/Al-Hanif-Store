<?php

session_start();
if (!empty($_SESSION['admin'])) {
    require '../../config.php';
    if (!empty($_GET['kategori'])) {
        $nama= $_POST['kategori'];
        $tgl= date("j F Y, G:i");
        $data[] = $nama;
        $data[] = $tgl;
        $sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
    }

    if (!empty($_GET['kategoritransaksi'])) {
        $nama= $_POST['kategoritransaksi'];
        $tgl= date("j F Y, G:i");
        $data[] = $nama;
        $data[] = $tgl;
        $sql = 'INSERT INTO kategori_transaksi (nama,tgl_input) VALUES(?,?)';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=kategoritransaksi&&success=tambah-data"</script>';
    }

    if (!empty($_GET['customer'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $notelp = $_POST['notelp'];
        $alamat = $_POST['alamat'];
        $namatoko = $_POST['namatoko'];

        $data[] = $id;
        $data[] = $nama;
        $data[] = $notelp;
        $data[] = $alamat;
        $data[] = $namatoko;

        $sql = 'INSERT INTO customer (id,nama,notelp,alamat,namatoko) 
			    VALUES (?,?,?,?,?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=customer&success=tambah-data"</script>';
    }
    if (!empty($_GET['barang'])) {
        $id = $_POST['id'];
        $kategori = $_POST['kategori'];
        $nama = $_POST['nama'];
        $merk = $_POST['merk'];
        $beli = $_POST['beli'];
        $jual = $_POST['jual'];
        $satuan = $_POST['satuan'];
        $stok = $_POST['stok'];
        $tgl = $_POST['tgl'];

        $data[] = $id;
        $data[] = $kategori;
        $data[] = $nama;
        $data[] = $merk;
        $data[] = $beli;
        $data[] = $jual;
        $data[] = $satuan;
        $data[] = $stok;
        $data[] = $tgl;
        $sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
    }
    
    if (!empty($_GET['jual'])) {
        $id = $_GET['id'];

        // get tabel barang id_barang
        $sql = 'SELECT * FROM barang WHERE id_barang = ?';
        $row = $config->prepare($sql);
        $row->execute(array($id));
        $hsl = $row->fetch();

        $sql2 = 'SELECT * FROM penjualan';
        $row2 = $config->prepare($sql2);
        $row2->execute();
        $hsl2= $row2->fetch();

        if ($hsl['stok'] > 0) {
            if($id != $hsl2['id_barang']){
                $kasir =  $_GET['id_kasir'];
                $jumlah = 1;
                $total = $hsl['harga_jual'];
                $tgl = date("j F Y, G:i");
                

                $data1[] = $id;
                $data1[] = $kasir;
                $data1[] = $jumlah;
                $data1[] = $total;
                $data1[] = $tgl;
                

                $sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
                $row1 = $config -> prepare($sql1);
                $row1 -> execute($data1);

                echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
            }
            else{
                $adding[] = $hsl2['jumlah']+1;
                $adding[] = $hsl2['id_barang'];

                $sql3 = 'UPDATE penjualan SET jumlah=? WHERE id_barang=?';
                $row3 = $config -> prepare($sql3);
                $row3 -> execute($adding);
                echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
            }
        } else {
            echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="../../index.php?page=jual#keranjang"</script>';
        }
    }
}
