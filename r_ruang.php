		<?php
		$id_r_ruang	= $_GET['id'];
		$mod 		= $_GET['mod'];	

		if ($mod == "del") {
			$q_delete_r_ruang = mysql_query("DELETE FROM r_ruang WHERE id_ruang = '$id_r_ruang'");
			if ($q_delete_r_ruang) {
				echo "<h4 class='alert_success'>Data berhasil dihapuskan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		}
		
		// ================ DATA FORM ( POST ) =====================//
		$display 	= "style='display: none'"; 	//default = formnya dihidden
		$tb_act = $_POST['tb_act'];				//ambil variabel POST value Tombol FOrm

		$p_id_ruang   	= $_POST['id_ruang'];		//ambil variabel POST id_r_ruang
		$p_nama_ruang 	= $_POST['nama_ruang'];	//ambil variabel POST nama_r_ruang
		$p_kondisi		= $_POST['kondisi'];
		$p_luas_ruang	= $_POST['luas_ruang'];
		$p_tj_ruang		= $_POST['tj_ruang'];
		
		
		if ($tb_act == "Tambah") {
			$display = "style='display: none'";
			$q_tambah_r_ruang	= mysql_query("INSERT INTO r_ruang VALUES ('', '$p_nama_ruang', '$p_kondisi', '$p_luas_ruang', '$p_tj_ruang')");
			if ($q_tambah_r_ruang) {
				echo "<h4 class='alert_success'>Data berhasil ditambahkan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else if ($tb_act == "Edit") {
			$display = "style='display: none'";
			$q_edit_r_ruang	= mysql_query("UPDATE r_ruang SET nama_ruang = '$p_nama_ruang',
										kondisi = '$p_kondisi', luas = '$p_luas_ruang',
										tgg_jwb = '$p_tj_ruang' WHERE id_ruang = '$p_id_ruang'");
			if ($q_edit_r_ruang) {
				echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else {	
			$display = "style='display: none'";
		}
		?>
<article class="module width_full">
	<header><h3>Referensi Ruangan</h3></header>
		<div class="module_content">
		<h5><a href="?p=r_ruang&mod=add">Tambah Data Ruangan</a></h5>
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='40%'>Nama Ruang</th><th width='20%'>Penanggung Jawab</th><th width='30%'>Control</th></tr>";
		$q_r_ruang 	= mysql_query("SELECT * FROM r_ruang ORDER BY id_ruang ASC") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_r_ruang);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='4'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_r_ruang = mysql_fetch_array($q_r_ruang)) {
				echo "<tr><td id='tengah'>$no</td><td>$a_r_ruang[1]</td><td>$a_r_ruang[4]</td>
				<td id='tengah'><a href='?p=r_ruang&mod=edit&id=$a_r_ruang[0]'>Edit</a> |
					<a href='?p=r_ruang&mod=del&id=$a_r_ruang[0]' onclick=\"return konfirmasi('Menghapus data $a_r_ruang[1]')\">Delete</a>
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
			$q_edit_r_ruang	= mysql_query("SELECT * FROM r_ruang WHERE id_ruang = '$id_r_ruang'");
			$a_edit_r_ruang	= mysql_fetch_array($q_edit_r_ruang);
			
			$id_ruang = $a_edit_r_ruang[0];
			$nama_ruang = $a_edit_r_ruang[1];
			$kondisi = $a_edit_r_ruang[2];
			$luas_ruang = $a_edit_r_ruang[3];
			$tg_ruang = $a_edit_r_ruang[4];
			
			$view = "Edit";
			
		} else if ($mod == "add") {
			$display = "";
			
			$id_ruang = "";
			$nama_ruang = "";
			$kondisi = "1";
			$luas_ruang = "";
			$tg_ruang = "";
			
			$view = "Tambah";
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data Ruangan</h3></header>
		<div class="module_content">
		<form action="?p=r_ruang" method="post" id="ft_r_ruang">
		<table class="tbl_form">
			
			<?php 
			echo cInputRO("ID", "id_ruang", "10", $id_ruang);
			echo cInput("Nama Ruang", "nama_ruang", "40", $nama_ruang);
			echo "<tr><td>Kondisi Ruang</td><td>";
			echo cmbText("kondisi", "1|2|3", "Baik|Rusak Ringan|Rusak Berat", $kondisi);
			echo "</td></tr>";
			echo cInput("Luas Ruang", "luas_ruang", "20", $luas_ruang);
			echo cInput("Penanggung Jawab Ruang", "tj_ruang", "40", $tg_ruang);
			echo cSubmit("tb_act", $view);
			?>
		</table>
		</div>
</article>
