<article class="module width_full" <?php echo $display;?>>
	<header><h3>Data Inventaris Ruangan</h3></header>
		<div class="module_content">
		<center>Pilih Ruang <select onChange="document.location.href=this.options[this.selectedIndex].value;">
		<option value="">Pilihlah dulu Ruang yang akan dilihat DIRnya...!!</option>
	
		<?php
		$q_ambil_ruang = mysql_query("SELECT * FROM r_ruang ORDER BY id_ruang ASC");
		while ($a_ambil_ruang = mysql_fetch_array($q_ambil_ruang)) {
			if ($_GET['id_ruang'] == $a_ambil_ruang[0]) {
				echo "<option value='?p=d_ir&id_ruang=$a_ambil_ruang[0]' selected>$a_ambil_ruang[1]</option>";
			} else {
				echo "<option value='?p=d_ir&id_ruang=$a_ambil_ruang[0]'>$a_ambil_ruang[1]</option>";
			}
		}
		echo "</select><br><br><br>";
		
		if ($_GET['id_ruang'] == "") {
			echo "";
		} else {
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='20%'>Kode Barang</th><th width='40%'>Nama Barang</th><th width='30%'>Jumlah</th></tr>";
		$q_r_ruang 	= mysql_query("SELECT *, COUNT(letak) FROM t_barang WHERE letak='".$_GET['id_ruang']."' GROUP BY LEFT(kode_gbg, 7)") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_r_ruang);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='4'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_r_ruang = mysql_fetch_array($q_r_ruang)) {
				echo "<tr><td id='tengah'>$no</td>
				<td id='tengah'>$a_r_ruang[1]-$a_r_ruang[2]-$a_r_ruang[3]-$a_r_ruang[4]</td>
				<td>$a_r_ruang[6]</td>
				<td id='tengah'>$a_r_ruang[14]</td>
				</tr>";
				$no++;
			}
		}
		echo "</table>";
		}
		?>
		<br><br>
		<center><a id="print_word" rel="<?php echo $_GET['id_ruang']; ?>" href="word/Cetak().php?id_ruang=<?php echo $_GET['id_ruang']; ?>" onclick="return cek_dcetak_dir();">Cetak ke Word</a></center>
		</div>
</article>