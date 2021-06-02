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
</div>
<div class="panel-body">

<table class="table table-hover" border="1" cellpadding="4" width="100%">
 <thead>
<tr>
<td>Forum</td>
<td>Konu Sayısı</td>
<td>Cevap Sayısı</td>
<td>Son Mesaj</td>
<td>Tarih</td>
</tr>
 </thead>
 <tbody>
<?php
$sql = ("SELECT * FROM forum ORDER BY id ASC");
$query1 = mysqli_query($con,$sql); 
while ($output1 = mysqli_fetch_assoc($query1))
{
	echo '<tr>';
	echo '<td><a href="konular.php?id='.$output1['id'].'">'.$output1['name'].'</a></td>';
	echo '<td>'.$output1['konular'].'</td>';
	echo '<td>'.$output1['cevaplar'].'</td>';
	if (empty($output1['lastposter']))
	{
		echo '<td>Hiç Konu Yok</td>
		<td></td>
		';
		
		echo'</tr>';
	}
	else
	{
	echo '<td><a href="/@'.$output1['lastposter'].'">@'.$output1['lastposter'].'</a> </td>';
	echo '<td>'.date('d-m-y G:i', $output1['lastpostdate']).'</td> ';
	echo'</tr>';
	}
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