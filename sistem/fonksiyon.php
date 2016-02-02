    <?php require_once('Sistem/db.php'); ?>


<?php
//Site Ayarları

$siteurl          = "http://kodizyon.com";
$siteadi          = "Kodizyon.com";
$Facebook_Link    = "kodizyon"; //facebook.com eklemeyin.
$Twitter_Link     = "kodizyon"; //twitter.com  eklemeyin.
$siteaciklama     = "Birbirinden ünlü şarkıların sözleri burada.";
$siteetiket       = "Sarki,Sozleri,Burada,Sarkici,";

//Site Ayarları


//Güvenlik Ayarları
function post($deger)
{
if(isset($_POST[$deger]))
{
return strip_tags(htmlentities(htmlspecialchars(addslashes(trim($_POST[$deger])))));
}
else
{
	return false;
}
}

function get($deger)
{
if(isset($_GET[$deger]))
{	
return strip_tags(htmlentities(htmlspecialchars(addslashes(trim($_GET[$deger])))));
}
else
{
	return false;
}
}

function guvenlisayi($sayi)
{
	if(!(int)number_format(intval((trim($sayi)))) <= 0 || !(int)number_format(intval((trim($sayi)))) <= -1)
	{
		if(!$sayi <=-1 || $sayi <= 0)
		{
		 return (int)(intval(trim(number_format($sayi))));
		}
	}
}

//Güvenlik Ayarları Bitiş

//Site Durum Ayarları

$sonuc = mysql_query("SELECT * from ".$onek."site");

if(mysql_num_rows($sonuc)!=0)
{
    while($oku = mysql_fetch_assoc($sonuc))
    {
$sitedurum 				=	$oku['db_site_durum'];
$sitetoplamgosterim 	=	$oku['db_site_toplam_goruntulenme'];
    }
}else{
$sitedurum 				= 0;
$sitetoplamgosterim 	= 0;

}
//Site Durum Ayarları Bitiş

//Kara Liste Ayarları
$KaraListe = mysql_query("SELECT * from ".$onek."karaliste");

if(mysql_num_rows($KaraListe)!=0)
{
    while($Kara = mysql_fetch_assoc($KaraListe))
    {
$KaraIP        = $Kara['ip'];
$KaraKonum   = $Kara['konum'];
    }
}
else
  {
  $KaraIP        = "0";
$KaraKonum   = "-";
}
//Kara Liste Ayarları Bitiş


//Tarih işlemleri
date_default_timezone_set('Europe/Istanbul');
$gunler = array(
    'Pazartesi',
    'Salı',
    'Çarşamba',
    'Perşembe',
    'Cuma',
    'Cumartesi',
    'Pazar'
);
 
$aylar = array(
    'Ocak',
    'Şubat',
    'Mart',
    'Nisan',
    'Mayıs',
    'Haziran',
    'Temmuz',
    'Ağustos',
    'Eylül',
    'Ekim',
    'Kasım',
    'Aralık'
);
 
$ay = $aylar[date('m') - 1];
$gun = $gunler[date('N') - 1];
$jcek = date('j');
$ycek = date('Y');
$hiscek = date('H:i:s');

function timeConvert ( $zaman ){
   $zaman =  strtotime($zaman);
   $zaman_farki = time() - $zaman;
   $saniye = $zaman_farki;
   $dakika = round($zaman_farki/60);
   $saat = round($zaman_farki/3600);
   $gun = round($zaman_farki/86400);
   $hafta = round($zaman_farki/604800);
   $ay = round($zaman_farki/2419200);
   $yil = round($zaman_farki/29030400);
   if( $saniye < 60 ){
      if ($saniye == 0){
         return "az önce";
      } else {
         return $saniye .' saniye önce';
      }
   } else if ( $dakika < 60 ){
      return $dakika .' dakika önce';
   } else if ( $saat < 24 ){
      return $saat.' saat önce';
   } else if ( $gun < 7 ){
      return $gun .' gün önce';
   } else if ( $hafta < 4 ){
      return $hafta.' hafta önce';
   } else if ( $ay < 12 ){
      return $ay .' ay önce';
   } else {
      return $yil.' yıl önce';
   }
}



function getUserCountry($ip) {
    $url = "http://api.wipmania.com/".$ip."?k=test&t=json";
    $ch = curl_init();
    $headers = "Typ: phpcurl\r\n";
    $headers .= "Ver: 1.0\r\n";
    $headers .= "Connection: Close\r\n\r\n";
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array($headers));
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}


/*function GetIP(){
	if(getenv("HTTP_CLIENT_IP")) {
 		$ip = getenv("HTTP_CLIENT_IP");
 	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 		$ip = getenv("HTTP_X_FORWARDED_FOR");
 		if (strstr($ip, ',')) {
 			$tmp = explode (',', $ip);
 			$ip = trim($tmp[0]);
 		}
 	} else {
 	$ip = getenv("REMOTE_ADDR");
 	}
	return $ip;
}*/

function IPAdres()
{

$Site = @file_get_contents("http://wWw.ip-adres.com/");

if($Site)
{

preg_match_all('@<div id="getip">(.*?)</div>@si',$Site,$DegerDonder);
return strip_tags($DegerDonder[1][0]);
}
else
{
  $Site2 = @file_get_contents("http://www.ip-numaram.net/");
  if($Site2)
  {
    preg_match_all('@<span class="cf ana-ip2">(.*?)</span>@si',$Site2,$DegerDonder2);
    return strip_tags($DegerDonder2[1][0]);
  }
}
}
?>