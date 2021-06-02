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
<form action="testduzenle.php?adim=dersecildi" method="post">
  <div class="form-group">
   <label>Düzenlenecek Ders testini seçiniz</label>
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
case "dersecildi":

$kategoriidx = $_POST["kategoritestid"];

$derstestcekildi = mysqli_query($con,"select DISTINCT kategoritest_id from test where ketegoriid='$kategoriidx'"); 

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

echo'
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Seçiniz</th>

    </tr>
  </thead>
  <tbody>
  ';
  
  while($derstestsnc=mysqli_fetch_array($derstestcekildi)){
  echo '
    <tr>
      <th>'.$kategoriadi.' Testi '.$derstestsnc["kategoritest_id"].'</th>
	  <th><a href="testduzenle.php?adim=testduzenle&katid='.$kategoriidx.'&testid='.$derstestsnc["kategoritest_id"].'">Devam Et</a></th>

    </tr>
	';
  }
	echo'
  </tbody>
</table>
';

break;
case 'testduzenle';

$katid = $_GET["katid"];
$testid = $_GET["testid"];

$rtestduzenle = mysqli_query($con,"select * from test where ketegoriid='$katid' and kategoritest_id='$testid' "); 

echo'
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Soru</th>
      <th scope="col">Cevap A</th>
      <th scope="col">Cevap B</th>
	  <th scope="col">Cevap C</th>
	  <th scope="col">Cevap D</th>
	  <th scope="col">Doğru cevap</th>
	  <th scope="col">Düzenle</th>
    </tr>
  </thead>
  <tbody>
  ';
  while($testsnc=mysqli_fetch_array($rtestduzenle)){
  echo '
    <tr>
      <th>'.$testsnc["id"].'</th>
	   <th>'.$testsnc["soru"].'</th>
	    <th>'.$testsnc["cevap_a"].'</th>
		 <th>'.$testsnc["cevap_b"].'</th>
		  <th>'.$testsnc["cevap_c"].'</th>
		   <th>'.$testsnc["cevap_d"].'</th>
		    <th>'.$testsnc["dogru"].'</th>
			<th><a href="testduzenle.php?adim=testsecduzenle&id='.$testsnc["id"].'">Düzenle </th>
    </tr>
	';
  }
	echo'
  </tbody>
</table>
';

break;
case 'testsecduzenle';
$testidsec = $_GET["id"];
$testsecduzenle = mysqli_query($con,"select * from test where id='$testidsec'"); 
$testseccek=mysqli_fetch_array($testsecduzenle);

echo '

<form action="testduzenle.php?adim=testsecduzenlekaydet" method="post">

  <div class="form-group">
    <label>Düzenlenen Test İD:</label>
    '.$testseccek["id"].'
	
	 <div id="displayDivId" style="display: none;">
	 <input class="form-control" name="testidat" value="'.$testseccek["id"].'" type="text" required />
	 </div>
	
	<p align="right">  <a style="color:red;" href="javascript:history.back()"> 
<font color="red">GERİ DÖN</font>
</a></p>
	
  </div>

<div class="form-group">
    <center><label><h4>SORU</h4></label></center>
<textarea class="form-control" id="1" name="txt_soru" cols="30" rows="4">'.$testseccek["soru"].'</textarea>
</div>


<div class="form-group">
  <label>Cevap A</label>
 <input class="form-control" name="cevapa" value="'.$testseccek["cevap_a"].'" type="text" size="39" required />
 <label>Cevap B</label>
  <input class="form-control" name="cevapb" value="'.$testseccek["cevap_b"].'" type="text" size="39" required />
  <label>Cevap C</label>
   <input class="form-control" name="cevapc" value="'.$testseccek["cevap_c"].'" type="text" size="39" required />
   <label>Cevap D</label>
    <input class="form-control" name="cevapd" value="'.$testseccek["cevap_d"].'" type="text" size="39" required />
 </div>
 
 <div class="form-group">
   <label>Doğru Cevap</label>
    <select class="form-control" name="slct_dogrucevap" required>
	<option value="'.$testseccek["dogru"].'" selected="selected">'.$testseccek["dogru"].'</option>
	<option value="A">A</option>
	<option value="B">B</option>
	<option value="C">C</option>
	<option value="D">D</option>
    </select>
</div>

  <div class="form-group"><center>
  
  <a href="javascript:history.back()">
<input type="button" class="btn btn-danger" value="İPTAL" />
</a>

<input class="btn btn-success" type="submit" value="KAYDET" />

</center>
</div>

</form>

';



break;
case 'testsecduzenlekaydet';

$testid = str_replace("'", "\'", $_POST["testidat"]);
$sorum = str_replace("'", "\'", $_POST["txt_soru"]);
$resimm = ""; /*str_replace("'", "\'", $_POST["soru_resim"]);*/
$cevapam = str_replace("'", "\'", $_POST["cevapa"]);
$cevapbm = str_replace("'", "\'", $_POST["cevapb"]);
$cevapcm = str_replace("'", "\'", $_POST["cevapc"]);
$cevapdm = str_replace("'", "\'", $_POST["cevapd"]);
$dogrum = str_replace("'", "\'", $_POST["slct_dogrucevap"]);

$sqlu=("UPDATE test SET soru='$sorum',resim='$resimm',cevap_a='$cevapam',cevap_b='$cevapbm',cevap_c='$cevapcm',cevap_d='$cevapdm',dogru='$dogrum' where id='$testid' ");

mysqli_query($con,$sqlu);

header("Refresh:0; url=testduzenle.php?adim=testsecduzenle&id=$testid");


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