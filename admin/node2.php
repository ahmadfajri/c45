<?php
include_once("../library/koneksi.php");
include_once("tglindo.php");

#untuk paging (pembagian halamanan)
$row = 10;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM produk";
$pageQry = mysql_query($pageSql, $server) or die("error paging: " . mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml / $row);

$dataSql = "SELECT * FROM produk WHERE jumlah_terjual='Sedikit' ORDER BY idproduk";
$dataQry = mysql_query($dataSql, $server)  or die("Query data salah : " . mysql_error());
$nomor  = 0;

while ($data = mysql_fetch_array($dataQry)) {
	$nomor++;
	/*
				if($data['goltarif']>100){
				echo"Besar";
				}else{
				echo"Kecil";
				}
				if($data['luas']>100){
				echo"Besar";
				}else{
				echo"Kecil";
				}
				if($data['biaya']>100000){
				echo"Besar";}
				else{
				echo"Kecil";
				} 
				*/
	if ($data['keputusan'] == "Laris") {
		$laris++;
	} else {
		$tidaklaris++;
	}
}

if ($laris == "") {
	$laris = 0;
}
if ($tidaklaris == "") {
	$tidaklaris = 0;
}

//Ukuran, Kecil
$dataukurankecil = mysql_query("select * from produk where ukuran='Kecil' and jumlah_terjual='Sedikit'");
while ($rukurankecil = mysql_fetch_array($dataukurankecil)) {
	$jmlukurankecil++;
	if ($rukurankecil['keputusan'] == "Laris") {
		//echo"Kecil";
		$laris_ukurankecil++;
	} else {
		//echo"Besar";
		$tidaklaris_ukurankecil++;
	}
}

if ($laris_ukurankecil == "") {
	$laris_ukurankecil = 0;
}
if ($tidaklaris_ukurankecil == "") {
	$tidaklaris_ukurankecil = 0;
}

//Ukuran, Sedang
$dataukuransedang = mysql_query("select * from produk where ukuran='Sedang' and jumlah_terjual='Sedikit'");
while ($rukuransedang = mysql_fetch_array($dataukuransedang)) {
	$jmlukuransedang++;
	if ($rukuransedang['keputusan'] == "Laris") {
		$laris_ukuransedang++;
	} else {
		$tidaklaris_ukuransedang++;
	}
}
if ($laris_ukuransedang == "") {
	$laris_ukuransedang = 0;
}
if ($tidaklaris_ukuransedang == "") {
	$tidaklaris_ukuransedang = 0;
}

//Ukuran, Besar
$dataukuranbesar = mysql_query("select * from produk where ukuran='Besar' and jumlah_terjual='Sedikit'");
while ($rukuranbesar = mysql_fetch_array($dataukuranbesar)) {
	$jmlukuranbesar++;
	if ($rukuranbesar['keputusan'] == "Laris") {
		$laris_ukuranbesar++;
	} else {
		$tidaklaris_ukuranbesar++;
	}
}
if ($laris_ukuranbesar == "") {
	$laris_ukuranbesar = 0;
}
if ($tidaklaris_ukuranbesar == "") {
	$tidaklaris_ukuranbesar = 0;
}

/////////////////////////////////////////////////////////////////////////
//Harga, Murah
$datahargamurah = mysql_query("select * from produk where harga='Murah' and jumlah_terjual='Sedikit'");
while ($rhargamurah = mysql_fetch_array($datahargamurah)) {
	$jmlhargamurah++;
	if ($rhargamurah['keputusan'] == "Laris") {
		$laris_hargamurah++;
	} else {
		$tidaklaris_hargamurah++;
	}
}

if ($laris_hargamurah == "") {
	$laris_hargamurah = 0;
}
if ($tidaklaris_hargamurah == "") {
	$tidaklaris_hargamurah = 0;
}

//Harga, Mahal
$datahargamahal = mysql_query("select * from produk where harga='Mahal' and jumlah_terjual='Sedikit'");
while ($rhargamahal = mysql_fetch_array($datahargamahal)) {
	$jmlhargamahal++;
	if ($rhargamahal['keputusan'] == "Laris") {
		//echo"Kecil";
		$laris_hargamahal++;
	} else {
		//echo"Besar";
		$tidaklaris_hargamahal++;
	}
}
if ($laris_hargamahal == "") {
	$laris_hargamahal = 0;
}
if ($tidaklaris_hargamahal == "") {
	$tidaklaris_hargamahal = 0;
}

/////////////////////////////////////////////////////////////////////
//Stok, Sedikit
$datastoksedikit = mysql_query("select * from produk where stok='Sedikit' and jumlah_terjual='Sedikit'");
while ($rstoksedikit = mysql_fetch_array($datastoksedikit)) {
	$jmlstoksedikit++;
	if ($rstoksedikit['keputusan'] == "Laris") {
		$laris_stoksedikit++;
	} else {
		$tidaklaris_stoksedikit++;
	}
}

if ($laris_stoksedikit == "") {
	$laris_stoksedikit = 0;
}
if ($tidaklaris_stoksedikit == "") {
	$tidaklaris_stoksedikit = 0;
}

//Stok, Banyak
$datastokbanyak = mysql_query("select * from produk where stok='Banyak' and jumlah_terjual='Sedikit'");
while ($rstokbanyak = mysql_fetch_array($datastokbanyak)) {
	$jmlstokbanyak++;
	if ($rstokbanyak['keputusan'] == "Laris") {
		$laris_stokbanyak++;
	} else {
		$tidaklaris_stokbanyak++;
	}
}
if ($laris_stokbanyak == "") {
	$laris_stokbanyak = 0;
}
if ($tidaklaris_stokbanyak == "") {
	$tidaklaris_stokbanyak = 0;
}

///////////////////////////////////////////////////////////

$entropytotal = ((-$laris / $nomor) * log(($laris / $nomor), 2)) + ((-$tidaklaris / $nomor) * log(($tidaklaris / $nomor), 2));

$entropyukurankecil = ((-$laris_ukurankecil / $jmlukurankecil) * log(($laris_ukurankecil / $jmlukurankecil), 2)) + ((-$tidaklaris_ukurankecil / $jmlukurankecil) * log(($tidaklaris_ukurankecil / $jmlukurankecil), 2));
if ($entropyukurankecil == "NAN") {
	$entropyukurankecil = 0;
}

$entropyukuransedang = ((-$laris_ukuransedang / $jmlukuransedang) * log(($laris_ukuransedang / $jmlukuransedang), 2)) + ((-$tidaklaris_ukuransedang / $jmlukuransedang) * log(($tidaklaris_ukuransedang / $jmlukuransedang), 2));
if ($entropyukuransedang == "NAN") {
	$entropyukuransedang = 0;
}

$entropyukuranbesar = ((-$laris_ukuranbesar / $jmlukuranbesar) * log(($laris_ukuranbesar / $jmlukuranbesar), 2)) + ((-$tidaklaris_ukuranbesar / $jmlukuranbesar) * log(($tidaklaris_ukuranbesar / $jmlukuranbesar), 2));
if ($entropyukuranbesar == "NAN") {
	$entropyukuranbesar = 0;
}

$entropyhargamurah = ((-$laris_hargamurah / $jmlhargamurah) * log(($laris_hargamurah / $jmlhargamurah), 2)) + ((-$tidaklaris_hargamurah / $jmlhargamurah) * log(($tidaklaris_hargamurah / $jmlhargamurah), 2));
if ($entropyhargamurah == "NAN") {
	$entropyhargamurah = 0;
}

$entropyhargamahal = ((-$laris_hargamahal / $jmlhargamahal) * log(($laris_hargamahal / $jmlhargamahal), 2)) + ((-$tidaklaris_hargamahal / $jmlhargamahal) * log(($tidaklaris_hargamahal / $jmlhargamahal), 2));
if ($entropyhargamahal == "NAN") {
	$entropyhargamahal = 0;
}

$entropystoksedikit = ((-$laris_stoksedikit / $jmlstoksedikit) * log(($laris_stoksedikit / $jmlstoksedikit), 2)) + ((-$tidaklaris_stoksedikit / $jmlstoksedikit) * log(($tidaklaris_stoksedikit / $jmlstoksedikit), 2));
if ($entropystoksedikit == "NAN") {
	$entropystoksedikit = 0;
}

$entropystokbanyak = ((-$laris_stokbanyak / $jmlstokbanyak) * log(($laris_stokbanyak / $jmlstokbanyak), 2)) + ((-$tidaklaris_stokbanyak / $jmlstokbanyak) * log(($tidaklaris_stokbanyak / $jmlstokbanyak), 2));
if ($entropystokbanyak == "NAN") {
	$entropystokbanyak = 0;
}


//$g1=$etot-((($jmlr1/$nomor)*$e1)+(($jmlr1m/$nomor))*$e2);
//$g2=$etot-((($jmlkecil/$nomor)*$e3)+(($jmlbesar/$nomor))*$e4);

$gainukuran = $entropytotal - ((($jmlukurankecil / $nomor) * $entropyukurankecil) + (($jmlukuransedang / $nomor) * $entropyukuransedang) + (($jmlukuranbesar / $nomor)) * $entropyukuranbesar);

$gainharga = $entropytotal - ((($jmlhargamurah / $nomor) * $entropyhargamurah) + (($jmlhargamahal / $nomor) * $entropyhargamahal));

$gainstok = $entropytotal - ((($jmlstoksedikit / $nomor) * $entropystoksedikit) + (($jmlstokbanyak / $nomor) * $entropystokbanyak));

?>

<div class="panel panel-default">

	<div class="panel-heading">
		<div class="panel-heading">
			<p align="center"> <span class="style1">Hasil</span> <br> Data Node 1
				<hr>
			</p>
		</div>
	</div>
	<p><b>A. Menghitung Jumlah Entropy :</b></p>
	<li><b>Entropy(Total)</b> = <?php echo "((-$laris/$nomor)*log(($laris/$nomor),2))+((-$tidaklaris/$nomor)*log(($tidaklaris/$nomor),2)) = ";
								echo number_format($entropytotal, 4); ?></li>

	<li><b>Entropy (Ukuran)</b> :
		<?php echo "<br/>Entropy (Kecil) = ((-$laris_ukurankecil/$jmlukurankecil)*log(($laris_ukurankecil/$jmlukurankecil),2))+((-$tidaklaris_ukurankecil/$jmlukurankecil)*log(($tidaklaris_ukurankecil/$jmlukurankecil),2)) = ";
		echo number_format($entropyukurankecil, 4); ?>
		<?php echo "<br/>Entropy (Sedang) = ((-$laris_ukuransedang/$jmlukuransedang)*log(($laris_ukuransedang/$jmlukuransedang),2))+((-$tidaklaris_ukuransedang/$jmlukuransedang)*log(($tidaklaris_ukuransedang/$jmlukuransedang),2)) = ";
		echo number_format($entropyukuransedang, 4); ?>
		<?php echo "<br/>Entropy (Besar) =((-$laris_ukuranbesar/$jmlukuranbesar)*log(($laris_ukuranbesar/$jmlukuranbesar),2))+((-$tidaklaris_ukuranbesar/$jmlukuranbesar)*log(($tidaklaris_ukuranbesar/$jmlukuranbesar),2)) = ";
		echo number_format($entropyukuranbesar, 4); ?>
	</li>
	<li><b>Entropy (Harga)</b> :
		<?php echo "<br/>Entropy (Murah) = ((-$laris_hargamurah/$jmlhargamurah)*log(($laris_hargamurah/$jmlhargamurah),2))+((-$tidaklaris_hargamurah/$jmlhargamurah)*log(($tidaklaris_hargamurah/$jmlhargamurah),2)) = ";
		echo number_format($entropyhargamurah, 4); ?>
		<?php echo "<br/>Entropy (Jeep) = ((-$laris_hargamahal/$jmlhargamahal)*log(($laris_hargamahal/$jmlhargamahal),2))+((-$tidaklaris_hargamahal/$jmlhargamahal)*log(($tidaklaris_hargamahal/$jmlhargamahal),2)) = ";
		echo number_format($entropyhargamahal, 4); ?>
	</li>
	<li><b>Entropy (Stok)</b> :
		<?php echo "<br/>Entropy (Sedikit) = ((-$laris_stoksedikit/$jmlstoksedikit)*log(($laris_stoksedikit/$jmlstoksedikit),2))+((-$tidaklaris_stoksedikit/$jmlstoksedikit)*log(($tidaklaris_stoksedikit/$jmlstoksedikit),2)) = ";
		echo number_format($entropystoksedikit, 4); ?>
		<?php echo "<br/>Entropy (Banyak) = ((-$laris_stokbanyak/$jmlstokbanyak)*log(($laris_stokbanyak/$jmlstokbanyak),2))+((-$tidaklaris_stokbanyak/$jmlstokbanyak)*log(($tidaklaris_stokbanyak/$jmlstokbanyak),2)) = ";
		echo number_format($entropystokbanyak, 4); ?>
	</li>


	<br />
	<p><b>B. Menghitung Jumlah Gain :</b></p>

	<li><b>Gain (Total,Ukuran)</b> : <?php echo number_format($entropytotal, 4);
										echo "-((($jmlukurankecil/$nomor)*";
										echo number_format($entropyukurankecil, 4);
										echo ")+(($jmlukuransedang/$nomor))*";
										echo number_format($entropyukuransedang, 4);
										echo ")+(($jmlukuranbesar/$nomor))*";
										echo number_format($entropyukuranbesar, 4);
										echo ") = ";
										echo number_format($gainukuran, 4); ?></li>

	<li><b>Gain (Total,Harga)</b> : <?php echo number_format($entropytotal, 4);
									echo "-((($jmlhargamurah/$nomor)*$entropyhargamurah)+(($jmlhargamahal/$nomor))*$entropyhargamahal) = ";
									echo number_format($gainharga, 4); ?></li>
	<li><b>Gain (Total,Stok)</b> : <?php echo number_format($entropytotal, 4);
									echo "-((($jmlstoksedikit/$nomor) * $entropystoksedikit )+(($jmlstokbanyak/$nomor))*$entropystokbanyak) = ";
									echo number_format($gainstok, 4); ?></li>

	<div class="panel-body">

		<div class="table-responsive">

			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>
							<div align="center">Node</div>
						</th>
						<th>
							<div align="center"></div>
						</th>
						<th>
							<div align="center"></div>
						</th>
						<th>
							<div align="center">Jumlah (S)</div>
						</th>
						<th>
							<div align="center">Laris (S1)</div>
						</th>
						<th>
							<div align="center">Tidak Laris (S2)</div>
						</th>
						<th>
							<div align="center">Entropy</div>
						</th>
						<th>
							<div align="center">Gaint</div>
						</th>
					</tr>

				</thead>

				<tbody>
					<tr>
						<td>
							<div>1.1</div>
						</td>
						<td>
							<div>Total</div>
						</td>
						<td>
							<div></div>
						</td>

						<td>
							<div><?php echo $nomor; ?></div>
						</td>
						<td>
							<div><?php echo $laris; ?></div>
						</td>
						<td>
							<div><?php echo $tidaklaris; ?></div>
						</td>
						<td>
							<div><?php
									echo number_format($entropytotal, 4);
									?></div>
						</td>
						<td>
							<div></div>
						</td>


					</tr>

					<tr>
						<td>
							<div></div>
						</td>
						<td>
							<div>Ukuran</div>
						</td>
						<td>
							<div></div>
						</td>

						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div><?php echo number_format($gainukuran, 4); ?></div>
						</td>

					</tr>
					<tr>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div>Kecil</div>
						</td>

						<td>
							<div><?php echo $jmlukurankecil; ?></div>
						</td>
						<td>
							<div><?php echo $laris_ukurankecil; ?></div>
						</td>
						<td>
							<div><?php echo $tidaklaris_ukurankecil; ?></div>
						</td>
						<td>
							<div>
								<?php
								echo number_format($entropyukurankecil, 4);
								?>
							</div>
						</td>
						<td>
							<div></div>
						</td>
					</tr>
					<tr>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div>Sedang</div>
						</td>

						<td>
							<div><?php echo $jmlukuransedang; ?></div>
						</td>
						<td>
							<div><?php echo $laris_ukuransedang; ?></div>
						</td>
						<td>
							<div><?php echo $tidaklaris_ukuransedang; ?></div>
						</td>
						<td>
							<div>
								<?php
								echo number_format($entropyukuransedang, 4);
								?>
							</div>
						</td>
						<td>
							<div></div>
						</td>

					</tr>
					<tr>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div>Besar</div>
						</td>

						<td>
							<div><?php echo $jmlukuranbesar; ?></div>
						</td>
						<td>
							<div><?php echo $laris_ukuranbesar; ?></div>
						</td>
						<td>
							<div><?php echo $tidaklaris_ukuranbesar; ?></div>
						</td>
						<td>
							<div>
								<?php
								echo number_format($entropyukuranbesar, 4);

								?>
							</div>
						</td>
						<td>
							<div></div>
						</td>

					</tr>
					<tr>
						<td>
							<div></div>
						</td>
						<td>
							<div>Harga</div>
						</td>
						<td>
							<div></div>
						</td>

						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div><?php echo number_format($gainharga, 4); ?></div>
						</td>


					</tr>

					<tr>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div>Murah</div>
						</td>

						<td>
							<div><?php echo $jmlhargamurah; ?></div>
						</td>
						<td>
							<div><?php echo $laris_hargamurah; ?></div>
						</td>
						<td>
							<div><?php echo $tidaklaris_hargamurah; ?></div>
						</td>
						<td>
							<div>
								<?php
								echo number_format($entropyhargamurah, 4);
								?>
							</div>
						</td>
						<td>
							<div>

							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div>Mahal</div>
						</td>

						<td>
							<div><?php echo $jmlhargamurah; ?></div>
						</td>
						<td>
							<div><?php echo $laris_hargamahal; ?></div>
						</td>
						<td>
							<div><?php echo $tidaklaris_hargamahal; ?></div>
						</td>
						<td>
							<div>
								<?php
								echo number_format($entropyhargamahal, 4);
								?>
							</div>
						</td>
						<td>
							<div></div>
						</td>

					</tr>
					<tr>
						<td>
							<div></div>
						</td>
						<td>
							<div>Stok</div>
						</td>
						<td>
							<div></div>
						</td>

						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div><?php echo number_format($gainstok, 4); ?></div>
						</td>


					</tr>

					<tr>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div>Sedikit</div>
						</td>

						<td>
							<div><?php echo $jmlstoksedikit; ?></div>
						</td>
						<td>
							<div><?php echo $laris_stoksedikit; ?></div>
						</td>
						<td>
							<div><?php echo $tidaklaris_stoksedikit; ?></div>
						</td>
						<td>
							<div>
								<?php
								echo number_format($entropystoksedikit, 4);
								?>
							</div>
						</td>
						<td>
							<div></div>
						</td>
					</tr>
					<tr>
						<td>
							<div></div>
						</td>
						<td>
							<div></div>
						</td>
						<td>
							<div>Banyak</div>
						</td>

						<td>
							<div><?php echo $jmlstokbanyak; ?></div>
						</td>
						<td>
							<div><?php echo $laris_stokbanyak; ?></div>
						</td>
						<td>
							<div><?php echo $tidaklaris_stokbanyak; ?></div>
						</td>
						<td>
							<div>
								<?php
								echo number_format($entropystokbanyak, 4);
								?>

							</div>
						</td>
						<td>
							<div></div>
						</td>

					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>