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
//Bir string değişken oluşturduk
$adim = $_GET['adim'];
switch($adim){
case "": //Atadığımız string değişkenimize hiçbir değer atanmamış ise aşağıdaki kodlamalar devreye giriyor
?>


<h4>Eklenmiş Ders Başlıkları</h4>
<table  class="table" width="800" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; color:#333; font-size:12px; font-family:Arial; margin-bottom:25px;">
  <tr>
    <td width="18" bgcolor="#F2F2F2"><b>#</b></td>
    <td width="140" bgcolor="#F2F2F2"><b>Ders Başlık</b></td>
	<td width="18" bgcolor="#F2F2F2"><b>Üst Sayfa ID</b></td>
	<td style="text-align:left;" width="183" bgcolor="#F2F2F2"><b>Url</b></td>
    <td style="text-align:center;" width="100" bgcolor="#F2F2F2"><b>İşlemler</b></td>
  </tr>
  
  
  
<?php
$sql="SELECT * FROM kategori where ustKategori=0  ORDER BY id DESC";
$kategori_cek = mysqli_query($con,$sql);
while($kategori_cek_yeni = mysqli_fetch_array($kategori_cek)){
$id = $kategori_cek_yeni["id"];
$sira++;

echo '
  <tr>
    <td style="text-align:center;">'.$sira.'</td>
    <td>'.$kategori_cek_yeni['baslik'].'</td>
	<td style="text-align:center;">'.$kategori_cek_yeni['ustKategori'].'</td>
	<td><a href="'.$kategori_cek_yeni['url'].'">'.$kategori_cek_yeni['url'].'</a></td>
    <td style="text-align:center;"><a href="sayfa.php?adim=kategorisil&id='.$id.'">Sil</a> - <a href="sayfa.php?adim=kategoriduzenle&id='.$id.'">Düzenle</a></td>
  </tr>';
}
?>
</table>


<?php
break;


case "kategorisil": //Kategori silme onayı için oluşturduğumuz string değişken değeri
$id = $_GET['id']; //Kategorinin id'sini çekiyoruz
$sql3="DELETE FROM kategori WHERE id=$id";
$kategori_sil = mysqli_query($con,$sql3); //Kategoriyi silmek için çektiğimiz kategori id'si ile kategoriyi eşleştirip sildirme işlemi yapmak için mysql kodumuz

if($kategori_sil){ //Eğer kategori başarıyla silinirse onay mesajı verdiriyoruz
	echo '<script type="text/javascript">alert("Ders başarıyla silindi!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=sayfa.php">';
}else{ //Eğer kategori silinirken bir hata oluşursa hata mesajı verdiriyoruz
	echo '<script type="text/javascript">alert("Ders silinirken bir hata oluştu!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=sayfa.php">';
}
break;

case "kategoriduzenle": //Kategori düzenlemek için oluşturduğumuz string değişken değeri
$id = $_GET['id']; //Kategori id'sini çekiyoruz
$sql4="SELECT * FROM kategori WHERE id=$id";
$kategori_cek = mysqli_query($con,$sql4); //Seçtiğimiz kategroriyi düzenleyebilmek için seçtiğimiz kategori id'si ile eşleştirip bilgileri çekiyoruz
$kategori_cek_yeni = mysqli_fetch_array($kategori_cek);

echo '
<h4>Ders Başlık Düzenleyin</h4>
<br>
<form action="sayfa.php?adim=kategoriduzenonay&id='.$id.'" method="post">
<table width="400" border="0">
  <tr>
    <td width="115">Ders Başlık <font color="#FF0000">*</font></td>
    <td width="269"><input class="form-control" name="txt_kategoriadi" type="text" value="'.$kategori_cek_yeni['baslik'].'" required/> </td>
	</tr
	<tr>
	 <td width="115">ID <font color="#FF0000">*</font></td>
	<td width="269"><input class="form-control" name="txt_kategoriust" type="text" value="'.$kategori_cek_yeni['ustKategori'].'" required/> </td>
	</tr>
	<tr>
	 <td width="115">Url <font color="#FF0000"></font></td>
	<td width="269"><input class="form-control" name="txt_kategoriurl" type="text" value="'.$kategori_cek_yeni['url'].'"/> </td>
	</tr>
   <tr>
    <td>&nbsp;</td>
    <td><input class="form-control" type="submit" value="Düzenle" /></td>
  </tr>
</table>
</form>
';
break;

case "kategoriduzenonay": //Kategori düzenlememizin onayı için oluşturduğumuz string değişken değeri
$id = $_GET['id'];
$kategori_adi = str_replace("'", "\'", $_POST['txt_kategoriadi']);
$kategori_ust = str_replace("'", "\'", $_POST['txt_kategoriust']);
$kategori_url = str_replace("'", "\'", $_POST['txt_kategoriurl']);

$sql5="UPDATE kategori SET baslik='$kategori_adi' , ustKategori='$kategori_ust' , url='$kategori_url' WHERE id='$id'";
$kategori_duzenle = mysqli_query($con,$sql5);

if($kategori_duzenle){ //Eğer düzenleme başarılı olursa onay mesajı verdiriyoruz
	echo '<script type="text/javascript">alert("Ders başarıyla düzenlendi!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=sayfa.php">';
}else{ //Düzenlenirken bir hata oluşursa hata mesajı verdiriyoruz
	echo '<script type="text/javascript">alert("Ders düzenlenirken bir hata oluştu!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=sayfa.php">';
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