<?php
include "header.php"
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Tiket</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tiket</h6>
        </div>
        <div class="card-body">
            <a href="tambah-rute.php" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-solid fa-plus"></i>
                </span>
                <span class="text">Tambah Rute</span>
            </a>
            <div class="my-2"></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penumpang</th>
                            <th>Rute</th>
                            <th>Alamat Penjemputan</th>
                            <th>Alamat Tujuan</th>
                            <th>Waktu</th>
                            <th>Bukti pembayaran</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Penumpang</th>
                            <th>Rute</th>
                            <th>Alamat Penjemputan</th>
                            <th>Alamat Tujuan</th>
                            <th>Waktu</th>
                            <th>Bukti pembayaran</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $sql = "SELECT * FROM tb_tiket";
                        $stmt = $conn->query($sql);
                        while ($data = $stmt->fetch_assoc()) {
                            $id_penumpang = $data['id_penumpang'];
                            $id_rute = $data['id_rute'];
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <?php
                                $query1 = mysqli_query($conn, "SELECT * From tb_penumpang where id_penumpang = $id_penumpang");
                                while ($data1 = mysqli_fetch_array($query1)) {
                                    $nama = $data1['nama_penumpang']; ?>
                                    <td><?php echo $nama; ?></td>
                                <?php
                                }
                                ?>
                                <?php
                                $query2 = mysqli_query($conn, "SELECT * From tb_rute where id_rute = $id_rute");
                                while ($data2 = mysqli_fetch_array($query2)) {
                                    $rute = $data2['rute']; ?>
                                    <td><?php echo $rute; ?></td>
                                <?php
                                }
                                ?>
                                <td><?php echo $data['alamat_penjemputan']; ?></td>
                                <td><?php echo $data['alamat_tujuan']; ?></td>
                                <td><?php echo $data['waktu']; ?></td>
                                <td><?php echo $data['bukti_pembayaran']; ?></td>
                                <td><?php echo $data['sts']; ?></td>
                                <td>
                                    <a href="form-tiket/update-tiket.php?id=<?php echo $data['id_tiket']; ?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <a href="aksi-tiket/aksi-delete-tiket.php?id=<?php echo $data['id_tiket']; ?>" class="btn btn-danger btn-circle btn-sm">
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