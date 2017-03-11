<?php

$p_tombol	= $_POST['tb_act'];
$p_idasli	= $_POST['id_asli'];
$p_kode1 	= $_POST['kode1'];
$p_kode2	= $_POST['kode2'];
$p_nama		= $_POST['nama_brg'];
$p_merk		= $_POST['merk_brg'];
$p_j_aset	= $_POST['jm_brg'];
$p_nilai	= $_POST['nilai_brg'];
$p_ruang	= $_POST['id_ruang'];
$p_kondisi	= $_POST['kondisi'];
$p_perolehan= $_POST['perolehan'];
$p_tahun	= $_POST['thn_oleh'];

if ($p_tombol == "Tambah") {
	$end_kode3 	= endData('t_barang', 'kode_brg3', "WHERE kode_brg1 = '$p_kode1' AND kode_brg2 = '$p_kode2'");
	$end_kode4 	= endData('t_barang', 'kode_brg4', "WHERE kode_brg1 = '$p_kode1' AND kode_brg2 = '$p_kode2'");
	
	$kode_gbg 	= $p_kode1.$p_kode2.$end_kode3.$end_kode4;
	$kode_gbg2	= $p_kode1.$p_kode2.$end_kode3;
	//echo $end_kode3;
	if ($p_j_aset == 1) {
		mysql_query("INSERT INTO t_barang VALUES('', '$p_kode1', '$p_kode2', '$end_kode3', 
					'$end_kode4', '$kode_gbg', '$p_nama', '$p_merk', '$p_nilai',
					'$p_ruang', '$p_kondisi', '$p_perolehan', '$p_tahun', NOW())");
	
		//mysql_query("INSERT INTO t_barang VALUES('', '$', '', '', '', '', '', '', '', '', '', '', '', '')");
	} else if ($p_j_aset > 1) {
		for ($i = 1; $i <= $p_j_aset; $i++) {
			$kgb	= $kode_gbg2.$i;
			mysql_query("INSERT INTO t_barang VALUES('', '$p_kode1', '$p_kode2', '$end_kode3', 
					'$i', '$kgb', '$p_nama', '$p_merk', '$p_nilai',
					'$p_ruang', '$p_kondisi', '$p_perolehan', '$p_tahun', NOW())");
		}
	}
} else if ($p_tombol == "Edit") {
	$sql = "UPDATE t_barang SET nama_barang = '$p_nama', merk = '$p_merk', 
							nilai_aset = '$p_nilai', letak = '$p_ruang', kondisi = '$p_kondisi',
							asal_perolehan = '$p_perolehan', thn_dapat = '$p_tahun' 
							WHERE id_barang = '$p_idasli'";
	$q_update_brg = mysql_query($sql);
	
	/*$q_update_brg = mysql_query() or die (mysql_error());*/
	if ($q_update_brg) {
		echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
	} else {
		echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
	}
}

?>

<article class="module width_full">
	<header><h3>Data Barang</h3></header>
		<div class="module_content">
		<h5><a href="?p=t_barang&mod=add">Tambah Data Barang</a></h5>
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'>
		<tr><th width='15%'>Kode Brg</th>
		<th width='40%'>Nama</th>
		<th width='15%'>Merk</th>
		<th width='15%'>Harga Aset</th>
		<th width='15%'>Control</th></tr>";
		$q_barang 	= mysql_query("SELECT kode_brg1, kode_brg2, kode_brg3, nama_barang, COUNT(nama_barang) AS 'jumlah' FROM t_barang GROUP BY nama_barang ORDER BY kode_gbg ASC") or die (mysql_error());
		$j_barang 		= mysql_num_rows($q_barang);
		
		$total_rph_aset = 0;
		while ($a_barang = mysql_fetch_array($q_barang)) {
			$kode_sub_brg = $a_barang[0].$a_barang[1].$a_barang[2];
			$kode_ 	= $a_barang[0]."-".$a_barang[1]."-".$a_barang[2];
			
			echo "<tr><td colspan='5' height='30px'><b>($kode_) $a_barang[3] [$a_barang[4] unit]</b></td><tr>";
			
			$q_brg = mysql_query("SELECT * FROM t_barang WHERE LEFT(kode_gbg, 7) = '$kode_sub_brg'");
			$sub_total = 0;
			while ($a_det_barang = mysql_fetch_array($q_brg)) {
			//$kode_ful = $a_det_barang[1]."-".$a_det_barang[2]."-".$a_det_barang[3]."-".$a_det_barang[4];			
				echo "<tr>
				<td id='tengah'>$a_det_barang[5]</td>
				<td>$a_det_barang[6]</td>
				<td>$a_det_barang[7]</td>
				<td align='right'>$a_det_barang[8]</td>
				<td id='tengah'><a href='?p=t_barang&mod=edit&id=$a_det_barang[0]'>Edit</a> |
				<a href='?p=t_barang&mod=del&id=$a_det_barang[0]' onclick=\"return konfirmasi('Menghapus data $a_barang[1]')\">Delete</a>
				</tr>";
				
				$total_rph_aset = $total_rph_aset+$a_det_barang[8];
			}
		}
		echo "<tr style='font-weight: bold; background: #E0E0E3;'><td colspan='3' align='center'>Total Aset</td><td align='right'>$total_rph_aset</td><td></td></tr>";
		echo "</table>";
		?>

		</div>
</article>