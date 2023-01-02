<?php

session_start();
if (!empty($_SESSION['admin'])) {
    require '../../config.php';
    if (!empty($_GET['kategori'])) {
        $id= $_GET['id'];
        $data[] = $id;
        $sql = 'DELETE FROM kategori WHERE id_kategori=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=kategori&&remove=hapus-data"</script>';
    }

    if (!empty($_GET['kategoritransaksi'])) {
        $id= $_GET['id'];
        $data[] = $id;
        $sql = 'DELETE FROM kategori_transaksi WHERE id=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=kategoritransaksi&&remove=hapus-data"</script>';
    }

    if (!empty($_GET['barang'])) {
        $id= $_GET['id'];
        $data[] = $id;
        $sql = 'DELETE FROM barang WHERE id_barang=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=barang&&remove=hapus-data"</script>';
    }

    if (!empty($_GET['customer'])) {
        $id= $_GET['id'];
        $data[] = $id;
        $sql = 'DELETE FROM customer WHERE id=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=customer&&remove=hapus-data"</script>';
    }

    if (!empty($_GET['jual'])) {
        $dataI[] = $_GET['brg'];
        $sqlI = 'select*from barang where id_barang=?';
        $rowI = $config -> prepare($sqlI);
        $rowI -> execute($dataI);
        $hasil = $rowI -> fetch();

        /*$jml = $_GET['jml'] + $hasil['stok'];

        $dataU[] = $jml;
        $dataU[] = $_GET['brg'];
        $sqlU = 'UPDATE barang SET stok =? where id_barang=?';
        $rowU = $config -> prepare($sqlU);
        $rowU -> execute($dataU);*/

        $id = $_GET['id'];
        $data[] = $id;
        $sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=jual"</script>';
    }

    if (!empty($_GET['penjualan'])) {
        $sql = 'DELETE FROM penjualan';
        $row = $config -> prepare($sql);
        $row -> execute();
        echo '<script>window.location="../../index.php?page=jual"</script>';
    }
    
    if (!empty($_GET['laporan'])) {
        $sql = 'DELETE FROM nota';
        $row = $config -> prepare($sql);
        $row -> execute();
        echo '<script>window.location="../../index.php?page=laporan&remove=hapus"</script>';
    }
}
