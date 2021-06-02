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

$aliciid = (int) $_GET['id'];

header('X-XSS-Protection: 0');

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
    <link rel="shortcut icon" href="assets/img/favicon.png">
	
	<link type="text/css" href="assets/css/app.css" rel="stylesheet"> 
	
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/theme-switcher/theme-switcher.min.css">
	 
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
          <div class="col-md-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
            
                        <div class="panel-body" style="">
						
<?php
$sqlal="SELECT * from uyeler WHERE uyeno='$aliciid'";
$sorgu2=mysqli_query($con,$sqlal);
$alici = mysqli_fetch_array($sorgu2);
$aliciadicek=$alici['uyeadi'];
$aliciadicekno=$alici['uyeno'];


$sqlı="SELECT * from uyeler WHERE uyeadi='$login'";
$sorgu=mysqli_query($con,$sqlı);
$gon = mysqli_fetch_array($sorgu);
$gonderenidver = $gon['uyeno'];
?>

<?PHP
if($gonderenidver==$aliciid){
	echo '
      <div style="line-height:55px;" class="alert alert-danger alert-dismissible">
	 <a href="javascript:javascript:history.go(-1)" class="close">&times;</a>
  <strong>Hata!</strong> Kendinize mesaj gönderemezsiniz?
</div>';
}
else{
 ?>
						
						 <form action="mesajgonderildi.php" method="post">
						 <?php
						 
						 if($aliciid==0){
							 echo '
			<div id="displayDivId" style="display: none;">
      <select name="msjgonderenid" required>
   <option value="'.$gonderenidver.'"></option>
    </select>
  </div>				 
	<div class="form-group">
    <label>Kime: </label>
    <input type="text" name="msjalanid" class="form-control" placeholder="Üye Adı Girin" required>
  </div>
  
  ';
						 }
						 else{
							 
							 echo '
							   <div id="displayDivId" style="display: none;">
      <select name="msjalanid" required>
   <option value="'.$aliciadicekno.'"></option>
    </select>
  </div>
  							   <div id="displayDivId" style="display: none;">
      <select name="msjgonderenid" required>
   <option value="'.$gonderenidver.'"></option>
    </select>
  </div>
							 Alıcı: <a href="/@'.$aliciadicek.'">@'.$aliciadicek.'</a>';
						 }
						 
						 ?>

  
  <div class="form-group">
    <label>Başlık</label>
    <input type="text" name="baslik" class="form-control" placeholder="Mesaj Başlığı" required>
  </div>
  <div class="form-group">
    <label>Mesaj İçeriği</label>
    <textarea rows="5" name="icerik" class="form-control" required>
    </textarea>
  </div>
 
  <button type="submit" class="btn btn-default">Gönder</button>
</form>
						
<?php 
} 
?>						
						
						
						
                        </div>
                    </div>
          </div>
        </div>
    </div>

	<!-- Stil Dosyaları -->
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/theme-switcher/theme-switcher.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
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