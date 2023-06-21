<?php
$update = $_GET['update'];

if ($update == 'supir') {
      // filter data yang diinputkan
      $id = $_POST['id_sopir'];
      $nama_sopir = $_POST['nama_sopir'];
      $alamat = $_POST['alamat'];
      $no_tlp = $_POST['no_tlp'];
  
      include "../koneksi.php";
      $sql = "UPDATE tb_sopir SET nama_sopir='$nama_sopir', alamat='$alamat', no_tlp='$no_tlp' WHERE id_sopir='$id'";
      if ($conn->query($sql) === TRUE) {
          header("Location:../supir.php");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      // Tutup conn
      $conn->close();
} elseif ($update == 'mobil') {
    // filter data yang diinputkan
    $id = $_POST['id_mobil'];
    $jenis = $_POST['jenis'];
    $nopol = $_POST['nopol'];
    $kapasitas = $_POST['kapasitas'];

    include "../koneksi.php";
    $sql = "UPDATE tb_mobil SET jenis_mobil='$jenis', nopol='$nopol', kapasitas='$kapasitas' WHERE id_mobil='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location:../mobil.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup conn
    $conn->close();
    $id = $_POST['id_rute'];
    $rute = $_POST['rute'];
    $harga = $_POST['harga'];
    $kode = $_POST['kode'];

    include "../koneksi.php";
    $sql = "UPDATE tb_rute SET rute='$rute', harga='$harga', kode='$kode' WHERE id_rute='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location:../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup conn
    $conn->close();
}elseif ($update == 'tiket') {
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

    // $targetDir = "../site/aksi/data-berkas/";
    // $targetFilePath = $targetDir . $bukti_pembayaran;
    // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    // $angka_random = rand(1,999);
    // $bukti_baru = $angka_random.'-'.$bukti_pembayaran;

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
