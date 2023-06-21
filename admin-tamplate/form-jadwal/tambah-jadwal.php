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
                                <h1 class="h4 text-gray-900 mb-4">Tambah Jadwal</h1>
                            </div>
                            <form class="user" action="../aksi/aksi-tambah.php?tambah=jadwal" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-select form-control" name="rute" aria-label="Default select example">
                                            <option selected>Pilih Rute Perjalanan</option>
                                            <?php
                                            include '../koneksi.php';
                                            $query_rute = mysqli_query($conn, "SELECT * FROM tb_rute");
                                            while ($data = mysqli_fetch_array($query_rute)) {
                                                $id_rute = $data['id_rute'];
                                                $rute = $data['kode'];
                                                $harga = $data['harga'];
                                            ?>
                                                <option value="<?php echo $id_rute; ?>"><?php echo $rute; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-select form-select-sm form-control" name="supir" aria-label="Default select example">
                                            <option selected>Pilih Supir</option>
                                            <?php
                                            include '../koneksi.php';
                                            $query_supir = mysqli_query($conn, "SELECT * FROM tb_sopir");
                                            while ($data = mysqli_fetch_array($query_supir)) {
                                                $id_supir = $data['id_sopir'];
                                                $nama = $data['nama_sopir'];
                                            ?>
                                                <option value="<?php echo $id_supir; ?>"><?php echo $nama; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-select form-select-sm form-control" name="mobil" aria-label="Default select example">
                                            <option selected>Pilih Mobil</option>
                                            <?php
                                            include '../koneksi.php';
                                            $query_mobil = mysqli_query($conn, "SELECT * FROM tb_mobil");
                                            while ($data = mysqli_fetch_array($query_mobil)) {
                                                $id_mobil = $data['id_mobil'];
                                                $jenis = $data['jenis_mobil'];
                                            ?>
                                                <option value="<?php echo $id_mobil; ?>"><?php echo $jenis; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="date" class="form-control form-control" id="jenis" name="tanggal"
                                        placeholder="Tanggal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../koneksi.php';
                                            $penumpang = mysqli_query($conn, "SELECT * FROM tb_penumpang");
                                            while ($data_penumpang = mysqli_fetch_array($penumpang)) { ?>
                                                <tr>
                                                    <td><input type="checkbox" name="penumpang[]" value="<?php echo $data_penumpang['id_penumpang'] ?>"></td>
                                                    <td><?php echo $data_penumpang['id_penumpang']; ?></td>
                                                    <td><?php echo $data_penumpang['nama_penumpang']; ?></td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <input type="submit" class="btn btn-info btn-user btn-block" value="Tambah" name="tambah-supir">
                                <hr>
                            </form>
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