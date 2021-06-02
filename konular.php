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
<?php
ob_start();
$id = (int) $_GET['id'];
if ($id < 1)
{
	header('Location: forum.php');
	exit();
}
ob_end_clean();
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
	  
	<div style="height:35px;" class="alert alert-success">
<strong>
<h4>
<?php
$sql=("SELECT name FROM forum WHERE id='$id' ");
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
echo $row['name'];
?>
</h4>
</strong> 

</div>  


<div align="right"><button type="button" class="btn btn-warning"><a href="yenikonu.php?type=konular&id=<? echo $id; ?>"><i class="fa fa-file" aria-hidden="true"></i> <font color="blue"><b><strong>Yeni Konu Aç</strong></b></font></a></button></div>

<br>
<table class="table table-hover" border="1" cellpadding="4" width="100%">
<thead>
<tr>
<td>Konu</td>
<td>Konuyu Başlatan</td>
<td>Tarih</td>
<td>Son Mesaj</td>
<td>Cevaplar</td>
</tr>
</thead>
<?php
$sql2=("SELECT * FROM konular WHERE forumid='$id' ORDER BY id DESC");
$query2 = mysqli_query($con,$sql2);
$queryx=mysqli_num_rows($query2);
$x = 0;
if ($queryx == $x)
	echo '<td colspan="5">Konu Bulunamadı</td>';
else
{
	
  while( $output = mysqli_fetch_assoc($query2) ) {
   echo '<tr>';
		echo '<td><a href="cevaplar.php?id='.$output["id"].'">'.$output["subject"].'</a></td>';
		echo '<td><a href="/@'.$output["poster"].'"><font color="blue">@'.$output["poster"].'</font></a></td>';
		echo '<td>'.date("D-m-y G:i", $output["date"]).'</td>';
		
		if(empty($output["lastposter"]))
			echo '<td colspan="2">Cevap Verilmemiş</td>';
		else
		{
			echo '<td><a href="/@'.$output["lastposter"].'">@'.$output["lastposter"].'</a> || '.date("d-m-y G:i", $output["lastpostdate"]).'</td>';
				echo '<td>'.$output["cevaplar"].'</td>';
		}
	
		echo '</tr>';
   }
		

}
?>
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