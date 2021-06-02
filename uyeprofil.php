<?php
require_once("baglanti.php"); 
$kullanici = $_COOKIE['kullanici'];	
$sql = "select * from uyeler where uyeadi='$kullanici'"; 
$sor=mysqli_query($con,$sql);
$yaz = mysqli_fetch_array($sor,MYSQLI_ASSOC);
$uyenick =$yaz['uyeadi'];
// id ye göre profil sayasýna gönderdik
/*kontrol etmeden göndermekte baþka sorunlar doðabilir.
*/
echo "<meta http-equiv='refresh' content='0;url=@$uyenick'/>"
?>