<?php 

include("../baglanti.php");
ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
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
//Bir string değişken oluşturduk
$adim = $_GET['adim'];
switch($adim){
case "": //Atadığımız string değişkenimize hiçbir değer atanmamış ise aşağıdaki kodlamalar devreye giriyor
?>
<table class="table" width="800" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; color:#333; font-size:12px; font-family:Arial; margin-bottom:25px;">
  <tr>
<td width="18" bgcolor="#F2F2F2"><b>#</b></td>
<td width="18" bgcolor="#F2F2F2"><b>ID</b></td>
<td width="100" bgcolor="#F2F2F2"><b>nickname</b></td>
<td width="100" bgcolor="#F2F2F2"><b>ad</b></td>
<td width="100" bgcolor="#F2F2F2"><b>soyad</b></td>
<td width="70" bgcolor="#F2F2F2"><b>Doğum Tarihi</b></td>
<td width="100" bgcolor="#F2F2F2"><b>email</b></td>
<td width="60" bgcolor="#F2F2F2"><b>tarih</b></td>
<td width="10" bgcolor="#F2F2F2"><b>puan</b></td>
<td style="text-align:center;" width="80" bgcolor="#F2F2F2"><b>Üye Durumu</b></td>
<td style="text-align:center;" width="150" bgcolor="#F2F2F2"><b>İşlemler</b></td>
  </tr>

<?php
$sql="SELECT * FROM uyeler";
$result = mysqli_query($con,$sql);
while($kategori_cek_yeni = mysqli_fetch_array($result)){
$id = $kategori_cek_yeni["uyeno"];
$sira++;

$bandurum=$kategori_cek_yeni["ban"];

$bir=1;
$sifir=0;

if($bandurum==0)
{
	$bandurum2="Üye Aktif";
	$banduruml='<a style="color:red;" href="uye.php?adim=banla&id='.$id.'&ban='.$bir.'">Banla</a>';
}
else {
	$bandurum2="Üye Yasakli";
	$banduruml='<a style="color:green;" href="uye.php?adim=banla&id='.$id.'&ban='.$sifir.'">Ban Kaldır</a>';
}

echo '
  <tr>
    <td style="text-align:center;">'.$sira.'</td>
    <td>'.$kategori_cek_yeni['uyeno'].'</td>
	<td>'.$kategori_cek_yeni['uyeadi'].'</td>
	<td>'.$kategori_cek_yeni['UyeAd'].'</td>
	<td>'.$kategori_cek_yeni['UyeSoyad'].'</td>
	<td>'.$kategori_cek_yeni['DogumTarihi'].'</td>
	<td>'.$kategori_cek_yeni['email'].'</td>
	<td>'.$kategori_cek_yeni['tarih'].'</td>
	<td>'.$kategori_cek_yeni['puan'].'</td>	
	
	<td>'.$bandurum2.'</td>	
	
    <td style="text-align:center;"><a href="uye.php?adim=uyesil&id='.$id.'">Sil</a> - <a href="uye.php?adim=uyeduzenle&id='.$id.'">Düzenle</a> - '.$banduruml.'</td>
   </tr>';
}
?>
</table>


<?php
break;

case "banla": 
$id = $_GET["id"];
$yasak = $_GET["ban"];

$uyeban = mysqli_query($con,"UPDATE uyeler SET ban='$yasak' WHERE uyeno='$id'");

if($uyeban)
{
	echo '<script type="text/javascript">alert("Üye işleminiz başarıyla gerçekleşti!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
}
else {
    echo '<script type="text/javascript">alert("Üye düzenlenirken bir hata oluştu!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
}
break;

case "uyesil": 
$id = $_GET['id']; 
$sql3="DELETE FROM uyeler WHERE uyeno='$id'";
$uyesil = mysqli_query($con,$sql3);

if($uyesil){
	echo '<script type="text/javascript">alert("Üye başarıyla silindi!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
}else{ 
	echo '<script type="text/javascript">alert("Üye silinirken bir hata oluştu!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
}
break;

case "uyeduzenle":
$id = $_GET['id'];
$sql4="SELECT * FROM uyeler WHERE uyeno='$id'";
$kategori_cek = mysqli_query($con,$sql4);
$kategori_cek_yeni = mysqli_fetch_array($kategori_cek);

echo '
<h4>Kategoriyi Düzenleyin</h4>
<form action="uye.php?adim=uyeduzenonay&id='.$id.'" method="post">
<table width="400" border="0">

	<tr>
	 <td width="115">Nickname</td>
	<td width="269"><input class="form-control" name="txt_nickname" type="text" value="'.$kategori_cek_yeni['uyeadi'].'" required/> <font color="#FF0000"></font></td>
	</tr>
	
	<tr>
	 <td width="115">Üye Adı</td>
	<td width="269"><input class="form-control" name="txt_adi" type="text" value="'.$kategori_cek_yeni['UyeAd'].'"/> <font color="#FF0000"></font></td>
	</tr>
	
		<tr>
	 <td width="115">Üye Soyadi</td>
	<td width="269"><input class="form-control" name="txt_soyadi" type="text" value="'.$kategori_cek_yeni['UyeSoyad'].'"/> <font color="#FF0000"></font></td>
	</tr>
	
		<tr>
	 <td width="115">Email</td>
	<td width="269"><input class="form-control" name="txt_email" type="text" value="'.$kategori_cek_yeni['email'].'" required/> <font color="#FF0000"></font></td>
	</tr>
	
		<tr>
	 <td width="115">Kayıt Tarih</td>
	<td width="269"><input class="form-control" name="txt_tarih" type="text" value="'.$kategori_cek_yeni['tarih'].'"/> <font color="#FF0000"></font></td>
	</tr>
	
		<tr>
	 <td width="115">Puan</td>
	<td width="269"><input class="form-control" name="txt_puan" type="text" value="'.$kategori_cek_yeni['puan'].'"/> <font color="#FF0000"></font></td>
	</tr>
<br>
   <tr>
    <td>&nbsp;</td>
    <td><input class="form-control" type="submit" value="Düzenle" /></td>
  </tr>
</table>
</form>
';
break;

case "uyeduzenonay": 
$id = $_GET['id'];
$uye_nickname = str_replace("'", "\'", $_POST['txt_nickname']);
$uye_adi = str_replace("'", "\'", $_POST['txt_adi']);
$uye_soyadi = str_replace("'", "\'", $_POST['txt_soyadi']);
$uye_email = str_replace("'", "\'", $_POST['txt_email']);
$uye_tarih = str_replace("'", "\'", $_POST['txt_tarih']);
$uye_puan = str_replace("'", "\'", $_POST['txt_puan']);

$sql5="UPDATE uyeler SET uyeadi='$uye_nickname',UyeAd='$uye_adi',UyeSoyad='$uye_soyadi',email='$uye_email',tarih='$uye_tarih',puan='$uye_puan' WHERE uyeno='$id' ";
$kategori_duzenle = mysqli_query($con,$sql5);

if($kategori_duzenle){ 
	echo '<script type="text/javascript">alert("Üye başarıyla düzenlendi!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
}else{ 
	echo '<script type="text/javascript">alert("Üye düzenlenirken bir hata oluştu!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
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