<?php
include("baglanti.php");
ob_start();
session_start();

$id = $_GET["id"];

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
$sql1 = "SELECT * FROM kategori WHERE id=$id";
$sql2 = "SELECT * FROM ayarlar";
$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
echo "<title>".$row1["mbaslik"]." - ".$row2["title"]."</title>";
?>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="/assets/lib/stroke-7/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/theme-switcher/theme-switcher.min.css">
	<link type="text/css" href="/assets/css/app.css" rel="stylesheet">  
	
	<style>
	
	
	
.block {
    text-align: center;
    vertical-align: middle;
}
.circle {
    background: red;
    border-radius: 200px;
    color: white;
    height: 105px;
    font-weight: bold;
    width: 105px;
    display: table;
    margin: 10px auto;
}
.circle p {
    vertical-align: middle;
    display: table-cell;
}

.testimg{
background: url(img/diger-test.gif) no-repeat;
background-size: cover;
}

.button-test{
	border: 2px solid red;
    padding: 10px;
    border-radius: 25px;
	height:150px;
	width:200px;
	color: rgba(255, 255, 255, 0.69);
	font-size:22px;
    text-transform: uppercase;
	font-weight: bold;
	
}
	
	</style>
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


<?php
$login=$_COOKIE["kullanici"]; 
if($login==""){ 
	
header("Refresh:4; url=index.php");
$hidediv="display: none;";


echo '
<body>
<center>
 <div class="modal-body">
	  <center><img src="img/time.gif" style="width:100px; height:100px;"><img></center>
	  <br>
       <h4> <p>Oturum Süreniz Bitti Lütfen Tekrar Giriş Yapınız</p><br></h4>
		<bold> <p>5sn içinde yönlendirilceksiniz.</p></bold
      </div>
</center>
</body>
';

}
else {
	$hidediv="";
	 }
?>



<div id="hide" style="<?php echo $hidediv ?>">

			<div class="row">
			<div class="col-lg-12">
<?php
$kullanici = $_COOKIE["kullanici"];	

/*Kategori Bul ve puan getir*/
$sqlkategori = "SELECT * FROM kategori WHERE id=$id";
$kategoriidbul = mysqli_query($con,$sqlkategori); 
$kategorisonuc = mysqli_fetch_array($kategoriidbul,MYSQLI_ASSOC);
$idpuanw = $kategorisonuc["gpuan"];
$kategoribul=$kategorisonuc["kategori"];

if($kategoribul==1)
{
	$kategoriadi="JavascriptPuan";
}
elseif($kategoribul==2)
{
	$kategoriadi="AngularPuan";
}
elseif($kategoribul==3)
{
	$kategoriadi="JqueryPuan";
}
elseif($kategoribul==4)
{
	$kategoriadi="KnockoutPuan";
}
elseif($kategoribul==5)
{
	$kategoriadi="BackbonePuan";
}
else
{
	$kategoriadi="HATA";
}


/*Üye Bul ve Üye Puan Çek*/
$sqluyepuan = "select * from uyeler where uyeadi='$kullanici'"; 
$result3=mysqli_query($con,$sqluyepuan);
$yaz = mysqli_fetch_array($result3,MYSQLI_ASSOC);
$uyepuan = $yaz[$kategoriadi];
$uyeid = $yaz['uyeno'];
 
if($uyepuan<$idpuanw){  

echo "<center> 
			<bold>PUAN</bold>
        <div class='block'>
            <div class='circle'>
                <p><bold><font size='14' color='#FFF'>".$uyepuan."</font></bold></p>
            </div>
        </div>
<br> <bold>
Bu Konuyu Görmek İçin Gerekli <font color='#039128'>(".$idpuanw.")</font> Puana Sahip Değilsiniz.<br> <small>İpucu: Bir önceki dersin testini tamamlayarak konuyu görebilirsiniz.</bold><small></center><br>";
?>			
<?php 
}else{ 
?> 		
	
                
<?php
$adim = $_GET["adim"];
switch($adim){
case "": 
?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <?php

$sql2 = "UPDATE kategori SET hit=hit+1 WHERE id=$id";
$hit_ekle = mysqli_query($con,$sql2); 
$sql3 = "SELECT * FROM kategori WHERE id=$id";
$makale_goster = mysqli_query($con,$sql3); 
$makale_goster_yeni = mysqli_fetch_array($makale_goster,MYSQLI_ASSOC);
$kategoribul=$makale_goster_yeni['kategori'];

if($kategoribul==1)
{
	$kategoriadi="Javascript";
}
elseif($kategoribul==2)
{
	$kategoriadi="AngularJS";
}
elseif($kategoribul==3)
{
	$kategoriadi="Jquery";
}
elseif($kategoribul==4)
{
	$kategoriadi="Knockout";
}
elseif($kategoribul==5)
{
	$kategoriadi="Backbone";
}
else
{
	$kategoriadi="!!! Sorgu Hatası";
}

echo '<font size="4"><b>'.$makale_goster_yeni['mbaslik'].'</b></font><br /><b>Tarih:</b> '.$makale_goster_yeni['tarih'].' - <b>Okunma:</b> '.$makale_goster_yeni['hit'].' - <b>Kategori:</b> '.$kategoriadi.''


?>

                        </div>
             
                        <div class="panel-body">

<?php
$sql24="SELECT * FROM kategori WHERE id=$id";

$makale_goster = mysqli_query($con,$sql24); 
$makale_goster_yeni = mysqli_fetch_array($makale_goster,MYSQLI_ASSOC);

echo $makale_goster_yeni["icerik"];

$result24 = mysqli_query($con,$sql24);
$row2 = mysqli_fetch_array($result24,MYSQLI_ASSOC);

						
	$testsecildix2 = $row2["kategori"];
	$testsecildiax2 = $row2["kategoritest_id"];
		
$kategoribul=$testsecildix2;

if($kategoribul==1)
{
	$kategoriadi="Javascript";
}
elseif($kategoribul==2)
{
	$kategoriadi="AngularJS";
}
elseif($kategoribul==3)
{
	$kategoriadi="Jquery";
}
elseif($kategoribul==4)
{
	$kategoriadi="Knockout";
}
elseif($kategoribul==5)
{
	$kategoriadi="Backbone";
}
else
{
	$kategoriadi="!!! Sorgu Hatası";
}
?>

<center>
<?php 
$kategorivarmi = $row2["kategori"];
$kategoritestivarmi = $row2["kategoritest_id"];

if(is_null($kategoritestivarmi)){
	echo "<br><br><b><font color='black'>Konu Testi Mevcut Değil!</font></b><br>";
}
else if($uyepuan<$idpuanw){
?>
<br><br>
<b><font color="black">Diğer derse geçmek için konu testini tamamlamanız gerekir !</font></b><br>
<small><font color="black"><?php echo "Konu: ".$kategoriadi." Test: ".$testsecildiax2."";?></font></small>
<form method="POST" action="sorular.php">
<div id="hide" style="display: none;">
<select name="testsec">
  <option value="<?php echo $row2["kategori"]; ?>" required></option>
	</select>
	<select name="testsec2">
	<option value="<?php echo $row2["kategoritest_id"]; ?>" required></option>
	</select>
</div>
<br>
<div id="Button">
<input type="submit" class="btn btn-default testimg button-test" Value="Teste Başla" />
</div>
</form>
<?php 
}
else if($uyepuan==$idpuanw){
	?>
	<br><br>
	<b><font color="black">Diğer derse geçmek için konu testini tamamlamanız gerekir !</font></b><br>
<small><font color="black"><?php echo "Konu: ".$kategoriadi." Test: ".$testsecildiax2."";?></font></small>
<form method="POST" action="sorular.php">
<div id="hide" style="display: none;">
<select name="testsec">
  <option value="<?php echo $row2["kategori"]; ?>" required></option>
	</select>
	<select name="testsec2">
	<option value="<?php echo $row2["kategoritest_id"]; ?>" required></option>
	</select>
</div>
<br>
<div id="Button">
<input type="submit" class="btn btn-default testimg button-test" Value="Teste Başla" />
</div>

</form>
	<?php
}
else if($uyepuan>$idpuanw){
?>	
<b><font color='black'>Konu Testi Başarıyla Tamamlandı</font></b><br>
<?php 
} 
else{
	echo "hata";
}
?>
</center>

<br>
<br>
<?php
}
?>

							
							
                        </div>
         
                    </div>

                </div>
<?php } ?>
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