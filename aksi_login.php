<?php 
session_start();
include "site/koneksi.php";
$email = $_POST['email'];
$pass = md5($_POST['pass']);
if(isset($_POST['login'])){
    $sql = mysqli_query($conn,"SELECT * FROM tb_user WHERE email='$email' AND pass='$pass'");
    if(mysqli_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($sql);
        $id = $qry['id_user'];
        $_SESSION['email'] = $qry['email'];
        $_SESSION['pass'] = $qry['pass'];
        $_SESSION['level'] = $qry['level'];
        if($qry['level']=="customer"){
            header("location:customer/index.php?id=$id");
        }
        else if($qry['level']=="admin"){
            header("location:admin-tamplate/index.php");
        }
        else if($qry['level']=="supir"){
            header("location:sopir-template/index.php?id=$id");
        }
    }else{
        ?>
        <script language="JavaScript">
            alert('email atau pass tidak sesuai. Silahkan diulang kembali!');
            document.location='index.php';
        </script>
        <?php
    }
}
?>