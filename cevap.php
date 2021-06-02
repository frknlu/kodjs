<?php 
include("baglanti.php");
ob_start();
session_start();

$login=$_COOKIE["kullanici"]; 

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
    <link rel="shortcut icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="/assets/lib/stroke-7/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/theme-switcher/theme-switcher.min.css">
	<link type="text/css" href="/assets/css/app.css" rel="stylesheet">  

	<script>
window.onbeforeunload = function(e) {
  var dialogText = 'Opps Sayfayı Tekrar Yükleyemezsiniz.';
  e.returnValue = dialogText;
  return dialogText;
};
</script>
<script type="text/javascript">
document.onkeydown = function() 
{
    switch (event.keyCode) 
    {
        case 116 : // klavyeden f5 butonunu tamamen iptal ediyoruz.
            event.returnValue = false;
            event.keyCode = 0;
            return false;
    }
}
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
                            <center>TEST SONUCU</center>
                        </div>
            
                        <div class="panel-body">
                          	 
		 <?php
$sorusayi=1;
$toplamsorusayisi=1;
$ynssorusayisi=0;
$dgrsorusayisi=0;

$soruid=$_POST['soruid']; //soru id'lerinin dizi şeklinde tutulduğu yer. 1,2,6,8 gibi. nesne sayısı 4 adet.

for($i=0; $i<(count($soruid)); $i++){ // i eşittir 0 dedik. i küçükse $soruid'nin karakter sayısından, i yi 1 arttır dedik. bu durumda döngü 4 defa dönecek.

$soru=$soruid[$i]; // soru id dizi şeklinde demiştik. dizideki 1,2,6,8 elemanları 0 dan başlayarak değer alır. $soruid[0] 1 e eşit. $soruid[1] 2 ye eşit. $soruid[2] 6 ya eşit ve $soruid[3] 8 e eşit.

$cevap=$_POST['dogru'][$i]; //kullanıcının bu 4 soruya verdiği cevap şıkları da yine dizi halinde soru sırasına göre A,D,C,B gibi cevap vermiş. A 1. soruya verdiği cevap. D ikinci soruya verdiği cevap.. gibi.

$sql="select * from test where id=$soru";
$result = mysqli_query($con,$sql);

$sor=mysqli_fetch_array($result,MYSQLI_ASSOC); // veritabana o soru id sine göre bağlanıyoruz.

$dogrucevap=$sor['dogru']; // sorunun asıl doğru cevabını değişkene atıyoruz.

$tplmders=$toplamsorusayisi++;

if($cevap==$dogrucevap){ // eğer kullanıcının vermiş olduğu cevap, veritabanındaki doğru cevap şıkkına eşitse;

echo "".$sorusayi++.". soruya verdiğiniz cevap: <b>$cevap</b> , <font color='green'>doğru!</font> <br /> ";
/*".$sor['soru']."*/
$dgrs = $dgrsorusayisi++;
}else{ // eşit değilse

echo "".$sorusayi++." soruya verdiğiniz cevap: <b>$cevap</b> , <font color='red'>yanlış!</font>  <br />";
$ynsdrs = $ynssorusayisi++;
/*".$sor['soru']."*/
}
}  


/*PUAN EKLE*/
$islem=$_COOKIE["kullanici"]; 
	
	$sqlislem="select * from uyeler where uyeadi='$islem' ";
	$result2 = mysqli_query($con,$sqlislem);
	$islemsonuc = mysqli_fetch_array($result2,MYSQLI_ASSOC);
	
	$uyeno=$islemsonuc["uyeno"];
	$uyeadi=$islemsonuc["uyeadi"];

	
	$testkategoriid = $_POST['testkategori'];/*kategori id*/
	$testid = $_POST['testid']; /*test id*/
	
$kategoribul=$testkategoriid;

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

$puan = $islemsonuc[$kategoriadi];

if($dgrs >= $ynsdrs)
{

if($_POST){
echo "<center>";
echo "<font color='green'><h4>Başarıyla Testi Geçtiniz</h4></font><br>Mevcut ders puanınız: ".$puan;
echo " Eklenecek Puan: 10";
$toplampuany=$puan+10;
echo " <br>Toplam Puanı: $toplampuany <br>";
echo "<br><a href='/derszamani.php?ders=$testkategoriid' class='btn btn-primary'>Derse Devam Et</a><br>";
echo "</center>";
/*
if($puan < $puan+10)
{
	*/
$sqlpuanekle = "UPDATE uyeler SET $kategoriadi=$kategoriadi+10 WHERE uyeno='$uyeno'";
$puan_ekle = mysqli_query($con,$sqlpuanekle); 
/*
}
{
	
}*/

}else{
	echo "<center>";
echo "<br><a href='/kodjs'><button class='btn btn-primary'>Geri Dön</button></a>";
echo "</center>";
}

}
else{
	echo "<center>";
	echo "<font color='red'><h4>Başarısız</h4></font><br>";
	echo "Mevcut ders puanınız: ".$puan;
    echo "<br><br><a href='/derszamani.php?ders=$testkategoriid' class='btn btn-primary'>Testi Tekrar Yap</a>";
	echo "</center>";
}


?>


							
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