<?php
$Sunucu 			= "localhost";
$kullanici 			= "root";
$sifre 				= "";
$veritabani 		= "sarkisozudb";
$onek 				= "db_";


$baglanti = @mysql_connect($Sunucu, $kullanici, $sifre) or die("<center><div class='alert alert-danger' role='alert'> <strong>HATA!</strong> Mysql bağlantısı sağlanılamadı.</div></center>");
$veritabani = @mysql_select_db($veritabani) or die('<center><div class="alert alert-danger" role="alert"> <strong>HATA!</strong> Veri tabanına bağlantı sağlanılamadı.</div></center>');
mysql_query("SET NAMES UTF8");
?>