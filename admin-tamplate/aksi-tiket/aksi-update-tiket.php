<?php

// require_once ("../koneksi.php");

if (isset($_POST['update-tiket'])) {

    include "../koneksi.php";
    // filter data yang diinputkan
    $id = $_POST['id_tiket'];
    $id_penumpang = $_POST['id_penumpang'];
    $id_rute = $_POST['id_rute'];
    $alamat_penjemputan = $_POST['alamat_penjemputan'];
    $alamat_tujuan = $_POST['alamat_tujuan'];
    $waktu = $_POST['waktu'];
    $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
    $sts = "Confirm";

    $targetDir = "../site/aksi/data-berkas/";
    $targetFilePath = $targetDir . $bukti_pembayaran;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $angka_random = rand(1,999);
    $bukti_baru = $angka_random.'-'.$bukti_pembayaran;

    // echo $id_penumpang;
    // echo $rute;

    $insert = $conn->query("UPDATE tb_tiket SET id_penumpang = '$id_penumpang', id_rute = '$id_rute', alamat_penjemputan = '$alamat_penjemputan', alamat_tujuan = '$alamat_tujuan', waktu = '$waktu', sts = '$sts' where id_tiket = $id");
    if($insert === true){
        header("location:../tiket.php");
    }else{
        $statusMsg = "File upload failed, please try again.";
    } 
    $conn->close();
}
