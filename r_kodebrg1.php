		<?php
		$id_kodebrg1	= $_GET['id'];
				$mod 		= $_GET['mod'];	

				if ($mod == "del") {
					$q_delete_kodebrg1 = mysql_query("DELETE FROM r_kodebrg1 WHERE kode1 = '$id_kodebrg1'");
					if ($q_delete_kodebrg1) {
						echo "<h4 class='alert_success'>Data berhasil dihapuskan<span id='close'>[<a href='#'>X</a>]</span></h4>";
					} else {
						echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
					}
				}
				
				// ================ DATA FORM ( POST ) =====================//
				$display 	= "style='display: none'"; 	//default = formnya dihidden
				$tb_act = $_POST['tb_act'];				//ambil variabel POST value Tombol FOrm
				$p_id_kodebrg1   = $_POST['id_kodebrg1'];		//ambil variabel POST id_kodebrg1
				$p_nama_kodebrg1 = $_POST['nama_kodebrg1'];	//ambil variabel POST nama_kodebrg1
				
				
				if ($tb_act == "Tambah") {
					$display = "style='display: none'";
					$q_tambah_kodebrg1	= mysql_query("INSERT INTO r_kodebrg1 VALUES ('$p_id_kodebrg1', '$p_nama_kodebrg1')");
					if ($q_tambah_kodebrg1) {
						echo "<h4 class='alert_success'>Data berhasil ditambahkan<span id='close'>[<a href='#'>X</a>]</span></h4>";
					} else {
						echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
					}
				} else if ($tb_act == "Edit") {
					$display = "style='display: none'";
					$q_edit_kodebrg1	= mysql_query("UPDATE r_kodebrg1 SET nama = '$p_nama_kodebrg1' WHERE kode1 = '$p_id_kodebrg1'");
					if ($q_edit_kodebrg1) {
						echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
					} else {
						echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
					}
				} else {	
					$display = "style='display: none'";
				}
		?>
<article class="module width_full">
	<header><h3>Referensi Agama</h3></header>
		<div class="module_content">
		<h5><a href="?p=r_kodebrg1&mod=add">Tambah Data Agama</a></h5>
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='10%'>Kode</th><th width='50%'>Agama</th><th width='30%'>Control</th></tr>";
		$q_kodebrg1 	= mysql_query("SELECT * FROM r_kodebrg1 ORDER BY kode1 ASC") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_kodebrg1);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='3'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_kodebrg1 = mysql_fetch_array($q_kodebrg1)) {
				echo "<tr><td id='tengah'>$no</td><td>$a_kodebrg1[0]</td><td>$a_kodebrg1[1]</td>
				<td id='tengah'><a href='?p=r_kodebrg1&mod=edit&id=$a_kodebrg1[0]'>Edit</a> |
					<a href='?p=r_kodebrg1&mod=del&id=$a_kodebrg1[0]' onclick=\"return konfirmasi('Menghapus data $a_kodebrg1[1]')\">Delete</a>
				</tr>";
				$no++;
			}
		}
		echo "</table>";
		?>

		</div>
</article>

		<?php
		// ================ DATA URL "mod" ( GET ) =====================//

		if ($mod == "edit") {
			$display = "";
			$q_edit_agm	= mysql_query("SELECT * FROM r_kodebrg1 WHERE kode1 = '$id_kodebrg1'");
			$a_edit_agm	= mysql_fetch_array($q_edit_agm);
			
			$nama_kodebrg1 = $a_edit_agm[1];
			$view = "Edit";
			
		} else if ($mod == "add") {
			$display = "";
			$id_kodebrg1 = "";
			$nama_kodebrg1 = "";
			$view = "Tambah";
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data Kode Barang 1</h3></header>
		<div class="module_content">
		<form action="?p=r_kodebrg1" method="post" id="fr_kodebrg1">
		<table class="tbl_form">
			<tr><td width="20%">ID</td>
			<td width="80%"><input type="text" size="3" name="id_kodebrg1" value="<?php echo $id_kodebrg1; ?>"></td></tr>
			<tr><td>Nama</td>
			<td><input type="text" size="30" name="nama_kodebrg1" value="<?php echo $nama_kodebrg1; ?>"></td></tr>
			<tr><td></td><td><input type="submit" name="tb_act" value="<?php echo $view; ?>"></td></tr>
		</table>
		</div>
</article>
