<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_tiket WHERE id_tiket='$id'");
 
header("location:../tiket.php?pesan=hapus");
?>