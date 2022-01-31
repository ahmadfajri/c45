<?php
include_once("../library/koneksi.php");
include_once("tglindo.php");

?>
<div class="box">

	<header>
		<h5>Pengujian</h5>
	</header>
	<div class="body">
		<div class="alert alert-info">
			<?php
			if (!empty($_POST['harga']) and !empty($_POST['ukuran']) and !empty($_POST['stok']) and !empty($_POST['jumlah_terjual'])) {

				if ($_POST["jumlah_terjual"] == 'Banyak') {
					$r_21 = "<b>";
					$r_221 = "</b>";
					$rule = "R1: IF Jumlah Terjual = <b>Banyak</b> THEN <b>Laris</b>";
					$hasil = "Laris";
				} elseif ($_POST['jumlah_terjual'] == 'Sedikit' and $_POST['ukuran'] == 'Kecil') {
					$r_31 = "<b>";
					$r_331 = "</b>";
					$rule = "R2: IF Jumlah Terjual = <b>Sedikit</b> AND Ukuran <b>Kecil </b>  THEN <b>Laris</b>";
					$hasil = "Laris";
				} elseif ($_POST['jumlah_terjual'] == 'Banyak') {
					$r_3 = "<b>";
					$r_32 = "</b>";
					$rule = "R3: IF Jumlah Terjual = <b>Banyak </b> THEN <b>Tidak Laris</b>";
					$hasil = "Tidak Laris";
				} elseif ($_POST['jumlah_terjual'] == 'Sedikit' and $_POST['ukuran'] == 'Sedang' and $_POST['harga'] == 'Murah') {
					$r_4 = "<b>";
					$r_42 = "</b>";
					$rule = "R4: IF Jumlah Terjual = <b>Sedikit </b> AND Ukuran = <b>Sedang</b> AND Harga = <b>Murah</b> THEN <b>Laris</b>";
					$hasil = "Laris";
				} elseif ($_POST['jumlah_terjual'] == 'Sedikit' and $_POST['ukuran'] == 'Sedang' and $_POST['harga'] == 'Mahal') {
					$r_5 = "<b>";
					$r_52 = "</b>";
					$rule = "R5: IF Jumlah Terjual = <b>Sedikit </b> AND Ukuran = <b>Sedang</b> AND Harga = <b>Mahal</b> THEN <b>Tidak Laris</b>";
					$hasil = "Tidak Laris";
				} else {
					$rule = "-";
					$hasil = "Belum Terjual";
				}
			}
			echo "<p> 
		$r_21 R1: IF Jumlah Terjual = <b>Banyak </b>  THEN <b>Laris</b> $r_221<br>
		$r_31 R2: IF Jumlah Terjual = <b>Sedikit </b> AND Ukuran = <b>Kecil</b>  THEN <b>Laris</b> $r_331<br>
		$r_3 R3: IF Jumlah Terjual = <b>Banyak </b> THEN <b>Tidak Laris</b> $r_32<br>
		$r_4 R4: IF Jumlah Terjual = <b>Sedikit </b> AND Ukuran = <b>Sedang</b> AND Harga = <b>Murah</b> THEN <b>Laris</b> $r_42</br>
		$r_5 R5: IF Jumlah Terjual = <b>Sedikit </b> AND Ukuran = <b>Sedang</b> AND Harga = <b>Mahal</b> THEN <b>Tidak Laris</b> $r_52</br>
		</p>";
			?>
		</div>
		<form action="?module=pengujian" method="post" class="form-horizontal">
			<?php if (!empty($_POST['harga']) and !empty($_POST['ukuran']) and !empty($_POST['stok']) and !empty($_POST['jumlah_terjual'])) { ?>
				<p><b>Keputusan </b>: <?php echo $hasil; ?>
				<p><b>Rule </b>: <?php echo $rule; ?>
				<?php
			} else {
				?>
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

				<div class="form-actions no-margin-bottom" style="text-align:left;">
					<input type="submit" value="Cek" class="btn btn-info" /> <a href="?menu=datapel" class="btn btn-warning">Back</a>
				</div>
			<?php
			}
			?>
		</form>
	</div>
</div>
<?php

?>