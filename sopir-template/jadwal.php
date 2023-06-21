<?php
include "header.php"
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jadwal</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
        </div>
        <div class="card-body">
            <a href="form-jadwal/tambah-jadwal.php" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-solid fa-plus"></i>
                </span>
                <span class="text">Tambah Jadwal</span>
            </a>
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
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Rute</th>
                            <th>Supir</th>
                            <th>Mobil</th>
                            <th>Penumpang</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $sql = "SELECT * FROM tb_jadwal";
                        $stmt = $conn->query($sql);
                        while ($data = $stmt->fetch_assoc()) {
                            $rute = $data['id_rute'];
                            $supir = $data['id_sopir'];
                            $mobil = $data['id_mobil'];
                            $penumpang = $data['id_penumpang'];
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

                                <td>
                                    <a href="form-rute/update-rute.php?id=<?php echo $data['id_rute']; ?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <a href="aksi-rute/aksi-delete-rute.php?id=<?php echo $data['id_rute']; ?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            <?php
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