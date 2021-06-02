<?php 
include("baglanti.php");
ob_start();
session_start();

$login = $_COOKIE['kullanici'];	

$bkm = "SELECT * FROM ayarlar";
$bakim=mysqli_query($con,$bkm);
$bakims=mysqli_fetch_array($bakim,MYSQLI_ASSOC);
if($bakims["site_durum"] == 1){
header("Refresh:0; url=sayfa/bakim.php");	   
}


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
							<div align="left"><button type="button" class="btn btn-warning"><a href="mesaj_gonder.php"><i class="fa fa-file" aria-hidden="true"></i> <font color="blue"><b><strong>Yeni Özel Mesaj</strong></b></font></a></button></div>
							<br>
						
						
					<table class="table table-hover" border="1" cellpadding="4" width="100%">
 <thead>
<tr>
<td>Mesajı Görüntüle</td>
<td>Gönderen</td>
<td>Mesaj Konusu</td>
<td>Mesaj</td>
<td>Tarih</td>
<td><center>Sil</center></td>
</tr>
 </thead>
 <tbody>
<?php
$uyebilgi=mysqli_query($con,"select * from uyeler where uyeadi='$login'");
$uye=mysqli_fetch_assoc($uyebilgi);
$msjalanidcek=$uye["uyeno"];/*mesaj sahibi id alındı*/

$sqlm = ("SELECT * FROM mesajlar where msj_alan_id='$msjalanidcek' ORDER BY msj_tarih ASC");/*msj sahibi id ye göre mesaj alındı*/
$querym = mysqli_query($con,$sqlm); 


while ($mesaj = mysqli_fetch_assoc($querym))
{
$gonderenno=$mesaj["msj_gonderen_id"];

$msjgonderen=mysqli_query($con,"select * from uyeler where uyeno='$gonderenno'");

$mesajgonderenad=mysqli_fetch_assoc($msjgonderen);
	
	echo '<tr>';
    echo '<td><a href="mesajoku.php?id='.$mesaj['msj_id'].'"><center> <<< <font color="#a77e00">OKU</font> >>> </center> </a></td>';
	echo '<td><a target="_blank" href="/@'.$mesajgonderenad["uyeadi"].'"><font color="blue">@'.$mesajgonderenad["uyeadi"].'</font></a></td>';
    echo '<td>'.$mesaj['msj_baslik'].'</td>';
	echo '<td>'.$mesaj['msj_icerik'].'</td>';
	echo '<td>'.$mesaj['msj_tarih'].'</td>';
	echo '<td><center>
	<a style="color:red;" href="mesajsil.php?id='.$mesaj['msj_id'].'"><i class="icon s7-trash"></i></a>
	</center></td>';
	echo '</a>';

}
?>
</tbody>
</table>


						
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