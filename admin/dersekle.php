<?php
//Veritabanı bağlantı dosyamızı çekiyoruz
include("../baglanti.php");
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
	
	  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

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

<h3>Yeni Ders Ekle</h3>
<br>
<form action="dersekle.php?adim=dersonay" method="post">
<div class="row">
 <div class="col-lg-3">
  <div class="form-group">
   <label>Ders Kategori</label>
    <select class="form-control" name="slct_ustkategorisec" required>
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
</div>
<div class="col-lg-3"> 	  
<div class="form-group">
    <label>Konu Menü Başlık</label>
 <input class="form-control" name="txt_kategoribasligi" type="text" size="39" required />
  </div>
  </div>
    <div class="col-lg-2">
<div class="form-group">
    <label>Ders Baraj Puanı</label>
	<input class="form-control" name="txt_barajpuan" type="text" size="39" required/>
</div>
</div>


    <?php
   $sql="SELECT * FROM kategori ORDER BY id DESC LIMIT 1";
    $idcek = mysqli_query($con,$sql);
	while($idcek_cek_yeni =  mysqli_fetch_array($idcek)){
	$idyeni=$idcek_cek_yeni['id']+1;
	$urladresi="makaleoku.php?id=$idyeni";
	}
  ?>

 <div class="col-lg-3">  
    <div class="form-group">
    <label>Link adresi:</label>
    <a href="../<?php echo "$urladresi"; ?>"><?php echo "$urladresi"; ?></a>
  </div>
  </div>

  </div>
  <div class="row">
    <div class="col-lg-4"> 
<div class="form-group">
    <label>Ders İçerik Başlık</label>
   <input class="form-control" name="txt_makalebasligi" type="text" size="39" required/>
  </div>
  </div>
 </div>
  <div class="form-group">
    <label>Ders İçeriği</label>
   <textarea class="form-control" id="1" name="txt_makaleicerigi" rows="14"></textarea>
</div>

  
  <div id="displayDivId" style="display: none;">
      <select name="slct_link" required>
   <option value="<?php echo $urladresi?>"></option>
    </select>
  </div>
  <div class="form-group"><center>
<input class="btn btn-success" type="submit" value="Kaydet" /></center>
</div>
</form>
<?php
break;
case "dersonay": 
$kategori_basligi = str_replace("'", "\'", $_POST["txt_kategoribasligi"]); /* + */
$kategori_ustsec = $_POST["slct_ustkategorisec"];
$url_adresi = $_POST["slct_link"];
$makale_basligi    = str_replace("'", "\'", $_POST["txt_makalebasligi"]);
$makale_icerigi   = str_replace("'", "\'", $_POST["txt_makaleicerigi"]);
$tarih = date("d.m.Y");
$makale_kategorisi = $_POST["slct_ustkategorisec"];
$gpuan = $_POST["txt_barajpuan"];

if(($makale_basligi == "") or ($makale_icerigi == "")){ 
	echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=dersekle.php">';
}else{ 
$sql2="INSERT INTO kategori (baslik,ustKategori,url,mbaslik,icerik,tarih,kategori,gpuan) VALUES ('$kategori_basligi','$kategori_ustsec','$url_adresi','$makale_basligi','$makale_icerigi','$tarih','$makale_kategorisi','$gpuan')";
	$makale_kaydet = mysqli_query($con,$sql2);
	echo '<script type="text/javascript">alert("Ders ekleme işleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=dersekle.php">';
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