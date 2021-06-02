<?php 

include("../baglanti.php");
ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
	
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

$adim = $_GET['adim'];
switch($adim){
case "":
?>

<form action="dersduzenle.php?adim=dersecildi" method="post">
  <div class="form-group">
   <label>Düzenlenecek Dersi seçiniz</label>
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

$deg=0;
$sql2="SELECT * FROM kategori where ustKategori='$kategoriidx' ORDER BY id DESC";
$makale_cek = mysqli_query($con,$sql2);
while($makale_cek_yeni = mysqli_fetch_array($makale_cek)){
$id = $makale_cek_yeni['id'];
echo '
<div style="width:500px; height:auto; color:#333; font-size:13px; font-family:Arial;">
<a href="makaleoku.php?id='.$id.'"><font size="4">'.$makale_cek_yeni['baslik'].' || <b>'.$makale_cek_yeni['mbaslik'].'</b></font></a><br />
<b>ID:</b> '.$makale_cek_yeni['id'].'<b> Tarih:</b> '.$makale_cek_yeni['tarih'].' - <b>Okunma:</b> '.$makale_cek_yeni['hit'].' - <b>Kategori:</b> '.$makale_cek_yeni['kategori'].'
<a href="dersduzenle.php?adim=makalesil&id='.$id.'">Sil</a> - <a href="dersduzenle.php?adim=makaleduzenle&id='.$id.'">Düzenle</a><hr color="#CCC" size="1" style="margin-top:30px;" />
</div>';
}


break;
case "makalesil":
$id = $_GET['id'];
$sql1="DELETE FROM kategori WHERE id=$id";
$makale_sil = mysqli_query($con,$sql1);

if($makale_sil){
	echo '<script type="text/javascript">alert("Ders başarıyla silindi!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=dersduzenle.php">';
}else{
	echo '<script type="text/javascript">alert("Ders silinirken bir hata oluştu!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=dersduzenle.php">';
}
break;

case "makaleduzenle": 
$id = $_GET['id']; 
$sql4="SELECT * FROM kategori WHERE id='$id'";
$makale_cek = mysqli_query($con,$sql4);
$makale_cek_yeni = mysqli_fetch_array($makale_cek);

$kategoribul=$makale_cek_yeni['kategori'];

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



echo '

<h3>Ders Düzenleme</h3>
<form method="post" action="dersduzenle.php?adim=makaleduzenonay&id='.$id.'">

<div class="row">
  <div class="col-lg-3">
  <div class="form-group">
  <label>Ders Kategori</label>
  
    <select class="form-control" name="dzn_kategori" required>
 <option value="1" selected>Javascript</option>
			<option value="2" selected>AngularJS</option>
			<option value="3" selected>Jquery</option>
			<option value="4" selected>Knockout</option>
			<option value="5" selected>Backbone</option>
			<option selected value="'.$makale_cek_yeni['kategori'].'">'.$kategoriadi.'</option>
		</select>	
</div>
  </div>
  
  <div class="col-lg-3">
  <div class="form-group">
    <label>Konu Menü Başlık</label>
    <input class="form-control" name="dzn_makalemenubasligi" type="text" size="39" value="'.$makale_cek_yeni['baslik'].'" required />
</div>
</div>


 
  <div class="col-lg-3">
 <div class="form-group">
  <label>Ders İçerik Başlığı</label>
   <input class="form-control" name="dzn_makalebasligi" type="text" size="39" value="'.$makale_cek_yeni['mbaslik'].'" required />
  </div>
</div>


</div>


<div class="row">

 <div class="col-lg-3">
<div class="form-group">
    <label>Ders Baraj Puanı</label>
    <input class="form-control" name="dzn_barajpuan" type="text" size="39" value="'.$makale_cek_yeni['gpuan'].'" required />
</div>
 </div>


  <div class="col-lg-3">
<div class="form-group">
    <label>Mevcut Konu Testi</label>
	<select class="form-control" name="dzn_kategoritestsec" required>
	<option selected value="">'.$kategoriadi.' Test '.$makale_cek_yeni['kategoritest_id'].'</option>
 ';

$ktk = mysqli_query($con,"SELECT DISTINCT kategoritest_id FROM test WHERE ketegoriid='$kategoribul'");
while ( $ktksnc = mysqli_fetch_array($ktk) ){
	echo '
	<option value="">'.$kategoriadi.' Test '.$ktksnc['kategoritest_id'].'</option>
		';
}		


	echo '
</select>	
</div>
 </div>

 
 <div class="col-lg-3">
  <div class="form-group">
  <label>Tarih</label>
    <input class="form-control" name="dzn_makaletarihi" type="text" size="10" value="'.$makale_cek_yeni['tarih'].'" />
  </div>
   </div>
  
  
   <div class="col-lg-3">
<div class="form-group">
  <label>Okunma</label>
    <input class="form-control" name="dzn_makaleokunma" type="text" size="10" value="'.$makale_cek_yeni['hit'].'" />
  </div>
   </div>
  
  </div>





  
<div class="form-group">
 <label>Ders İçerik</label>
    <textarea name="dzn_makaleicerigi" rows="16">'.$makale_cek_yeni['icerik'].'</textarea>
	</div>
	
  

  
  <div class="form-group">
	<label>Url Adresi</label>
   <input class="form-control" name="dzn_makaleurl" type="text" size="10" value="'.$makale_cek_yeni['url'].'" />
   </div>
   

   <div class="form-group">
    <center><input class="btn btn-success" type="submit" value="Kaydet" /></center>
</div>

</form>


';



break;

case "makaleduzenonay": 
$id = $_GET['id']; 

$menubasligi = str_replace("'", "\'", $_POST['dzn_makalemenubasligi']);
$duzen_makalebasligi 	= str_replace("'", "\'", $_POST['dzn_makalebasligi']);
$duzen_makaleicerigi 	= str_replace("'", "\'", $_POST['dzn_makaleicerigi']);
$duzen_makalekategorisi = $_POST['dzn_kategori'];
$duzen_makaletarihi     = str_replace("'", "\'",  $_POST['dzn_makaletarihi']);
$duzen_makaleokunma     = str_replace("'", "\'", $_POST['dzn_makaleokunma']);
$eurl = str_replace("'", "\'", $_POST['dzn_makaleurl']);
$duzen_baraj = str_replace("'", "\'", $_POST['dzn_barajpuan']);


	if(($duzen_makalebasligi == "") or ($duzen_makaleicerigi == "") or ($duzen_makaletarihi == "") or ($duzen_makaleokunma == "")){
		echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=dersduzenle.php?adim=makaleduzenle&id='.$id.'">';
	}else{ 
	$sql6="UPDATE kategori SET baslik='$menubasligi', mbaslik='$duzen_makalebasligi',icerik='$duzen_makaleicerigi',tarih='$duzen_makaletarihi',hit='$duzen_makaleokunma',kategori='$duzen_makalekategorisi', url='$eurl', gpuan='$duzen_baraj' WHERE id=$id";
		$makale_duzenle = mysqli_query($con,$sql6);
		if($makale_duzenle){
			echo '<script type="text/javascript">alert("Ders başarıyla düzenlendi!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=dersduzenle.php">';
		}else{ 
			echo '<script type="text/javascript">alert("Ders düzenlenirken bir hata oluştu!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=dersduzenle.php?adim=makaleduzenle&id='.$id.'">';
		}
	}
break;


}
?>
				
		  	</div>
		  </div>
		</div>
    </div>
    <footer>
         <div class="container">
            <div class="copy text-center">
            </div>
         </div>
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