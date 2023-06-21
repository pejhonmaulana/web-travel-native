<?php
include "header.php"
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Supir</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Supir</h6>
        </div>
        <div class="card-body">
            <a href="form-supir/tambah-supir.php" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-solid fa-plus"></i>
                </span>
                <span class="text">Tambah Supir</span>
            </a>
            <div class="my-2"></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $sql = "SELECT * FROM tb_sopir";
                        $stmt = $conn->query($sql);
                        while ($data = $stmt->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_sopir']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['no_tlp']; ?></td>
                                <td>
                                    <a href="form-supir/update-supir.php?id=<?php echo $data['id_sopir'];?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <a href="form-supir/delete-supir.php?id=<?php echo $data['id_sopir'];?>" class="btn btn-danger btn-circle btn-sm">
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