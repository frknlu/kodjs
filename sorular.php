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


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center><?php 						
	$testsecildix = $_POST['testsec'];
	$testsecildiax = $_POST['testsec2'];
		
$kategoribul=$testsecildix;

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
							
echo 'Konu: '.$kategoriadi.' Test: '.$testsecildiax.''

?></center>
                        </div>
            
                        <div class="panel-body">
                          	
		<?php

	$testsecildi = $_POST['testsec'];

	$testsecildia = $_POST['testsec2'];
		
$sql="SELECT * FROM test where $testsecildi=ketegoriid and $testsecildia=kategoritest_id";
$result = mysqli_query($con,$sql);

 $sorusayi=1;

            if (mysqli_affected_rows($con)) {
            echo '<form action="cevap.php" method="post">';
			$num1=1;
               while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				   $num=$num1++;
                  echo '
<div id="testYukleme" style="border:1px dashed #ef1010; padding:8px;";>
           <img src="img/soru.png" style="margin-bottom:-5px;height:25px; width:25px; " alt="" /><span> Soru '.$sorusayi++.': '.$row["soru"].'<br><br> <small>Hash:'.$row["id"].'</small></span> 
         </div>
		 <br>
         <div id="cevap" style="border:1px dashed #167c8d; padding:8px;";>
            <input type="hidden" name="soruid[]" value="'.$row["id"].'" />
            <span><input id="dogru" box="ax['.$num.'][]" name="dogru[]" type="checkbox" value="A"/>&nbsp;A :&nbsp;'.$row["cevap_a"].'</span>
            <span><input id="dogru" box="ax['.$num.'][]" name="dogru[]" type="checkbox" value="B">&nbsp;B :&nbsp;'.$row["cevap_b"].'</span>
            <span><input id="dogru" box="ax['.$num.'][]" name="dogru[]" type="checkbox" value="C"/>&nbsp;C :&nbsp;'.$row["cevap_c"].'</span> 
            <span><input id="dogru" box="ax['.$num.'][]" name="dogru[]" type="checkbox" value="D" />&nbsp;D :&nbsp;'.$row["cevap_d"].'</span> 
         </div>
		 <br>
		 ';
             

			 }
               echo'	   
<div id="hide" style="display: none;">
<select name="testkategori">
  <option value="'.$testsecildix.'" required></option>
	</select>
	<select name="testid">
	<option value="'.$testsecildiax.'" required></option>
	</select>
</div>
			   <center><div id="Button">
                     <input class="btn btn-success" type="submit" Value="Testi Bitir" />
                  </div></center>
               </form>';
            }else {
            echo "Hata";
            }

?>
							




							
                        </div>
         
                    </div>

                </div>

            </div>
       
	   </div>
	   </div>
	   </div>
	   </div>
	   </div>
	   
</div>
	<!-- Stil Dosyaları -->
    <script src='https://kodjs.com/assets/lib/jquery/jquery.min.js'></script>
	 <script  src="/js/checkbox.js"></script>
	
	<script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="/assets/js/app.js" type="text/javascript"></script>
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
</body>
</html>