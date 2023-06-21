<?php
include "header.php";
?>


<div class="slider_wrapper ">
	<div id="camera_wrap" class="">
		<div data-src="images/slide-new-1.png"></div>
		<div data-src="images/slide-new-2.png"></div>
		<div data-src="images/slide-new-3.png"></div>
	</div>
</div>
<div class="container_12">
	<div class="grid_4">
		<div class="banner">
			<div class="maxheight">
				<div class="banner_title">
					<img src="images/icon1.png" alt="">
					<div class="extra_wrapper">Fast&amp;
						<div class="color1">Safe</div>
					</div>
				</div>
				Dorem ipsum dolor sit amet, consectetur adipiscinger elit. In mollis erat mattis neque facilisis, sit ameter ultricies erat rutrum. Cras facilisis, nulla vel viver auctor, leo magna sodales felis, quis malesuad
				<a href="#" class="fa fa-share-square"></a>
			</div>
		</div>
	</div>
	<div class="grid_4">
		<div class="banner">
			<div class="maxheight">
				<div class="banner_title">
					<img src="images/icon2.png" alt="">
					<div class="extra_wrapper">Best
						<div class="color1">Prices</div>
					</div>
				</div>
				Hem ipsum dolor sit amet, consectetur adipiscinger elit. In mollis erat mattis neque facilisis, sit ameter ultricies erat rutrum. Cras facilisis, nulla vel viver auctor, leo magna sodales felis, quis malesuader
				<a href="#" class="fa fa-share-square"></a>
			</div>
		</div>
	</div>
	<div class="grid_4">
		<div class="banner">
			<div class="maxheight">
				<div class="banner_title">
					<img src="images/icon3.png" alt="">
					<div class="extra_wrapper">Package
						<div class="color1">Delivery</div>
					</div>
				</div>
				Kurem ipsum dolor sit amet, consectetur adipiscinger elit. In mollis erat mattis neque facilisis, sit ameter ultricies erat rutrum. Cras facilisis, nulla vel viver auctor, leo magna sodales felis, quis malesuki
				<a href="#" class="fa fa-share-square"></a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="c_phone">
	<div class="container_12">
		<div class="grid_12">
			<div class="fa fa-phone"></div>
			<span>ORDER NOW!</span>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!--==============================Content=================================-->
<div class="content">
	<div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
	<div class="container_12">
		<div class="grid_5">
			<h3>Booking Form</h3>
			<?php 
				include "koneksi.php";
				$id = $_GET['id'];
				$query_mysql = mysqli_query($conn, "SELECT * FROM tb_penumpang WHERE id_users='$id'");
				while ($data = mysqli_fetch_array($query_mysql)) {
					
					$id_penumpang = $data['id_penumpang'];
					$nama = $data ['nama_penumpang'];
					$email = $data ['email'];
			?>
			<form id="bookingForm" action="aksi/aksi-tambah-tiket.php?id=<?php echo $data['id_users'];?>" method="post" enctype="multipart/form-data">
				<div class="fl1">
					<div class="tmInput">
						<input name="id_penumpang" placeHolder="Name:" type="text" data-constraints='@NotEmpty @Required @AlphaSpecial' hidden value="<?php echo $id_penumpang; ?>">
						<input name="nama_penumpang" placeHolder="Name:" type="text" data-constraints='@NotEmpty @Required @AlphaSpecial' value="<?php echo $nama; ?>">
					</div>
					<div class="tmInput">
						<textarea name="alamat_penjemputan" id="" cols="30" rows="10" placeholder="From"></textarea>
					</div>
				</div>
				<div class="fl1">
					<div class="tmInput">
						<input name="email" placeHolder="Email:" type="text" data-constraints="@NotEmpty @Required @Email" value="<?php echo $email;?>">
					</div>
					<div class="tmInput mr0">
						<textarea name="alamat_tujuan" id="" cols="30" rows="10" placeholder="To"></textarea>
					</div>
				</div>
				<div class="clear"></div>
				<div class="clear"></div>
				<strong>Date</strong>
				<label class="tmInput">
					<input type="text" name="tanggal" placeHolder='20/05/2014' data-constraints="@NotEmpty @Required @Date">
				</label>
				<div class="clear"></div>
				<div class="fl1 fl2">
					<em>Rute</em>
					<select name="rute" class="tmSelect" data-class="tmSelect tmSelect2" data-constraints="">
						<option disabled selected>Pilih</option>
					<?php
						$query_mysql1 = mysqli_query($conn, "SELECT * FROM tb_rute");
						while ($data1 = mysqli_fetch_array($query_mysql1)) {
							$id_rute = $data1['id_rute'];
							$rute = $data1 ['kode'];
							$harga = $data1['harga']
							?>
						<option value="<?php echo $id_rute;?>"><?php echo $id_rute?>.<?php echo $rute;?>.<?php echo $harga;?></option>
						<label><?php echo $harga;?></label>
						<?php
						}
						?>
					</select>
					<!-- <div class="clear height1"></div> -->
				</div>
				<div class="clear"></div>
				<div class="clear"></div>
				<div class="tmFile">
					<input name="bukti_pembayaran" type="file" data-constraints='@NotEmpty @Required @AlphaSpecial' value="">
				</div>
				<input type="submit" class="btn " value="Tambah" name="tambah-tiket">
				<!-- <a href="aksi/aksi-tambah-tiket.php" class="btn" name="tambah-tiket" data-type="submit">Submit</a> -->
			</form>
			<?php } ?>
		</div>
		<div class="grid_6 prefix_1">
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
		<div class="clear"></div>
	</div>
</div>
</div>
<!--==============================footer=================================-->
<?php
include "footer.php";
?>