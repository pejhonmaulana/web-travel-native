<?php

$tambah = $_GET['tambah'];
if ($tambah == 'supir') {

    // filter data yang diinputkan
    $nama_sopir = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $level = "supir";
    // enkripsi password
    $pass = md5($_POST['pass']);
    $email = $_POST['email'];

    include "../koneksi.php";

    $sql = "INSERT INTO tb_user (email, pass, level) VALUES ('$email', '$pass', '$level')";
    // // $stmt = $conn->query($sql);

    // // $stmt1 = $conn->query($sql1);
    if ($conn->query($sql) === TRUE) {
        echo "berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $idUser = mysqli_insert_id($conn);

    $sql1 = "INSERT INTO tb_sopir (id_users, nama_sopir, email, alamat, no_tlp, pass) VALUES ('$idUser', '$nama_sopir', '$email', '$alamat', '$no_telp', '$pass')";
    if ($conn->query($sql1) === TRUE) {
        header("Location:../supir.php");
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

    // Tutup conn
    $conn->close();
} elseif ($tambah == 'mobil') {
    // filter data yang diinputkan
    $jenis = $_POST['jenis'];
    $nopol = $_POST['nopol'];
    $kapasitas = $_POST['kapasitas'];

    include "../koneksi.php";
    $sql = "INSERT INTO tb_mobil (jenis_mobil, nopol, kapasitas) VALUES ('$jenis', '$nopol', '$kapasitas')";
    if ($conn->query($sql) === TRUE) {
        header("Location:../mobil.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup conn
    $conn->close();
} elseif ($tambah == 'rute') {
    // filter data yang diinputkan
    $rute = $_POST['rute'];
    $harga = $_POST['harga'];
    $kode = $_POST['kode'];

    include "../koneksi.php";
    $sql = "INSERT INTO tb_rute (rute, harga, kode) VALUES ('$rute', '$harga', '$kode')";
    if ($conn->query($sql) === TRUE) {
        header("Location:../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup conn
    $conn->close();
} elseif($tambah == 'jadwal'){
    include '../koneksi.php';
    $rute = $_POST['rute'];
    $supir = $_POST['supir'];
    $mobil = $_POST['mobil'];
    $tanggal = $_POST['tanggal'];
    $penumpang = $_POST['penumpang'];
    $jumlah = count($penumpang);
    for ($i=0; $i < $jumlah; $i++) { 
        $query = mysqli_query($conn, "INSERT INTO tb_jadwal VALUES (' ', '$rute', '$supir', '$mobil', '$penumpang[$i]', '$tanggal')");
    }
    if ($query == True) {
        header('location:../jadwal.php');
    }
    else{
        echo mysqli_error($koneksi);
    }
}
