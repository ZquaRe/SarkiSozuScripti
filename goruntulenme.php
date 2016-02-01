<?php
Require_once('Sistem/fonksiyon.php');


$sonuc = mysql_query("SELECT * FROM ".$onek."ip WHERE ip='".trim(IPAdres())."'");
if(!mysql_num_rows($sonuc)!=0)
{
$sitetoplamgosterim ++;
mysql_query("INSERT INTO ".$onek."ip (ip,konum) VALUES ('".trim(IPAdres())."','".trim(getUserCountry(trim(IPAdres())))."')") or die(mysql_error());
mysql_query("UPDATE ".$onek."site SET db_site_toplam_goruntulenme=".$sitetoplamgosterim.";");
}
?>

