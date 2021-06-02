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
<form action="bakimmodu.php?adim=onay" method="post">
<table>
<?php 
$sql ="SELECT * FROM ayarlar";
$bilgi = mysqli_query($con,$sql);
$row = mysqli_fetch_array($bilgi,MYSQLI_ASSOC);

$ov=$row["site_durum"];

$a = 1;
$b = 2;
if($ov==$b)
{
	echo '<font color="green"><h3><center><b>SİTE AÇIK</b></center></h3></font>';
}
else if($ov==$a)
{
echo "<h3><center><b>SİTE KAPALI</b></center></h3>";
}
else{
	echo "bir problem var sql bağlanılmıyor.";
}






?>
  <tr>
    <td width="100">Site Durumu Seç</td>
    <td width="258">
    <select class="form-control" name="slct_bakim">
	    <option value="2">Açık</option>
    <option value="1">Kapalı</option>
    </select>
    </td>
  </tr>


  <tr>
    <td width="82">&nbsp;</td>
    <td width="258"><input class="form-control" type="submit" value="Kaydet" /></td>
  </tr>
</table>
</form>

<?php
break;
case "onay": 

$bakim = $_POST["slct_bakim"];

$sql2 = "UPDATE ayarlar SET site_durum='$bakim'";

if (mysqli_query($con, $sql2)) {
   echo '<script type="text/javascript">alert("İşleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=bakimmodu.php">';
} else {
    echo "Error updating record: " . mysqli_error($conn);
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