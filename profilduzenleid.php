<?php
require_once("baglanti.php"); 
$kullanici = $_COOKIE['kullanici'];	
$sql = "select * from uyeler where uyeadi='$kullanici'"; 
$sor=mysqli_query($con,$sql);
$yaz = mysqli_fetch_array($sor,MYSQLI_ASSOC);
// id aldýk tamamdýr
$idp = $yaz['uyeno']; 
// id ye göre profil sayasýna gönderdik
echo "<meta http-equiv='refresh' content='0;url=profilduzenle.php?idp=$idp'/>"
?>