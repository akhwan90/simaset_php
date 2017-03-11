<?php

$h	= "localhost";
$u	= "root";
$p	= "";
$d 	= "db_simaset";

mysql_connect($h, $u, $p) or die (mysql_error());
mysql_select_db($d);

function getSekolah() {
	$q = mysql_query("SELECT * FROM r_sekolah LIMIT 1");
	$a = mysql_fetch_array($q);
	
	$dataSekolah = array();
	$dataSekolah[0] = $a[0];
	$dataSekolah[1] = $a[1];
	$dataSekolah[2] = $a[2];
	$dataSekolah[3] = $a[3];

	
	return $dataSekolah;
}

function input($var) {
	$ret = isset($var) ? $var : "";
	return $ret;
}

function cInput1($label, $name, $size, $value) {
	echo "<tr><td width=\"20%\">$label</td><td><input type=\"text\" name=\"$name\" size=\"$size\" value=\"$value\"></td></tr>";
}
function cInputRO($label, $name, $size, $value) {
	echo "<tr><td width=\"20%\">$label</td><td colspan=\"3\"><input type=\"text\" name=\"$name\" size=\"$size\" readonly value=\"$value\"></td></tr>";
}
function cmbText($name, $s_val, $s_view, $selected) {
	echo "<select name='$name'><option value=''>--</option>";
	$pc_val 	= explode("|", $s_val);
	$pc_view 	= explode("|", $s_view);
	$j_option 	= count($pc_val);
	
	for ($i = 0; $i < $j_option; $i++) {
		if ($pc_val[$i] == $selected) {
			echo "<option value='$pc_val[$i]' selected>$pc_view[$i]</option>";
		} else {
			echo "<option value='$pc_val[$i]'>$pc_view[$i]</option>";
		}
	}	
	echo "</select>";
}
function cmbDB($name, $tabel, $f_value, $f_view, $selected) {
	echo "<select name='$name'><option value=''>--</option>";
	$q = mysql_query("SELECT $f_value, $f_view FROM $tabel ORDER BY $f_view ASC");
	while ($a = mysql_fetch_array($q)) {
		if ($a[0] == $selected) {
			echo "<option value='$a[0]' selected>$a[1]</option>";
		} else {
			echo "<option value='$a[0]'>$a[1]</option>";
		}
	}
	echo "</select>";
}

function cmbDBidclass($name, $tabel, $f_value, $f_view, $selected, $id, $class) {
	echo "<select name='$name' id='$id' class='$class'><option value=''>--</option>";
	$q = mysql_query("SELECT $f_value, $f_view FROM $tabel ORDER BY $f_view ASC");
	while ($a = mysql_fetch_array($q)) {
		if ($a[0] == $selected) {
			echo "<option value='$a[0]' selected>$a[1]</option>";
		} else {
			echo "<option value='$a[0]'>$a[1]</option>";
		}
	}
	echo "</select>";
}

function cSubmit($name, $value) {
	echo "<tr><td></td><td><input type=\"submit\" name=\"$name\" value=\"$value\"></td></tr>";
}

function getNama($tabel, $field, $fk, $id) {
	$pc_fk 		= explode("|", $fk);
	$pc_id 		= explode("|", $id);
	$j_syarat 	= count($pc_fk);
	
	if ($j_syarat > 1) {
		$where = "WHERE $pc_fk[0] = '$pc_id[0]' AND $pc_fk[1] = '$pc_id[1]' LIMIT 1";
	} else {
		$where = "WHERE $fk = '$id' LIMIT 1";
	}	
	$q = mysql_query("SELECT $field FROM $tabel $where");
	$a = mysql_fetch_array($q);
	return $a[0];
}
function endData($tabel, $field, $w) {
	$q = mysql_query("SELECT MAX($field) FROM $tabel $w");
	$a = mysql_fetch_array($q);
	if ($a[0] == NULL) {
		return "1";
	} else {
		return $a[0]+1;
	}
}

function getData($tabel, $data, $fk, $kv) {
	$q = mysql_query("SELECT $data FROM $tabel WHERE $fk = '$kv' LIMIT 1");
	$a = mysql_fetch_array($q);
	return $a[0];
}

/* UNTUK PSB thok */
function cInput($label, $name, $size, $value) {
	echo "<tr><td width=\"20%\">$label</td><td colspan=\"3\"><input type=\"text\" name=\"$name\" size=\"$size\" value=\"$value\"></td></tr>";
}

function cInput2($label, $name, $size, $value) {
	$pc_label = explode("|", $label);
	$pc_name  = explode("|", $name);
	$pc_size  = explode("|", $size);
	$pc_value = explode("|", $value);
	
	$label1 = $pc_label[0]; $label2 = $pc_label[1];
	$name1 = $pc_name[0]; $name2 = $pc_name[1];
	$size1 = $pc_size[0]; $size2 = $pc_size[1];
	$value1 = $pc_value[0]; $value2 = $pc_value[1];
	
	echo "
	<tr>
	<td width=\"20%\">$label1</td><td width=\"30%\"><input type=\"text\" name=\"$name1\" size=\"$size1\" value=\"$value1\"></td>
	<td width=\"20%\">$label2</td><td width=\"30%\"><input type=\"text\" name=\"$name2\" size=\"$size2\" value=\"$value2\"></td>
	</tr>";
}
function cCmbTglLahir($tmp_lhr_value) {
	echo "<tr><td width=\"20%\">Tempat Lahir</td>
	<td colspan=\"3\"><input type=\"text\" name=\"tgl_lahir\" size=\"30\" value=\"$tmp_lhr_value\"> , 
	Tgl. Lahir ";
	
	echo "<select name='tgl_lahir'><option value=''>--</option>";
	for ($tg =1; $tg <=31; $tg++) {
		echo "<option value='$tg'>$tg</option>";
	}	
	echo "</select> - <select name='bln_lahir'><option value=''>--</option>";
	for ($bl =1; $bl <=12; $bl++) {
		echo "<option value='$bl'>$bl</option>";
	}	
	echo "</select> - <select name='thn_lahir'><option value=''>--</option>";
	for ($th = 2012; $th >=1990; $th--) {
		echo "<option value='$th'>$th</option>";
	}
	echo "</td></tr>";
}


function cCmbPekerjaan($val1, $val2) {
	echo "<td width=\"20%\">Pekerjaan Ayah</td><td width=\"30%\"><select name='pkj_ay'><option value=''>--</option>";
	$q = mysql_query("SELECT * FROM t_pkj ORDER BY pkj ASC");
	while ($a = mysql_fetch_array($q)) {
		echo "<option value='$a[0]'>$a[1]</option>";
	}
	echo "</select></td><td width=\"20%\">Pekerjaan Ibu</td><td width=\"30%\"><select name='pkj_ib'><option value=''>--</option>";
	$r = mysql_query("SELECT * FROM t_pkj ORDER BY pkj ASC");
	while ($b = mysql_fetch_array($r)) {
		echo "<option value='$b[0]'>$b[1]</option>";
	}
	echo "</select></td></tr>";
}

function cCmbPendidikan($val1, $val2) {
	echo "<td width=\"20%\">Pendidikan Ayah</td><td width=\"30%\"><select name='pend_ay'><option value=''>--</option>";
	$q = mysql_query("SELECT * FROM t_penddk ORDER BY id_penddk ASC");
	while ($a = mysql_fetch_array($q)) {
		echo "<option value='$a[0]'>$a[1]</option>";
	}
	echo "</select></td><td width=\"20%\">Pendidikan Ibu</td><td width=\"30%\"><select name='pend_ib'><option value=''>--</option>";
	$r = mysql_query("SELECT * FROM t_penddk ORDER BY id_penddk ASC");
	while ($b = mysql_fetch_array($r)) {
		echo "<option value='$b[0]'>$b[1]</option>";
	}
	echo "</select></td></tr>";
}

function cRadio($label1, $name, $label, $value) {
	$pc_label = explode("|", $label);
	$pc_value = explode("|", $value);
	$j_radio = count($pc_label);
	
	echo "<tr><td width=\"20%\">$label1</td><td colspan=\"3\">";
	for ($i = 0; $i < $j_radio; $i++) {
		echo "<input type='radio' name='$name' value='$pc_value[$i]'>&nbsp;<label>$pc_label[$i]</label>&nbsp;";
	}
	echo "</td></tr>";
}

function cPrestasi($val_nama, $val_tkt) {
	for ($i=1; $i<=3; $i++) {
		echo "<tr><td width=\"20%\">Prestasi $i</td><td colspan=\"3\"><input type='text' size='50' name='pres$i_nama'>&nbsp;&nbsp;&nbsp;Tingkat <select name='tgkt_$i'>";
		$q = mysql_query("SELECT * FROM t_prestasi ORDER BY id_prestasi ASC");
		while ($b = mysql_fetch_array($q)) {
			echo "<option value='$b[0]'>$b[1]</option>";
		}
		echo "</select></td></tr>";
	}
}

function cPilihanJurusan() {
	echo "<tr>";
	for ($i=1; $i<=2; $i++) {
		echo "<td width=\"20%\">Pilihan $i</td><td width='30%'><select name='jur$i'><option value=''>--</option>";
		$q = mysql_query("SELECT * FROM t_jurusan ORDER BY id_jur ASC");
		while ($a = mysql_fetch_array($q)) {
			echo "<option value='$a[0]'>$a[1]</option>";
		}
		echo "</td>";
	}
	echo "</tr>";
}
?>