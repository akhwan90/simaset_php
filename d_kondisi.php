
<article class="module width_full">
	<header><h3>Data Kondisi Barang</h3></header>
		<div class="module_content">
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'>
		<tr><th width='15%'>Kode Brg</th>
		<th width='40%'>Nama</th>
		<th width='10%'>Baik</th>
		<th width='10%'>Rusak Ringan</th>
		<th width='10%'>Rusak Berat</th>
		<th width='15%'>Jumlah</th></tr>";
		
		$q_kondisi = mysql_query("select left(kode_gbg,7), nama_barang, count(kode_gbg) from t_barang group by left(kode_gbg,7)");
		while ($a_kondisi = mysql_fetch_array($q_kondisi)) {
			$baik = mysql_num_rows(mysql_query("SELECT * FROM t_barang WHERE left(kode_gbg, 7) = '$a_kondisi[0]' AND kondisi = '1'"));
			$rrgn = mysql_num_rows(mysql_query("SELECT * FROM t_barang WHERE left(kode_gbg, 7) = '$a_kondisi[0]' AND kondisi = '2'"));
			$rbrt = mysql_num_rows(mysql_query("SELECT * FROM t_barang WHERE left(kode_gbg, 7) = '$a_kondisi[0]' AND kondisi = '3'"));
			
			echo "<tr>
			<td id='tengah'>$a_kondisi[0]</td>
			<td>$a_kondisi[1]</td>
			<td id='tengah'>$baik</td>
			<td id='tengah'>$rrgn</td>
			<td id='tengah'>$rbrt</td>
			<td id='tengah'>$a_kondisi[2]</td></tr>";

		}
		echo "</table>";
		?>

		</div>
</article>