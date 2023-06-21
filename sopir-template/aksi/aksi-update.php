<?php
$update = $_GET['update'];

if ($update == 'supir') {
      // filter data yang diinputkan
      $id = $_POST['id_sopir'];
      $id_user = $_POST['id_user'];
      $nama_sopir = $_POST['nama'];
      $alamat = $_POST['alamat'];
      $no_tlp = $_POST['no_tlp'];
      $pass = md5($_POST['pass']);
  
      include "../koneksi.php";
      $sql = "UPDATE tb_sopir SET nama_sopir='$nama_sopir', alamat='$alamat', no_tlp='$no_tlp', pass='$pass' WHERE id_sopir='$id'";
      if ($conn->query($sql) === TRUE) {
          header("Location:../index.php?id=$id_user");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      // Tutup conn
      $conn->close();
} 
