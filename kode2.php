<?php
include "lib/fungsi.php";

$id_kode1 = $_GET['id_kode1'];
echo "<select name='kode2'>";
$q = mysql_query("SELECT * FROM r_kodebrg2 WHERE kode1 = '$id_kode1'");
while ($a = mysql_fetch_array($q)) {
	if ($a[1] == $kode2) {
		echo "<option value='$a[1]' selected>$a[2]</option>";
	} else {
		echo "<option value='$a[1]'>$a[2]</option>";
	}
}
echo "</select>";

?>