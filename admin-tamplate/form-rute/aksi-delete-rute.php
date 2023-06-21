<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_rute WHERE id_rute='$id'");
 
header("location:../index.php?pesan=hapus");
?>