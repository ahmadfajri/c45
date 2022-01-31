<?php
include_once("../library/koneksi.php");
include_once("tglindo.php");
if ($_GET[action] == "") {
	#untuk paging (pembagian halamanan)
	$row = 10;
	$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
	$pageSql = "SELECT * FROM produk";
	$pageQry = mysql_query($pageSql, $server) or die("error paging: " . mysql_error());
	$jml	 = mysql_num_rows($pageQry);
	$max	 = ceil($jml / $row);
?>

	<div class="panel panel-default">
		<div class="panel-heading">
			Data Produk
		</div>

		<div class="panel-body">
			<a href="?module=datapel&action=tambah" class="btn btn-info "> Tambah Data </a><br><br>
			<div class="table-responsive">

				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>
								<div align="center">No</div>
							</th>
							<th>
								<div align="center">Nama Produk</div>
							</th>
							<th>
								<div align="center">Harga</div>
							</th>
							<th>
								<div align="center">Ukuran </div>
							</th>
							<th>
								<div align="center">Stok</div>
							</th>
							<th>
								<div align="center">Jumlah Terjual</div>
							</th>
							<th>
								<div align="center">Keputusan</div>
							</th>
							<th>
								<div align="center">Aksi</div>
							</th>
						</tr>


					</thead>
					<?php
					$dataSql = "SELECT * FROM produk ORDER BY idproduk";
					$dataQry = mysql_query($dataSql, $server)  or die("Query data salah : " . mysql_error());
					$nomor  = 0;
					while ($data = mysql_fetch_array($dataQry)) {
						$nomor++;
					?>
						<tbody>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td>
									<div align="center"><?php echo $data['nmproduk']; ?></div>
								</td>
								<td>
									<div align="center"><?php echo $data['harga']; ?></div>
								</td>

								<td>
									<div align="center"><?php echo $data['ukuran']; ?></div>
								</td>
								<td>
									<div align="center"><?php echo $data['stok']; ?></div>
								</td>

								<td>
									<div align="center"><?php echo $data['jumlah_terjual']; ?></div>
								</td>
								<td>
									<div align="center"><?php echo $data['keputusan']; ?></div>
								</td>

								<td>
									<div class='btn-group'>
										<a href="?module=datapel&action=hapus&id=<?php echo $data['idproduk']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA INI ... ?')"><i class="icon-remove icon-white"></i></a>
										<a href="?module=datapel&action=edit&id=<?php echo $data['idproduk']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
									</div>
								</td>
							</tr>
						</tbody>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
<?php
} elseif ($_GET[action] == "tambah") {
?>
	<div class="box">

		<header>
			<h5>Tambah Data Produk</h5>
		</header>
		<div class="body">

			<form action="?module=datapel&action=ptambah" method="post" class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-lg-4">Nama Produk</label>
					<div class="col-lg-4">
						<input type="text" name="namaproduk" autofocus required class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Harga</label>
					<div class="col-lg-4">
						<select name="harga" class="form-control">
							<option value="">Silahkan Dipilih...</option>
							<option value="Murah">Murah</option>
							<option value="Mahal">Mahal</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Ukuran</label>
					<div class="col-lg-4">
						<select name="ukuran" class="form-control">
							<option value="">Silahkan Dipilih...</option>
							<option value="Kecil">Kecil</option>
							<option value="Sedang">Sedang</option>
							<option value="Besar">Besar</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Stok</label>
					<div class="col-lg-4">
						<select name="stok" class="form-control">
							<option value="">Silahkan Dipilih...</option>
							<option value="Sedikit">Sedikit</option>
							<option value="Banyak">Banyak</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Jumlah Terjual</label>
					<div class="col-lg-4">
						<select name="jumlah_terjual" class="form-control">
							<option value="">Silahkan Dipilih...</option>
							<option value="Sedikit">Sedikit</option>
							<option value="Banyak">Banyak</option>

						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Keputusan</label>
					<div class="col-lg-4">
						<select name="keputusan" class="form-control">
							<option value="">Silahkan Dipilih...</option>
							<option value="Tidak Laris">Tidak Laris</option>
							<option value="Laris">Laris</option>
						</select>
					</div>
				</div>
				<div class="form-actions no-margin-bottom" style="text-align:center;">
					<input type="submit" name="pasien" value="Simpan" class="btn btn-primary" /> <a href="?module=datasiswa" class="btn btn-warning">Back</a>
				</div>

			</form>
		</div>
	</div>
<?php
} elseif ($_GET[action] == "ptambah") {
	$sqlSimpan	= "insert into produk values ('',
						'$_POST[namaproduk]',
						'$_POST[harga]',
						'$_POST[ukuran]',
						'$_POST[stok]',
						'$_POST[jumlah_terjual]',
						'$_POST[keputusan]'
						)";
	$querySimpan	= mysql_query($sqlSimpan);

	if ($querySimpan) {

		echo "<script type='text/javascript'>
      alert('Data Berhasil Ditambah...!!!');
      </script>";

		echo "<meta http-equiv='refresh' content='0; index.php?module=datapel'>";
	} else {
		echo "<script type='text/javascript'>
      alert(' Gagal ...!!!');
      </script>";
		echo "<meta http-equiv='refresh' content='0; index.php?module=datapel&action=tambah'>";
	}
} elseif ($_GET[action] == "pedit") {
	$sqlSimpan	= "update produk set nmproduk='$_POST[namaproduk]',
						harga='$_POST[harga]',
						ukuran='$_POST[ukuran]',
						stok='$_POST[stok]',
						jumlah_terjual='$_POST[jumlah_terjual]',
						keputusan='$_POST[keputusan]'
						where idproduk='$_POST[id]'";
	$querySimpan	= mysql_query($sqlSimpan);

	if ($querySimpan) {

		echo "<script type='text/javascript'>
      alert('Data Berhasil Diubah...!!!');
      </script>";

		echo "<meta http-equiv='refresh' content='0; index.php?module=datapel'>";
	} else {
		echo "<script type='text/javascript'>
      alert(' Gagal ...!!!');
      </script>";
		echo "<meta http-equiv='refresh' content='0; index.php?module=datapel&action=edit&id=$_POST[iddaya]'>";
	}
} elseif ($_GET[action] == "edit") {
	$r = mysql_fetch_array(mysql_query("select * from produk where idproduk='$_GET[id]'"));
?>
	<div class="box">

		<header>
			<h5>Edit Data Produk</h5>
		</header>
		<div class="body">
			<form action="?module=datapel&action=pedit" method="post" class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-lg-4">Nama Produk</label>
					<div class="col-lg-4">
						<input type="hidden" name="id" class="form-control" value="<?php echo $r['idproduk'] ?>" />
						<input type="text" name="namaproduk" required class="form-control" value="<?php echo $r['nmproduk'] ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Harga</label>
					<div class="col-lg-4">
						<select name="harga" class="form-control">
							<option value="">Silahkan Dipilih...</option>
							<option value="Murah">Murah</option>
							<option value="Mahal">Mahal</option>
						</select>
					</div>
				</div>
				<script>
					document.getElementsByName("harga")[0].value = "<?php echo $r['harga'] ?>";
				</script>
				<div class="form-group">
					<label class="control-label col-lg-4">Ukuran</label>
					<div class="col-lg-4">
						<select name="ukuran" class="form-control">
							<option value="">Silahkan Dipilih...</option>
							<option value="Kecil">Kecil</option>
							<option value="Sedang">Sedang</option>
							<option value="Besar">Besar</option>
						</select>
					</div>
				</div>
				<script>
					document.getElementsByName("ukuran")[0].value = "<?php echo $r['ukuran'] ?>";
				</script>
				<div class="form-group">
					<label class="control-label col-lg-4">Stok</label>
					<div class="col-lg-4">
						<select name="stok" class="form-control">
							<option value="">Silahkan Dipilih...</option>
							<option value="Sedikit">Sedikit</option>
							<option value="Banyak">Banyak</option>
						</select>
					</div>
				</div>
				<script>
					document.getElementsByName("stok")[0].value = "<?php echo $r['stok'] ?>";
				</script>
				<div class="form-group">
					<label class="control-label col-lg-4">Jumlah Terjual</label>
					<div class="col-lg-4">
						<select name="jumlah_terjual" class="form-control">
							<option value="">Silahkan Dipilih...</option>
							<option value="Sedikit">Sedikit</option>
							<option value="Banyak">Banyak</option>
						</select>
					</div>
				</div>
				<script>
					document.getElementsByName("jumlah_terjual")[0].value = "<?php echo $r['jumlah_terjual'] ?>";
				</script>
				<div class="form-group">
					<label class="control-label col-lg-4">Keputusan</label>
					<div class="col-lg-4">
						<select name="keputusan" class="form-control">
							<option value="">Silahkan Dipilih...</option>
							<option value="Tidak Laris">Tidak Laris</option>
							<option value="Laris">Laris</option>
						</select>
					</div>
				</div>
				<script>
					document.getElementsByName("keputusan")[0].value = "<?php echo $r['keputusan'] ?>";
				</script>

				<div class="form-actions no-margin-bottom" style="text-align:center;">
					<input type="submit" name="pasien" value="Simpan" class="btn btn-primary" /> <a href="?module=datasiswa" class="btn btn-warning">Back</a>
				</div>
			</form>
		</div>
	</div>

<?php
} elseif ($_GET[action] == "hapus") {
	$sqlSimpan	= "delete from produk where idproduk='$_GET[id]'";
	$querySimpan	= mysql_query($sqlSimpan);

	if ($querySimpan) {

		echo "<script type='text/javascript'>
      alert('Data Berhasil Dehapus...!!!');
      </script>";

		echo "<meta http-equiv='refresh' content='0; index.php?module=datapel'>";
	} else {
		echo "<script type='text/javascript'>
      alert(' Gagal ...!!!');
      </script>";
		echo "<meta http-equiv='refresh' content='0; index.php?module=datapel&action=tambah'>";
	}
}
?>