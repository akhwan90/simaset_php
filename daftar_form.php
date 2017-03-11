<article class="module width_full">
	<header><h3>Data Siswa</h3></header>
	<div class="module_content">
	<table class="tbl_form">
		<?php
		cInput("Nama", "nama", "40", "");
		cInput("Jenis Kelamin", "jk", "3", "");
		cInput("Agama", "agama", "10", "");
		cCmbTglLahir("");
		cInput("Alamat", "alamat", "70", "");
		cRadio("Status Anak", "stat_anak", "Anak Kandung|Anak Tiri", "1|2");
		cInput2("Anak Ke|Jumlah Saudara", "anak_ke|jum_sdr", "3|3", "|");
		?>
	</table>
	</div>
</article>

<article class="module width_full">
	<header><h3>Data Orang Tua</h3></header>
	<div class="module_content">
	<table class="tbl_form">
		<?php
		cInput2("Nama Ayah|Nama Ibu", "nama_ay|nama_ib", "30|30", "|");
		cCmbPendidikan("", "");
		cCmbPekerjaan("", "");
		?>
	</table>
	</div>
</article>

<article class="module width_full">
	<header><h3>Sekolah Asal</h3></header>
	<div class="module_content">
	<table class="tbl_form">
		<?php
		cInput("Nama Sekolah", "asal_skl", "40", "");
		cRadio("Status Sekolah", "stat_skl", "Negeri|Swasta", "1|2");
		cInput("Alamat", "sc_alamat", "60", "");
		cInput("Kepala Sekolah", "kepsek", "60", "");
		cInput2("Tahun Lulus|No. Ijazah", "thn_lulus|no_ijazah", "10|20", "|");
		?>
	</table>
	</div>
</article>

<article class="module width_full">
	<header><h3>Data Nilai & Pilihan Jurusan</h3></header>
	<div class="module_content">
	<table class="tbl_form">
		<?php
		cInput2("Bahasa Inggris|Bahasa Indonesia", "bing|bind", "10|10", "|");
		cInput2("Matematika|I P A", "mtk|ipa", "10|10", "|");
		cPilihanJurusan();
		?>
	</table>
	</div>
</article>
	
<article class="module width_full">
	<header><h3>Prestasi Yang Pernah Diraih</h3></header>
	<div class="module_content">
	<table class="tbl_form">
		<?php
		cPrestasi("", "")
		?>
	</table>
	</div>
</article>

<article class="module width_full">
	<header><h3>Konfirmasi Data Pendaftar</h3></header>
	<div class="module_content">
	<table class="tbl_form"><tr><td>
	<input type="checkbox" name="data_ok"> <label for="data_ok">Dengan ini saya menyatakan bahwa, Data yang saya isikan di Formulir 
	ini adalah Benar adanya sesuai dengan bukti-bukti yang ada</label><br><br>
	<center><input type="submit" name="kirim_daftar" value="DAFTAR" id="tombol"></center>
	</td></tr></table>
	</div>
</article>
