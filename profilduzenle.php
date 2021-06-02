<?php 
include("baglanti.php");
ob_start();
session_start();
$bkm = "SELECT * FROM ayarlar";
$bakim=mysqli_query($con,$bkm);
$bakims=mysqli_fetch_array($bakim,MYSQLI_ASSOC);
if($bakims["site_durum"] == 1){
header("Refresh:0; url=sayfa/bakim.php");	   
}

$login=$_COOKIE["kullanici"]; 
if($login==""){ 	
header("Refresh: 0; url=index.php");
}
?> 
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
$sql = "SELECT * FROM ayarlar";
$result=mysqli_query($con,$sql);
$title=mysqli_fetch_array($result,MYSQLI_ASSOC);
echo '<title>'.$title['title'].'</title>' ;
    ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="/assets/lib/stroke-7/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/theme-switcher/theme-switcher.min.css">
	<link type="text/css" href="/assets/css/app.css" rel="stylesheet">  
	</head>
 <body>
	<!-- Üst Menü -->
    <nav class="navbar navbar-expand navbar-dark mai-top-header">
      <?php require('sayfa/ustmenu.php') ?>
    </nav>
	<!-- Üst Menü Son -->
    <div class="mai-wrapper">
      <nav class="navbar navbar-expand-lg mai-sub-header">
        <div class="container">
          <!-- Mega Menu Başlangıç -->
		  <?php require('sayfa/megamenu.php') ?>
             <!-- Mega Menu Son -->      
        </div>
      </nav>
      <div class="main-content container">




            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Profil
                        </div>
<?php
$bilgiler=$_COOKIE["kullanici"]; 

if($bilgiler==""){ 	
?>
 <center>Giriş Yapınız</center>  
<?php  
 }else{ 
 
?>	

                        <div class="panel-body">

<?php
$idpc = intval($_GET['idp']); 

$sql = "select * from uyeler where uyeno=$idpc";

$result=mysqli_query($con,$sql);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

?>
<form action="profilduzenlekaydet.php" method="post" enctype="multipart/form-data"> 

  <div class="form-group">
    <label for="exampleFormControlInput1">Üye Ad</label>
    <input type="text" name="uyeadiekle" value="<?php echo $row["UyeAd"];?>" class="form-control" id="exampleFormControlInput1" 
	placeholder="" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Üye Soyad</label>
    <input type="text" name="uyesoyad" value="<?php echo $row["UyeSoyad"];?>" class="form-control" id="exampleFormControlInput1" 
	placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="text" name="email" value="<?php echo $row["email"];?>" class="form-control" id="exampleFormControlInput1" 
	placeholder="" required>
  </div>

   <div class="form-group">
    <label for="exampleFormControlInput1">Dogum Tarihi</label>
    <input type="date" name="dogumtarihi" value="<?php echo $row["DogumTarihi"];?>" class="form-control" id="exampleFormControlInput1" 
	placeholder="facebook">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Hakkımda</label>
    <textarea name="hakkimda" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $row["uyehakkinda"];?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Facebook</label>
    <input type="text" name="facebook" value="<?php echo $row["uyefacebook"];?>" class="form-control" id="exampleFormControlInput1" 
	placeholder="facebook">
  </div>
  
      <div class="form-group">
    <label for="exampleFormControlFile1">Mevcut Resim</label>
	<br>
     <?php 

  if($row["uyeresim"]){
	  
	   ?>
	  <img src="<?php echo $row["uyeresim"];?>" width="70" height="70" alt="profil duzenle" class="rounded-circle" >
	  <?php
	  
  }else {
	  
	  ?>
	  <img src="resim/no_avatar.jpg" width="70" height="70" alt="profil duzenle" class="rounded-circle" >
	  <?php
	  
  }

?> 
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">Resim düzenle</label>
    <input type="file" name="resim" class="form-control-file" id="exampleFormControlFile1">
  </div>
   
  
  <div id="displayDivId" style="display: none;">
    <div class="form-group">
    <input type="text" name="resimisim" value="<?php echo $row["uyeresim"];?>" class="form-control" id="exampleFormControlInput1">
  </div>
   </div>
  
  <button type="submit" class="btn btn-primary pull-right mb-5">Duzenle</button>
</form>

		
                 </div>
         <?php
}
?>
                    </div>
                </div>        
            </div> 



</div>
	<!-- Stil Dosyaları -->
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="/assets/js/app.js" type="text/javascript"></script>
    <script src="/assets/lib/theme-switcher/theme-switcher.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="/assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      	App.dashboard();
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
      	App.livePreview();
      });
    </script>
<div class="tooltip-chart" style="display: none; position: absolute;"></div>
</body>
</html>			
        