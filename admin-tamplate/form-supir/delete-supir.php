<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_sopir WHERE id_sopir='$id'");
 
header("location:../supir.php?pesan=hapus");
?>