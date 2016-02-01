<?php
require_once('Sistem/fonksiyon.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js">
</script>

    <html lang="en">
    <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $siteadi ?></title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/stil.css" rel="stylesheet">

    <?php require_once('Sistem/db.php'); ?>

  <style class="custom-css">
#jumbo {
  background-color: #333;
  color: #eee;
}
#jumbo p {
  font-size: 16px;
}
#try-header {
  margin: 30px 0px;
}
#try-more {
  margin: 30px 0px;
  font-style: italic;
}
</style>

<!-- Helvetica Problemi -->
<style type="text/css">@font-face {
  
  font-family: Helvetica;
  src: local('Arial');
}@font-face {
  
  font-family: 'Helvetica Neue Custom';
  src: local('Arial');
}@font-face {
  
  font-family: Helvetica;
  
  font-weight: bold;
  
  font-weight: 700;
  src: local('Arial');
}@font-face {
  
  font-family: "Helvetica Neue";
  
  font-weight: bold;
  
  font-weight: 700;
  src: local('Arial');
}@font-face {
  
  font-family: "Helvetica Neue Custom";
  
  font-weight: bold;
  
  font-weight: 700;
  src: local('Arial');
}@font-face {
  
  font-family: "Helvetica Neue";
  src: local('Arial');
}</style>
<!-- Helvetica Problemi -->



</head>
  
<body>
<!-- Facebook Code -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.5&appId=157754834423412";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Facebook Code Bitiş -->


<!-- Menü -->

<?php require_once('menu.php'); ?>

<!-- Menü Bitiş -->


<!-- Arama Bölümü -->

<center>
        Arama Yapın.

      <form action="" method="get" class="navbar-form" role="search">
        <div class="form-group">
          <input type="text" name="ara" class="form-control arama" placeholder="Ara">
        </div>
        <div class="form-group tip">
                    <select class="form-control s-select"  name="tip">
                    <option value="sarki">Şarkı</option>
                    <option value="sarkici">Şarkıcı</option>
                    </select>
              </span>

        </div>
        <button type="submit" class="btn btn-default">Ara</button>
      </form>
      </center>


<!-- A'dan Z'ye -->
<center>
<ul class="pagination">
  <?php for ($i='A'; $i <='Z'; $i++) 
  { 
    if($i == 'AA')
    {
      break;
    }
    ?>
        <li>
          <a href="index.php?ara=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
       <?php
       } ?>
      </ul>
</center>
<!-- A'dan Z'ye Bitiş -->

  <?php if($sitedurum == 0) //Site Açıksa
  {
  ?>
<div class="container">
<center>
<div class='alert alert-warning' role='alert'> <strong>UYARI!</strong><br> Ulaşmaya çalıştığınız sayfa şuanda bakım çalışması nedeniyle kapalıdır. Lütfen daha sonra tekrar deneyiniz. <br> Anlayışınız için teşekkür ederiz. 
<img src="img/ikon/gulucuk.png" height="23">
</center>
</div>
<?php
  }
  else
  {
  if($KaraIP == trim(IPAdres()))
    {
      ?>
<div class="container">
<center>
<div class='alert alert-danger' role='alert'> <strong>Üzgünüz!</strong><br>Kara listede gözüküyorsunuz,bu sayfayı görüntülemeye yetkiniz yok. <img src="img/ikon/uzgun.png" height="23"></center>
</div>
<?php
    }
    else//Kara Liste
    { //KaraListe
  //ARAMA EKRANI
    if(get('ara'))
    {
  if(get('tip') == 'sarki')
    {

  $Arama = mysql_query("SELECT * from ".$onek."sarki where sarki_adi LIKE '".get('ara')."%'");

if(mysql_num_rows($Arama)!=0)
{
  $EslesenToplamSutun = mysql_num_rows($Arama);
?>

<div class="container">
<h4 class="text-center">
Arama Sonuçları <span class="badge"><?php echo number_format($EslesenToplamSutun); ?></span> Söz Bulundu.
</h4>

<div class="col-md-1" style="display: block;"></div>
<div class="col-md-10" style="display: block;">

<?php
while($oku = mysql_fetch_assoc($Arama))
{
?>

<ul class="list-group">
<li class="list-group-item">
<a href="index.php?sarki=<?php echo $oku['sarki_id']; ?>">
<?php echo $oku['sarki_sarkici']; ?> - <b><?php echo $oku['sarki_adi']; ?> </b> 
</a>
</ul>
</li>


<?php
}
?>
</div>
</div>
</div>
<?php
}
else
{
?>
<div class="container">
<div class="col-md-1" style="display: block;"></div>
<div class="col-md-10" style="display: block;">
<div class="alert alert-warning text-center" role="alert"> <strong>Eşleşen bir sonuç bulunamadı. </strong><img src="img/ikon/uzgun.png" width="25"/></div></ul>
</div>
</div>
</div>
</div>
<?php
}

    } 
    else if(get('tip') == 'sarkici')
    {

  $Arama = mysql_query("SELECT * from ".$onek."sarki where sarki_sarkici LIKE '".get('ara')."%'");

if(mysql_num_rows($Arama)!=0)
{
  $EslesenToplamSutun = mysql_num_rows($Arama);
?>

<div class="container">
<h4 class="text-center">
Arama Sonuçları <span class="badge"><?php echo number_format($EslesenToplamSutun); ?></span> Söz Bulundu.
</h4>

<div class="col-md-1" style="display: block;"></div>
<div class="col-md-10" style="display: block;">

<?php
while($oku = mysql_fetch_assoc($Arama))
{
?>

<ul class="list-group">
<li class="list-group-item">
<a href="index.php?sarki=<?php echo $oku['sarki_id']; ?>">
<b> <?php echo $oku['sarki_sarkici']; ?> </b> - <?php echo $oku['sarki_adi']; ?> 
</a>
</ul>
</li>


<?php
}
?>
</div>
</div>
</div>
<?php
}
else
{
?>
<div class="container">
<div class="col-md-1" style="display: block;"></div>
<div class="col-md-10" style="display: block;">
<div class="alert alert-warning text-center" role="alert"> <strong>Eşleşen bir sonuç bulunamadı. </strong><img src="img/ikon/uzgun.png" width="25"/></div></ul>
</div>
</div>
</div>
</div>
<?php
}
    }
    else
    {
$Arama = mysql_query("SELECT * from ".$onek."sarki where sarki_adi LIKE '".get('ara')."%'");

if(mysql_num_rows($Arama)!=0)
{
  $EslesenToplamSutun = mysql_num_rows($Arama);
?>

<div class="container">
<h4 class="text-center">
Arama Sonuçları <span class="badge"><?php echo number_format($EslesenToplamSutun); ?></span> Söz Bulundu.
</h4>

<div class="col-md-1" style="display: block;"></div>
<div class="col-md-10" style="display: block;">

<?php
while($oku = mysql_fetch_assoc($Arama))
{
?>

<ul class="list-group">
<li class="list-group-item">
<a href="index.php?sarki=<?php echo $oku['sarki_id']; ?>">
<?php echo $oku['sarki_sarkici']; ?> - <b><?php echo $oku['sarki_adi']; ?> </b> 
</a>
</ul>
</li>


<?php
}
?>
</div>
</div>
</div>
<?php
}
else
{
?>
<div class="container">
<div class="col-md-1" style="display: block;"></div>
<div class="col-md-10" style="display: block;">
<div class="alert alert-warning text-center" role="alert"> <strong>Eşleşen bir sonuç bulunamadı. </strong><img src="img/ikon/uzgun.png" width="25"/></div></ul>
</div>
</div>
</div>
</div>
<?php
}
    }

    ?>

<?php
  }
    else
    {
      if(get('sarki'))
          {

//MYSQL
$SarkiIcerik = mysql_query("SELECT * from ".$onek."sarki where sarki_id='".get('sarki')."'");

if(mysql_num_rows($SarkiIcerik)!=0)
{
while($Getir = mysql_fetch_assoc($SarkiIcerik))
{
?>
<div class="container">
<h4 class="text-center">
<?php echo $Getir['sarki_sarkici']; ?> - <?php echo $Getir['sarki_adi']; ?>
</h4>
<h5 class="text-center">
<small><b><?php echo $Getir['sarki_ekleyen']; ?></b> tarafından <b><?php echo timeConvert($Getir['sarki_tarih']); ?></b> oluşturuldu</small>
</h5>
<div class="col-md-3" style="display: block;"></div>
<div class="col-md-8" style="display: block;">

            <?php
if($Getir['sarki_link'])
{
              YoutubeResim($Getir['sarki_link']);
              ?>
              <br> <br>
              <?php
              YoutubeVideo($Getir['sarki_link']);
?>
<br>
<?php
}
else
{
  echo '<br>';
}
?>
<div class="col-md-3" style="display: block;"></div>
<div class="col-md-8" style="display: block;">
  <?php
      echo $Getir['sarki_icerik'];
            ?>
 </div> </div>

          </div>
        </div>
      </div>
          <?php
}
}
else
{
?>
<div class="container">
<div class="col-md-1" style="display: block;"></div>
<div class="col-md-10" style="display: block;">
<div class="alert alert-warning text-center" role="alert"> <strong>Eşleşen bir sonuç bulunamadı. </strong><img src="img/ikon/uzgun.png" width="25"/></div></ul>
</div>
</div>
</div>
</div>
<?php
}
}
          else
          {


    require_once('ensonkayitlar.php');
      }
    }
  //ARAMA EKRANI BITIŞ
  ?>



<?php 
}//Site Açıksa Bloğu
}//KaraListe Bloğu?>

<!-- Footer -->
<?php require_once('goruntulenme.php'); ?>

<br>
<br>

    </div>
    <div class="container">
 
<!-- Sosyal Medya -->
      <ul class="list-group">
      <li class="list-group-item text-center">
      <div class="fb-like" data-href="http://facebook.com/<?php echo $Facebook_Link; ?>" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
      <a href="https://twitter.com/share" class="twitter-share-button"{count}>Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<a href="https://twitter.com/<?php echo $Twitter_Link ?>" class="twitter-follow-button" data-show-count="false">Follow @<?php echo $Twitter_Link ?></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    
      </ul>
      </li>
<!-- Sosyal Medya Bitiş -->



      <div class="well well-sm text-center">
              <h6 class="text-center">
    <?php echo $siteadi ?> - <?php echo date('Y'); ?>
    </h6>
          Toplam <span class="badge"><?php echo number_format($sitetoplamgosterim); ?></span> görüntülenme.
      </div>
    </div>
    <!-- Footer -->

</body></html>


<?php
//Youtube Işlemleri

function YoutubeResim($Link)
{

$Link = explode("youtube.com/watch?v=", $Link);
?>
<img src="http://img.youtube.com/vi/<?php echo $Link[1]; ?>/hqdefault.jpg" class="img-responsive img-thumbnail" width="125">
<img src="http://img.youtube.com/vi/<?php echo $Link[1]; ?>/1.jpg" class="img-responsive img-thumbnail" width="125">
<img src="http://img.youtube.com/vi/<?php echo $Link[1]; ?>/2.jpg" class="img-responsive img-thumbnail" width="125">
<img src="http://img.youtube.com/vi/<?php echo $Link[1]; ?>/3.jpg" class="img-responsive img-thumbnail" width="125">

<?php
}

function YoutubeVideo($Link)
{

$Link = explode("youtube.com/watch?v=", $Link);
?>
<iframe class="embed-responsive-item" width="510" height="315" src="https://www.youtube.com/embed/<?php echo $Link[1]; ?>" frameborder="0" allowfullscreen></iframe>

<?php
}



//Youtube Işlemleri Bitiş
?>