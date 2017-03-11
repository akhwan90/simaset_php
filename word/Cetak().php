<?php
include "../lib/fungsi.php";
$nama_ruang = getData("r_ruang", "nama_ruang", "id_ruang", $_GET['id_ruang']);
header("Content-Disposition: attachment; filename=dir_".$nama_ruang.".doc");
header( "content-type: text/xml" );
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>\n";
echo "<?mso-application progid=\"Word.Document\"?>\n";
include ("c_dir2.xml");
?>