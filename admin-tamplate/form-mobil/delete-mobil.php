<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_mobil WHERE id_mobil='$id'");
 
header("location:../mobil.php?pesan=hapus");
?>