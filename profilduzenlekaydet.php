<?php
include("baglanti.php");
require_once ("class.upload.php");

$bilgiler=$_COOKIE["kullanici"]; 

$sql2 = "select * from uyeler where uyeadi='$bilgiler' ";
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);

 $uyeid=$row2["uyeno"];

 
 $uyeadx = $_POST["uyeadiekle"];
 $uyesoyadi = $_POST["uyesoyad"];
 $email = $_POST["email"];
 $dogumtarihi = $_POST["dogumtarihi"];
 $hakkimda = $_POST["hakkimda"];
 $facebook = $_POST["facebook"];
 $resim = $_FILES["resim"];

  $resimisim = $_POST["resimisim"];
  

$imageresim = $uyeid."-avatar";

$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
$klasor = './resim'; //Resmin Yükleneceği Klasör
	if ($yukle->uploaded) {  // Upload İşlemi Başarılı olursa aşağıdaki işlemleri yapacak
		$yukle->image_reflection_height = '50%';
		$yukle->file_new_name_body = $imageresim;

		$yukle->process($klasor);
			if ($yukle->processed) { // İşlemler Başarılı olursa

            unlink ("$resimisim"); /*eski resimi sil*/
			
				 echo $yukle->file_dst_name;
				 $rs2 = "resim/".$yukle->file_dst_name;
				
				$sqlres = "UPDATE uyeler SET uyeresim='$rs2'  WHERE uyeno='$uyeid'";
                mysqli_query($con,$sqlres);	
				header("Refresh:0; url=uyeprofil.php");
				$yukle->clean();
			} else { // Başarılı olmadığı durumda 
				echo 'Hata resim yüklenemedi. : ' . $yukle->error;
			}
	}
 

$sql = "UPDATE uyeler SET UyeAd='$uyeadx', UyeSoyad='$uyesoyadi', email='$email', DogumTarihi='$dogumtarihi', uyehakkinda='$hakkimda' , uyefacebook='$facebook' WHERE uyeno='$uyeid'";

$sonuc= mysqli_query($con,$sql);
if($sonuc>0) 
{ 
/*
header("Refresh:0; url=profil.php");
*/

$sql23 = "select * from uyeler where uyeadi='$bilgiler'"; 
$sor23=mysqli_query($con,$sql23);
$yaz = mysqli_fetch_array($sor23,MYSQLI_ASSOC);
// id aldık tamamdır
$idp = $yaz['uyeno']; 
/*
echo "<meta http-equiv='refresh' content='0;url=profil.php?idp=$idp'/>";
*/
}
else{
	/*header("Refresh:3; url=profilduzenle.php");*/
echo "<center>Bir problem oluştu, verileri kontrol ediniz</center>";
}

 
?>