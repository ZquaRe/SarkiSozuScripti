<?php require_once('Sistem/fonksiyon.php'); ?>

<!-- ETIKET -->

<title><?php echo $siteadi; ?></title>
<meta name="application-name" content="<?php echo $siteadi; ?>" />
<meta name="author" content="<?php echo $siteadi; ?>" />
<meta name="robots" content="All" />
<meta name="description" content="<?php echo $siteaciklama; ?>" />
<meta name="keywords" content="<?php echo $siteetiket; ?>" />
<meta name="rating" content="General" />
<meta name="dcterms.title" content="<?php echo $siteadi; ?>" />
<meta name="dcterms.contributor" content="<?php echo $siteadi; ?>" />
<meta name="dcterms.creator" content="<?php echo $siteadi; ?>" />
<meta name="dcterms.publisher" content="<?php echo $siteadi; ?>" />
<meta name="dcterms.description" content="<?php echo $siteaciklama; ?>" />
<meta name="dcterms.rights" content="<?php echo $siteadi; ?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $siteadi; ?>" />
<meta property="og:description" content="<?php echo $siteaciklama; ?>" />
<meta property="twitter:title" content="<?php echo $siteadi; ?>" />
<meta property="twitter:description" content="<?php echo $siteaciklama; ?>" />


<!-- ETIKET BITIŞ -->

<br>
    <div class="container">
      <div class="row">
        <div class="col-md-6" style="display: block;">
          <h4 class="text-center">
            En eklenen 10 şarkı sözü
          </h4>
          <ul class="list-group">
<?php
$sonuc = mysql_query("SELECT * from ".$onek."sarki ORDER BY sarki_id DESC limit 10");

if(mysql_num_rows($sonuc)!=0)
{
    while($oku = mysql_fetch_assoc($sonuc))
    {
    ?>
                <a href="index.php?sarki=<?php echo $oku['sarki_id']; ?>">
          <li class="list-group-item">
           <?php echo $oku['sarki_sarkici']; ?> - <?php echo $oku['sarki_adi']; ?> 
            </li>
          </a>
          <br>
  <?php
    }
}
?>


  
          </ul>
        </div>
        <div class="col-md-6" style="display: block;">
          <h4 class="text-center">
            En çok görüntülenen 10 şarkı sözü
          </h4>



      <ul class="list-group">

<?php
$sonuc = mysql_query("SELECT * from ".$onek."sarki ORDER BY sarki_goruntulenme DESC limit 10");

if(mysql_num_rows($sonuc)!=0)
{
    while($oku = mysql_fetch_assoc($sonuc))
    {
      if($oku['sarki_goruntulenme'] == 0)
      {
        break;
      }
    ?>
                <a href="index.php?sarki=<?php echo $oku['sarki_id']; ?>">
            <li class="list-group-item">
            <span class="badge"><?php echo $oku['sarki_goruntulenme']; ?></span>
           <?php echo $oku['sarki_sarkici']; ?> - <?php echo $oku['sarki_adi']; ?> 
            </li>
          </a>
          <br>
  <?php
    }
}
?>
        </div>
      </div>