		<?php
		$id_r_sekolah	= $_GET['id'];
		$mod 		= $_GET['mod'];	

		if ($mod == "del") {
			$q_delete_r_sekolah = mysql_query("DELETE FROM r_sekolah WHERE id_sekolah = '$id_r_sekolah'");
			if ($q_delete_r_sekolah) {
				echo "<h4 class='alert_success'>Data berhasil dihapuskan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		}
		
		// ================ DATA FORM ( POST ) =====================//
		$display 	= "style='display: none'"; 	//default = formnya dihidden
		$tb_act = $_POST['tb_act'];				//ambil variabel POST value Tombol FOrm

		$p_id_sekolah   	= $_POST['id_sekolah'];		//ambil variabel POST id_r_sekolah
		$p_nama_sekolah 	= $_POST['nama_sekolah'];	//ambil variabel POST nama_r_sekolah
		$p_alamat_sekolah	= $_POST['alamat_sekolah'];
		$p_logo_sekolah		= $_POST['logo_sekolah'];
		
		
		if ($tb_act == "Edit") {
			$display = "style='display: none'";
			$q_edit_r_sekolah	= mysql_query("UPDATE r_sekolah SET nama = '$p_nama_sekolah', alamat = '$p_alamat_sekolah', logo = '$p_logo_sekolah' WHERE id_sekolah = '$p_id_sekolah'");
			if ($q_edit_r_sekolah) {
				echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else {	
			$display = "style='display: none'";
		}
		?>
<article class="module width_full">
	<header><h3>Referensi sekolahan</h3></header>
		<div class="module_content">
	
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='60%'>Nama sekolah</th><th width='30%'>Control</th></tr>";
		$q_r_sekolah 	= mysql_query("SELECT * FROM r_sekolah ORDER BY id_sekolah ASC") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_r_sekolah);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='4'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_r_sekolah = mysql_fetch_array($q_r_sekolah)) {
				echo "<tr><td id='tengah'>$no</td><td>$a_r_sekolah[1]</td>
				<td id='tengah'><a href='?p=r_sekolah&mod=edit&id=$a_r_sekolah[0]'>Edit</a> |
					<a href='?p=r_sekolah&mod=del&id=$a_r_sekolah[0]' onclick=\"return konfirmasi('Menghapus data $a_r_sekolah[1]')\">Delete</a>
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
			$q_edit_r_sekolah	= mysql_query("SELECT * FROM r_sekolah WHERE id_sekolah = '$id_r_sekolah'");
			$a_edit_r_sekolah	= mysql_fetch_array($q_edit_r_sekolah);
			
			$id_sekolah = $a_edit_r_sekolah[0];
			$nama_sekolah = $a_edit_r_sekolah[1];
			$alamat_sekolah = $a_edit_r_sekolah[2];
			$logo_sekolah = $a_edit_r_sekolah[3];
			
			$view = "Edit";
			
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data Sekolah</h3></header>
		<div class="module_content">
		<form action="?p=r_sekolah" method="post" id="ft_r_sekolah">
		<table class="tbl_form">
			
			<?php 
			echo cInputRO("ID", "id_sekolah", "10", $id_sekolah);
			echo cInput("Nama Sekolah", "nama_sekolah", "40", $nama_sekolah);
			echo cInput("Alamat Sekolah", "alamat_sekolah", "90", $alamat_sekolah);
			echo cInput("Logo", "logo_sekolah", "30", $logo_sekolah);
			echo cSubmit("tb_act", $view);
			?>
		</table>
		</div>
</article>
