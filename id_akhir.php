<?php
include "lib/fungsi.php";

$id_kode1 = $_GET['id_kode1'];
$id_kode2 = $_GET['id_kode2'];

$q_akhir1 = mysql_query("SELECT MAX(kode_brg1) FROM t_barang WHERE kode_brg1 = '$id_kode1'");
$q_akhir2 = mysql_query("SELECT MAX(kode_brg2) FROM t_barang WHERE kode_brg1 = '$id_kode1' AND kode_brg2 = '$id_kode2'");

$a_akhir1 = mysql_fetch_array($q_akhir1);
$a_akhir2 = mysql_fetch_array($q_akhir2);

echo "<input type='text' name='kodeakhir' value='$id_kode1-$id_kode2'>";
?>