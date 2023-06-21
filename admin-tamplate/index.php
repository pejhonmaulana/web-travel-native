<?php
include "header.php"
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Rute</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Rute</h6>
        </div>
        <div class="card-body">
            <a href="form-rute/tambah-rute.php" class="btn btn-info btn-icon-split">
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
                            <th>Rute</th>
                            <th>Harga</th>
                            <th>Kode</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Rute</th>
                            <th>Harga</th>
                            <th>Kode</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $sql = "SELECT * FROM tb_rute";
                        $stmt = $conn->query($sql);
                        while ($data = $stmt->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['rute']; ?></td>
                                <td>Rp. <?php echo $data['harga']; ?></td>
                                <td><?php echo $data['kode']; ?></td>
                                <td>
                                    <a href="form-rute/update-rute.php?id=<?php echo $data['id_rute'];?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <a href="form-rute/aksi-delete-rute.php?id=<?php echo $data['id_rute'];?>" class="btn btn-danger btn-circle btn-sm">
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