<?php

// require_once ("../koneksi.php");

if (isset($_POST['register'])) {

    // filter data yang diinputkan
    $nama_penumpang = $_POST['nama_penumpang'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $level = "customer";
    // enkripsi password
    $pass = md5($_POST['pass']);
    $email = $_POST['email'];

    include "site/koneksi.php";

    $sql = "INSERT INTO tb_user (email, pass, level) VALUES ('$email', '$pass', '$level')";
    // // $stmt = $conn->query($sql);
    
    // // $stmt1 = $conn->query($sql1);
    if ($conn->query($sql) === TRUE) {
        echo "berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $idUser = mysqli_insert_id($conn);

    $sql1 = "INSERT INTO tb_penumpang (id_users, nama_penumpang, email, alamat, no_telp, pass) VALUES ('$idUser', '$nama_penumpang', '$email', '$alamat', '$no_telp', '$pass')";
    if ($conn->query($sql1) === TRUE) {
        header("Location:index.html");
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

    // Tutup conn
    $conn->close();
}
