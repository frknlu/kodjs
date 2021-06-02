<?php
//Veritabanı bağlantı dosyamızı çekiyoruz
require_once("../baglanti.php");

ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else
	
header('X-XSS-Protection: 0');
{
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

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

    <?php

   $sql="SELECT * FROM kategori ORDER BY id DESC LIMIT 1";
    $idcek = mysqli_query($con,$sql);
	while($idcek_cek_yeni =  mysqli_fetch_array($idcek)){
	$idyeni=$idcek_cek_yeni['id']+1;
	$urladresi="makaleoku.php?id=$idyeni";
	}
  ?>

<h4>Kategori Konu Başlık</h4>
<form action="sayfaekle.php?adim=kategorionay" method="post">
<table width="400" border="0">
  <tr>

	<div class="form-group">
    <td><label><font color="#FF0000">*</font> Konu Adı</label></td>
    <td><input name="txt_kategoriadi" type="text" class="form-control" required/></td>
   </div>
	
	
	<br>

	 <tr>
    <td><label>Link Adresi Olsunmu</label></td>
    <td>
	<div class="form-group">
    <select class="form-control" name="slct_link2" required>
    <option value="0">Link Verme</option>
	<option value="1"><?php echo "$urladresi"; ?></option>   
    </select>
	</div>
    </td>
  </tr>
  
  
  
   <div id="displayDivId" style="display: none;">
      <select name="slct_link" required>
   <option value="<?php echo $urladresi?>"></option>
    </select>
  </div>
  
  </tr>
  
   <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="btn btn-primary" value="Ekle" /></td>
  </tr>
</table>
</form>

<?php
break;

case "kategorionay": 
$ust = 0;
$kategori_adi = str_replace("'", "\'", $_POST['txt_kategoriadi']);
$kategori_ust = $ust;
$sifir = $_POST["slct_link2"];

if($sifir=$ust)
{
	
	$sql2="INSERT INTO kategori (baslik,ustKategori,url) VALUES ('$kategori_adi','$kategori_ust','$url_adresi')";
	$kategori_kaydet = mysqli_query($con,$sql2);
	echo '<script type="text/javascript">alert("Kategori ekleme işleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=sayfaekle.php">';
	
	
}
else {
	$url_adresi = $_POST["slct_link"];

	$sql2="INSERT INTO kategori (baslik,ustKategori,url) VALUES ('$kategori_adi','$kategori_ust','$url_adresi')";
	$kategori_kaydet = mysqli_query($con,$sql2);
	echo '<script type="text/javascript">alert("Kategori ekleme işleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=sayfaekle.php">';
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