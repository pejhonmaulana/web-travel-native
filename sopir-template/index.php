<?php
include "header.php"
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pribadi Supir</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sopir</h6>
        </div>
        <div class="card-body">
            <div class="my-2"></div>
            <div class="form-responsive">
                <?php
                include "koneksi.php";
                $id = $_GET['id'];
                $query_mysql = mysqli_query($conn, "SELECT * FROM tb_sopir WHERE id_users='$id'");
                while ($data = mysqli_fetch_array($query_mysql)) {

                    $id_sopir = $data['id_sopir'];
                    $nama = $data['nama_sopir'];
                    $email = $data['email'];
                    $alamat = $data['alamat'];
                    $no_tlp = $data['no_tlp'];
                    $pass = $data['pass'];

                ?>
                    <form class="user" action="aksi/aksi-update.php?update=supir" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input hidden type="text" class="form-control form-control" id="id" name="id_sopir" placeholder="id" value="<?php echo $id_sopir; ?>">
                                <input hidden type="text" class="form-control form-control" id="id" name="id_user" placeholder="id" value="<?php echo $id; ?>">
                                <input type="text" class="form-control form-control" id="nama" name="nama" placeholder="nama" value="<?php echo $nama; ?>">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control" id="email" name="email" placeholder="email" value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control" id="alamat" name="alamat" placeholder="alamat" value="<?php echo $alamat; ?>">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control" id="notelp" name="no_tlp" placeholder="notelp" value="<?php echo $no_tlp; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control" id="pass" name="pass" placeholder="pass" value="<?php echo md5($pass); ?>">
                            </div>
                        </div>
                        <hr>
                        <input type="submit" class="btn btn-info btn btn-block" value="Update" name="update-supir">
                        <hr>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
        </div>
        <div class="card-body">
            <div class="my-2"></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rute</th>
                            <th>Supir</th>
                            <th>Mobil</th>
                            <th>Penumpang</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Rute</th>
                            <th>Supir</th>
                            <th>Mobil</th>
                            <th>Penumpang</th>
                            <th>Tanggal</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $id_user = $_GET['id'];
                        $query = mysqli_query($conn, "SELECT * FROM tb_sopir where id_users = $id_user");
                        while ($data_supir = mysqli_fetch_assoc($query)) {
                            $id_sopir = $data_supir['id_sopir'];

                            $no = 1;
                            $sql = "SELECT * FROM tb_jadwal where id_sopir = $id_sopir";
                            $stmt = $conn->query($sql);
                            while ($data = $stmt->fetch_assoc()) {
                                $rute = $data['id_rute'];
                                $supir = $data['id_sopir'];
                                $mobil = $data['id_mobil'];
                                $penumpang = $data['id_penumpang'];
                                $tanggal = $data['Date'];
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <?php
                                    $query_rute = mysqli_query($conn, "SELECT * FROM tb_rute where id_rute = $rute");
                                    while ($data_rute = mysqli_fetch_assoc($query_rute)) {
                                    ?>
                                        <td><?php echo $data_rute['rute']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    $query_sopir = mysqli_query($conn, "SELECT * FROM tb_sopir where id_sopir = $supir");
                                    while ($data_sopir = mysqli_fetch_assoc($query_sopir)) {
                                    ?>
                                        <td><?php echo $data_sopir['nama_sopir']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    $query_mobil = mysqli_query($conn, "SELECT * FROM tb_mobil where id_mobil = $mobil");
                                    while ($data_mobil = mysqli_fetch_assoc($query_mobil)) {
                                    ?>
                                        <td><?php echo $data_mobil['jenis_mobil']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    $query_penumpang = mysqli_query($conn, "SELECT * FROM tb_penumpang where id_penumpang = $penumpang");
                                    while ($data_penumpang = mysqli_fetch_assoc($query_penumpang)) {
                                    ?>
                                        <td><?php echo $data_penumpang['nama_penumpang']; ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td><?php echo $tanggal;?></td>
                            <?php
                            }
                        }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php
include "footer.php";
?>