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
<?php 
include("baglanti.php");
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
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=your_API_key"></script>

     <script>
         tinymce.init({
            selector: 'textarea',
            height: 50,
            theme: 'modern',
            plugins: [
               'advlist autolink lists link image charmap print preview hr anchor pagebreak',
               'tinymcespellchecker']
         });
      </script>	
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
<?php
$sql="SELECT * FROM cevaplar WHERE topicid='$id' ORDER BY id ASC";
$result = mysqli_query($con,$sql);
$cevap = mysqli_num_rows($result);


$sww="SELECT * FROM konular WHERE id='$id'";
$sorgu = mysqli_query($con,$sww);
$output=mysqli_fetch_array($sorgu);

echo '<tr><td>Başlık: '.$output['subject'].'  &nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp; Konu Sahibi: <strong><a href="/@'.$output['poster'].'">@'.$output['poster'].'</a></strong></td>';
echo '<td>'.date('D-m-y G:i', $output['date']).'</td></tr>';
echo '<tr><td colspan="2">'.$output['message'].'</td></tr>';
echo '<tr><td colspan="2"><br><br></td></tr>';

if ($cevap == 0)
	echo '<td colspan="2">Hiç yorum yok.</td>';
else
{
	while($row = mysqli_fetch_array($result)){
	
	echo '<tr><td><strong>Yazar:<a href="/@'.$row['poster'].'">'.$row['poster'].'</a></strong></td><td>'.date('d-m-y G:i', $row['date']).'</td></tr>';
	
	     echo '<tr><td colspan="2">'.$row['message'].'</td></tr>';
}
		 }	
		

?>
</table>
<hr />
<form name="form1" id="form1" method="post" action="forumpost.php?type=cevaplar&id=<? echo $id; ?>">

<div class="form-group"><label for="exampleFormControlFile1">Yorum Yaz</label></div>
<!--
<div class="form-group">
<input class="form-control" name="subject" id="subject" type="text" placeholder="Başlık" />
</div>
-->
<div class="form-group">
<textarea class="form-control" name="message" id="message" placeholder=""></textarea>
</div>

<?php 

$sqls = "select * from uyeler where uyeadi='$login' ";

$result = mysqli_query($con,$sqls);

$row=mysqli_fetch_array($result);

$uyenick = $row["uyeadi"];

?>

  <div id="displayDivId" style="display: none;">
      <select name="poster" id="poster" required>
   <option value="<?php echo $uyenick?>"></option>
    </select>
  </div>

  <div id="displayDivId" style="display: none;">
      <select name="konu_sahibi" id="konu_sahibi" required>
   <option value="<?php echo $output['poster']?>"></option>
    </select>
  </div>
  
<input class="form-control" type="submit" name="submit" id="submit" value="Submit" />
</form>


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