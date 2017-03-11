		<?php
		$id_sekolah	= $_GET['id'];
		$mod 		= $_GET['mod'];	

		if ($mod == "del") {
			$q_delete_r_atribut = mysql_query("DELETE FROM r_atribut WHERE id_sekolah = '$id_sekolah'");
			if ($q_delete_r_atribut) {
				echo "<h4 class='alert_success'>Data berhasil dihapuskan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		}
		
		// ================ DATA FORM ( POST ) =====================//
		$display 	= "style='display: none'"; 	//default = formnya dihidden
		$tb_act = $_POST['tb_act'];				//ambil variabel POST value Tombol FOrm

		$p_id_sekolah  		= $_POST['id_sekolah'];		//ambil variabel POST id_sekolah
		$p_h1				= $_POST['h1'];
		$p_h2				= $_POST['h2'];
		$p_alamat			= $_POST['alamat'];
		$p_web				= $_POST['web'];
		$p_kota				= $_POST['kota'];
		$p_tgl				= $_POST['tgl'];
		$p_ttd				= $_POST['ttd'];
		$p_nip				= $_POST['nip'];
		
		
		if ($tb_act == "Edit") {
			$display = "style='display: none'";
			$q_edit_r_atribut	= mysql_query("UPDATE r_atribut SET 
			h1 = '$p_h1', h2 = '$p_h2', 
			alamat = '$p_alamat', web = '$p_web', 
			kota = '$p_kota', tgl = '$p_tgl',
			nama_ttd = '$p_ttd', nip = '$p_nip'
			WHERE id_sekolah= '$p_id_sekolah'");
			if ($q_edit_r_atribut) {
				echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else {	
			$display = "style='display: none'";
		}
		?>
<article class="module width_full">
	<header><h3>Referensi atributan</h3></header>
		<div class="module_content">
	
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='60%'>Nama atribut</th><th width='30%'>Control</th></tr>";
		$q_r_atribut 	= mysql_query("SELECT * FROM r_atribut LIMIT 1") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_r_atribut);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='4'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_r_atribut = mysql_fetch_array($q_r_atribut)) {
				echo "<tr><td id='tengah'>$no</td>
				<td>
				$a_r_atribut[1] /<br>
				$a_r_atribut[2] /<br>
				$a_r_atribut[3] /<br>
				$a_r_atribut[4]
				</td>
				<td id='tengah'><a href='?p=r_atribut&mod=edit&id=$a_r_atribut[0]'>Edit</a> |
					<a href='?p=r_atribut&mod=del&id=$a_r_atribut[0]' onclick=\"return konfirmasi('Menghapus data $a_r_atribut[1]')\">Delete</a>
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
			$q_edit_r_atribut	= mysql_query("SELECT * FROM r_atribut WHERE id_sekolah= '$id_sekolah'");
			$a_edit_r_atribut	= mysql_fetch_array($q_edit_r_atribut);
			
			$id_sekolah= $a_edit_r_atribut[0];
			$h1 	= $a_edit_r_atribut[1];
			$h2 	= $a_edit_r_atribut[2];
			$alamat = $a_edit_r_atribut[3];
			$web	= $a_edit_r_atribut[4];
			$kota	= $a_edit_r_atribut[5];
			$tgl 	= $a_edit_r_atribut[6];
			$nama_ttd = $a_edit_r_atribut[7];
			$nip 	= $a_edit_r_atribut[8];
			
			$view = "Edit";
			
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data Atribut</h3></header>
		<div class="module_content">
		<form action="?p=r_atribut" method="post" id="ft_r_atribut">
		<table class="tbl_form">
			
			<?php 
			echo cInputRO("ID", "id_sekolah", "10", $id_sekolah);
			echo cInput("Header 1", "h1", "40", $h1);
			echo cInput("Header 2", "h2", "40", $h2);
			echo cInput("Alamat", "alamat", "90", $alamat);
			echo cInput("Website", "web", "40", $web);
			echo cInput("Kota Tanda Tangan", "kota", "40", $kota);
			echo cInput("Tanggal Tanda Tangan", "tgl", "40", $tgl);
			echo cInput("Nama Penandatangan", "ttd", "40", $nama_ttd);
			echo cInput("NIP Penandatangan", "nip", "40", $nip);
			echo cSubmit("tb_act", $view);
			?>
		</table>
		</div>
</article>
