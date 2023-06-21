<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block">
                        <img src="" alt="">
                    </div> -->
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Tiket</h1>
                            </div>
                            <?php
                            include "../koneksi.php";
                            $id = $_GET['id'];
                            // $id_penumpang = $_GET['id_penumpang'];
                            $query_mysql = mysqli_query($conn, "SELECT * FROM tb_tiket WHERE id_tiket='$id'");
                            $nomor = 1;
                            $lokasi = "../site/aksi/data-berkas/";
                            while ($data = mysqli_fetch_array($query_mysql)) {
                                $id_penumpang = $data['id_penumpang'];
                                $id_rute = $data['id_rute'];
                            ?>
                                <form class="user" enctype="multipart/form-data" action="../aksi/aksi-update.php?update=tiket" method="POST">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control form-control-user" id="id_tiket" name="id_tiket" placeholder="Rute Perjalanan" value="<?php echo $data['id_tiket']; ?>">
                                        <input type="hidden" class="form-control form-control-user" id="id_tiket" name="id_penumpang" placeholder="Rute Perjalanan" value="<?php echo $data['id_penumpang']; ?>">
                                        <?php
                                        $query1 = mysqli_query($conn, "SELECT * from tb_penumpang where id_penumpang='$id_penumpang'");
                                        while ($data_penumpang = mysqli_fetch_array($query1)) {
                                            $nama = $data_penumpang['nama_penumpang'];
                                            ?>
                                            <input type="text" class="form-control form-control-user" id="rute" name="nama" placeholder="Nama Penumpang" value="<?php echo $nama ?>">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="rute" name="id_rute" placeholder="rute" value="<?php echo $data['id_rute']; ?>" hidden>
                                            <?php
                                            $query2 = mysqli_query($conn, "SELECT * from tb_rute where id_rute='$id_rute'");
                                            while ($data_rute = mysqli_fetch_array($query2)) {
                                                $rute = $data_rute['rute'];
                                            ?>
                                            <input type="text" class="form-control form-control-user" id="rute" name="rute" placeholder="Nama Penumpang" value="<?php echo $rute ?>">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="waktu" name="waktu" placeholder="waktu" value="<?php echo $data['waktu']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="alamat_penjemputan" placeholder="alamat Penjemputan" value="<?php echo $data['alamat_penjemputan'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="alamat_tujuan" placeholder="alamat Penjemputan" value="<?php echo $data['alamat_tujuan'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <img name="bukti_pembayaran" src="../../site/aksi/data-berkas/<?php echo $data['bukti_pembayaran'] ?>" width="400px" height="400px">
                                        <input type="file" class="form-control" name="bukti_pembayaran" placeholder="alamat Penjemputan" require>
                                    </div>
                                    <div class="form-group">
                                        <a href="../download.php?file=<?= $data['bukti_pembayaran'] ?>">Download</a>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">s
                                            <input type="text" class="form-control form-control-user" name="sts" placeholder="rute" value="Confirm">
                                        </div>
                                    </div>
                                    <hr>
                                    <input type="submit" class="btn btn-info btn-user btn-block" value="Update" name="update-tiket">
                                    <hr>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>