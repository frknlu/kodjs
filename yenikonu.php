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
$idlink = (int) $_GET['id'];
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
	
	
		  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
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
	

<form name="form1" id="form1" method="post" action="forumpost.php?type=konular&id=<? echo $idlink; ?>">

<?php 
if($idlink==0){
	echo'
    <div class="form-group">
    <label>Konu Seç</label>
    <select class="form-control" name="slct_konu" required>';
	$sql="SELECT * FROM forum";
    $kategori_cek = mysqli_query($con,$sql);
	while($kategori_cek_yeni =  mysqli_fetch_array($kategori_cek)){
	echo '<option value="'.$kategori_cek_yeni["id"].'">'.$kategori_cek_yeni["name"].'</option>';
	}
	echo '</select></div>';
}
else{
	
	
}
?>


<div class="form-group">
<label for="exampleFormControlFile1">Konu Adı</label>
<br>
<div class="form-group">
<input name="subject" id="subject" type="text" class="form-control" placeholder="Konu Adı" />
</div>

<div class="form-group">
<label for="exampleFormControlFile1">Mesaj</label>
<br>
<div class="form-group">
<textarea class="form-control" name="message" id="message" cols="30" rows="5"></textarea>
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

<center>
<input type="submit" class="form-control" name="submit" id="submit" value="Tamam" />
</center>
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