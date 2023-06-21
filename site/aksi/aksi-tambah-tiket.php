<?php

// // require_once ("../koneksi.php");

// if (isset($_POST['tambah-tiket'])) {

//     // filter data yang diinputkan
//     $nama_penumpang = $_POST['nama_penumpang'];
//     $query_id_penumpang = "SELECT id_penumpang FROM tb_penumpang WHERE nama_penumpang='$nama_penumpang'";
//     $id_penumpang = $conn->query($query_id_penumpang);

//     $rute = $_POST['rute'];
//     $query_id_rute = "SELECT id_rute FROM tb_rute WHERE rute='$rute'";
//     $id_rute = $conn->query($query_id_rute);

//     $alamat_jemput = $_POST['alamat_penjemputan'];
//     $alamat_tujuan = $_POST['alamat_tujuan'];
//     $waktu = $_POST['Date'];
//     $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
//     $nama_berkas = $_FILES['bukti_pembayaran']['tmp_name'];
//     $status = "belum dikonfirmasi";

//     $lokasi = "../data-berkas/";
//     $aksi_upload = move_uploaded_file($nama_berkas, $lokasi.$bukti_pembayaran);

//     include "../koneksi.php";
//     $sql = "INSERT INTO tb_tiket (id_penumpang, id_rute, alamat_penjemputan, alamat_tujuan, waktu, bukti_pembayaran, sts) 
//             VALUES ('$id_penumpang', '$id_rute', '$alamat_jemput', '$alamat_tujuan', '$waktu', '$bukti_pembayaran', '$status')";
//     if ($conn->query($sql) === TRUE) {
//         header("Location:../home.php?id=$id_penumpang");
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }

//     // Tutup conn
//     $conn->close();
// }

include '../koneksi.php';
if (isset($_POST['tambah-tiket'])) {
    $id_penumpang = $_POST['id_penumpang'];
    // $id_penumpang = mysqli_query($conn, "SELECT id_penumpang FROM tb_penumpang WHERE nama_penumpang='$nama_penumpang'");
    // $id_penumpang = $conn->query($query_id_penumpang);

    $rute = $_POST['rute'];
    // $query_id_rute = "SELECT id_rute FROM tb_rute WHERE kode='$rute'";
    // $id_rute = $conn->query($query_id_rute);

    $alamat_jemput = $_POST['alamat_penjemputan'];
    $alamat_tujuan = $_POST['alamat_tujuan'];
    $waktu = $_POST['tanggal'];
    $status = "belum";

    $query = mysqli_query($conn, "SELECT id_users from tb_penumpang where id_penumpang = $id_penumpang");
    if(mysqli_num_rows($query)==1){//jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($query);
        $id = $qry['id_users'];
    }
    // File upload path
    $targetDir = "data-berkas/";
    $fileName = basename($_FILES['bukti_pembayaran']["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // echo $id_penumpang;
    // echo $rute;

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT INTO tb_tiket (id_penumpang, id_rute, alamat_penjemputan, alamat_tujuan, waktu, bukti_pembayaran, sts) 
                       VALUES ('$id_penumpang', '$rute', '$alamat_jemput', '$alamat_tujuan', '$waktu', '$fileName', '$status')");
            if($insert === true){
                
                header("location:../home.php?id=$id");
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }
    else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}
