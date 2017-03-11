<?php
$id_brg = $_GET['id'];
/*
$pc_id_brg = explode("-", $id_brg;
$id1 = $pc_id_brg[0];
$id2 = $pc_id_brg[1];
$id3 = $pc_id_brg[2];
$id4 = $pc_id_brg[3];*/


if ($_GET['mod'] == "add") {
	$kode1 = ""; $kode2 = ""; $nama_brg = ""; $merk_brg = "";
	$jm_brg = ""; $nilai_brg = ""; $id_ruang = ""; $kondisi = ""; 
	$perolehan = ""; $thn_oleh = ""; $thn_oleh = ""; $tombol = "Tambah";
} else if ($_GET['mod'] == "edit") {
	$q_getId = mysql_query("SELECT * FROM t_barang WHERE id_barang = '$id_brg' LIMIT 1");
	$a_getId = mysql_fetch_array($q_getId);
	
	$id_asli = $a_getId[0];
	$kode1 = $a_getId[1]; $kode2 = $a_getId[2]; $kode3 = $a_getId[3]; $kode4 = $a_getId[4]; 
	$nama_brg = $a_getId[6]; $merk_brg = $a_getId[7];
	$nilai_brg = $a_getId[8]; $id_ruang = $a_getId[9]; $kondisi = $a_getId[10]; 
	$perolehan = $a_getId[11]; $thn_oleh = $a_getId[12]; $tombol = "Edit";
}
?>

<article class="module width_full">
	<header><h3>Form Barang</h3></header>
	<div class="module_content">
	<form action="?p=d_barang" method="post" id="ft_r_ruang">
		<table class="tbl_form">
		<?php		
		echo "<input type='hidden' name='id_asli' value='$id_asli'>";
		
		if ($_GET['mod'] == "edit") {
			echo "<tr><td>Kode Barang</td><td><b>$kode1-$kode2-$kode3-$kode4</td></tr>";
		} else {
		echo "<tr><td>Kategori</td><td>";
		cmbDBidclass("kode1", "r_kodebrg1", "kode1", "nama", $kode1, "kode1", "");
		echo "</tr>";
		echo "<tr><td>Sub Kategori</td><td><div id='kode2'><select><option value=''>--</option></div></td></tr>";
		}
		echo cInput1("Nama Barang", "nama_brg", "50", $nama_brg);
		echo cInput1("Merek", "merk_brg", "50", $merk_brg);
		if ($_GET['mod'] == "edit") {
			echo "";
		} else {
			echo cInput1("Jumlah Aset", "jm_brg", "10", $jm_brg);
		}
		echo cInput1("Nilai Per Aset", "nilai_brg", "30", $nilai_brg);
		echo "<tr><td>Letak Ruang</td><td>";
		cmbDB("id_ruang", "r_ruang", "id_ruang", "nama_ruang", $id_ruang);
		echo "</tr>";
		echo "<tr><td>Kondisi</td><td>";
		cmbText("kondisi", "1|2|3", "Baik|Rusak Ringan|Rusak Berat", $kondisi);
		echo "</tr>";
		echo cInput1("Asal Perolehan", "perolehan", "40", $perolehan);
		echo cInput1("Tahun Perolehan", "thn_oleh", "10", $thn_oleh);
		echo cSubmit("tb_act", $tombol)
		
		?>
		</table>
	</form>
	</div>
</article>

<script type="text/javascript">
$('#kode1').change(function() {
	var kode1 = $('#kode1').val();
	$('#kode2').load('kode2.php?id_kode1='+kode1);
});
</script>