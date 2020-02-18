<?php
$host="localhost";
$user="root";
$password="";
$database="ri32_db";

ini_set('display_errors',FALSE);

$koneksi=mysql_connect($host,$user,$password);
mysql_select_db($database,$koneksi);
if($koneksi){
	//echo "berhasil koneksi";
}else{
	echo "gagal koneksi";
}

//fungsi konversi
function formatBytes($size, $precision = 2){
    $base = log($size) / log(1024);
    $suffixes = array('', ' KB', ' MB', ' GB', ' TB');   
    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}
?>