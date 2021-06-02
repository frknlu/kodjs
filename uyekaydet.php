<?php 
include ("baglanti.php"); 

header('Content-Type: text/html; charset=utf-8');

$kullanici=$_POST["kullaniciadi"]; 
$sifre=$_POST["kullanicisifre"]; 
$email=$_POST["kullaniciemail"]; 
$uyead=$_POST["uyeadi"]; 
$uyesoyad=$_POST["uyesoyadi"]; 
$dogumtarih=$_POST["dogumtarihi"];
$grupidif=$_POST["grupidata"];
$rutbe=$_POST["uyerutbe"];

if($rutbe=="ogretmen"){
	$rutbep="2";
	$grupid=$_POST["grupidata"];
}
else if($rutbe=="ogrenci"){
	$rutbep="1";
	$grupid='0';
}
else{
	$rutbep="0";
	$grupid='0';
}
  
$tarih=date("d/m/y");
$msifre=md5($sifre);

$sql11="SELECT * from uyeler where email='".$_POST['kullaniciemail']."' or uyeadi='".$_POST['kullaniciadi']."'";
$sorgu=mysqli_query($con,$sql11);
if (mysqli_num_rows($sorgu)>0) {
echo "<script language='javascript'>
alert('! Email veya kullanıcı adı kayıtlı.'+ window.location.assign('uyeol.php'))
</script> ";
} 
else {
$sql = "insert into uyeler(uyeadi,uyesifre,email,UyeAd,UyeSoyad,DogumTarihi,tarih,msifre,rutbeid,grupid)value('$kullanici','$sifre','$email','$uyead','$uyesoyad','$dogumtarih','$tarih','$msifre','$rutbep','$grupid')"; 
$ekle=mysqli_query($con,$sql);
if($ekle){ 
echo "<script language='javascript'>alert('Hosgeldiniz $kullanici Başarıyla Kayıt Oldunuz! Giriş Yaparak Devam Edin ' + window.location.assign('/index.php'))</script> "
;
}else{ 
echo "<script language='javascript'>
alert('Hata! Kayıt Olamadınız Tekrar Deneyin'+ window.location.assign('uyeol.php'))
</script> 
";
exit(); 
} 

}
?>