<?php
//Veritabanı bağlantı dosyamızı çekiyoruz
include("../baglanti.php");
header("Content-Type: text/html; charset= utf-8");

ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else
{
	
	header('X-XSS-Protection: 0');
?>



<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
	<!-- styles
	  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
 -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="admin.php">Proje </a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <font color="green">. .</font>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">

	                          <li><a href="logout.php">Çıkış Yap</a></li>

	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">	  	
			<?php require_once("sayfa/solmenu.php") ?>			 
		  </div>
		  
		  <div class="col-md-10">
		  	<div class="row">
		  	<div class="content-box-large">
<?php
$adim = $_GET["adim"];
switch($adim){
case "": 
?>
<form action="testekle.php?adim=kategorisecildi" method="post">
  <div class="form-group">
   <label>EKLENECEK KONU KATEGORİSİ</label>
    <select class="form-control"  id="exampleFormControlSelect1" name="kategoritestid" required>
    <?php 
	$x=0;
	$sql="SELECT * FROM kategori where ustKategori=$x";
    $kategori_cek = mysqli_query($con,$sql);
	while($kategori_cek_yeni =  mysqli_fetch_array($kategori_cek)){
		
	echo '<option value="'.$kategori_cek_yeni["id"].'">'.$kategori_cek_yeni["baslik"].'</option>';
	}
	?>
    </select>
	</div>
  <div class="form-group"><center>
<input class="btn btn-success" type="submit" value="Devam Et" /></center>
</div>
</form>
<?php
break;
case "kategorisecildi":
$kategoricekildi = $_POST["kategoritestid"];
?>
<form action="testekle.php?adim=testsonu" method="post">
  <div class="form-group">
   <label>EKLENECEK KONU TESTİ</label>
    <select class="form-control"  id="exampleFormControlSelect1" name="konutestid" required>
    <?php 
	$x=0;
	$sira=1;
	$sql="SELECT * FROM kategori where kategori='$kategoricekildi'";
    $kategori_cek = mysqli_query($con,$sql);
	
	while($kategori_cek_yeni =  mysqli_fetch_array($kategori_cek)){
		
		$testidolustur=$sira++;
	echo '<option value="'.$testidolustur.'">'.$kategori_cek_yeni["baslik"].'</option>'; /*.$kategori_cek_yeni["kategoritest_id"].*/
	}
	?>
    </select>
	</div>
	<div id="displayDivId" style="display: none;">
	  <div class="form-group">
    <select class="form-control"  id="exampleFormControlSelect1" name="katkonutestid" required>
    <?php 
   echo '<option value="'.$kategoricekildi.'"></option>';
	?>
    </select></div>
	</div>
  <div class="form-group"><center>
<input class="btn btn-success" type="submit" value="Devam Et" /></center>
</div>
</form>
<?php
break;
case "testsonu":

$kategoriidx = $_POST["katkonutestid"]; 

$testideklenecek=$_POST["konutestid"];

if($kategoriidx==1)
{
	$kategoriadi="Javascript";
}
elseif($kategoriidx==2)
{
	$kategoriadi="AngularJS";
}
elseif($kategoriidx==3)
{
	$kategoriadi="Jquery";
}
elseif($kategoriidx==4)
{
	$kategoriadi="Knockout";
}
elseif($kategoriidx==5)
{
	$kategoriadi="Backbone";
}
else
{
	$kategoriadi="!!! Sorgu Hatası";
}


echo '

<form action="testekle.php?adim=eklenmeonay" method="post">

<div class="form-group">
   <label><h4>Seçilen Konu Kategorisi: '.$kategoriadi.'</h4></label>
</div>

  <div class="form-group">
    <label>Test İD:</label>
    '.$testideklenecek.'
  </div>

<div class="form-group">
    <center><label><h4>SORU</h4></label></center>
   <textarea class="form-control" id="1" name="txt_soru" cols="30" rows="6"></textarea>
</div>


<div class="form-group">
  <label>Cevap A</label>
 <input class="form-control" name="cevapa" type="text" size="39" required />
 <label>Cevap B</label>
  <input class="form-control" name="cevapb" type="text" size="39" required />
  <label>Cevap C</label>
   <input class="form-control" name="cevapc" type="text" size="39" required />
   <label>Cevap D</label>
    <input class="form-control" name="cevapd" type="text" size="39" required />
 </div>
 
 <div class="form-group">
   <label>Doğru Cevap</label>
    <select class="form-control" name="slct_dogrucevap" required>
	<option value="A">A</option>
	<option value="B">B</option>
	<option value="C">C</option>
	<option value="D">D</option>
    </select>
</div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Soru Resmi</label>
    <input type="file" name="soru_resim" class="form-control-file" id="exampleFormControlFile1">
  </div>
  
  
  
  <div id="displayDivId" style="display: none;">
      <select name="eklenentestid" required>
   <option value="'.$testideklenecek.'"></option>
    </select>
  </div>
  
  
  
    <div id="displayDivId" style="display: none;">
      <select name="kategoritestidonay" required>
   <option value="'.$kategoriidx.'"></option>
    </select>
  </div>

  
  
  <div class="form-group"><center>
<input class="btn btn-success" type="submit" value="Kaydet" /></center>
</div>

</form>

'; 
break;
case "eklenmeonay":

$katid = str_replace("'", "\'", $_POST["kategoritestidonay"]);
$kattestid = str_replace("'", "\'", $_POST["eklenentestid"]);
$sorum = str_replace("'", "\'", $_POST["txt_soru"]);
$resimm = "aaa"; /*str_replace("'", "\'", $_POST["soru_resim"]);*/
$cevapam = str_replace("'", "\'", $_POST["cevapa"]);
$cevapbm = str_replace("'", "\'", $_POST["cevapb"]);
$cevapcm = str_replace("'", "\'", $_POST["cevapc"]);
$cevapdm = str_replace("'", "\'", $_POST["cevapd"]);
$dogrum = str_replace("'", "\'", $_POST["slct_dogrucevap"]);


$sqlf=("INSERT INTO test (ketegoriid,kategoritest_id,soru,resim,cevap_a,cevap_b,cevap_c,cevap_d,dogru) VALUES ('$katid','$kattestid','$sorum','.$resimm','$cevapam','$cevapbm','$cevapcm','$cevapdm','$dogrum')");

$testkaydet = mysqli_query($con,$sqlf);
	
	if($testkaydet){
	echo '<script type="text/javascript">alert("Test ekleme işleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=testekle.php">';
		
	}
	else{
	echo '';
	
	 echo("Error description: " . mysqli_error($con));
}
break;
}

?>

		  	</div>
		  </div>
		</div>
    </div>
    <footer>
      </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>

<?php
}
?>