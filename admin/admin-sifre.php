<?php 
include("../baglanti.php"); 

$sifre1=$_POST["sifre"]; 
$sifre2=$_POST["sifretekrari"]; 
$msifre=md5($sifre1); 
$a = 1;

if(($sifre1=="")or($sifre2=="")) 
{ 
echo "Bos Alan Birakmyin"; 
exit(); 
}else{ 
if($sifre1=="$sifre2"){
$sql = "update admin set password='$sifre1' where id='$a'";
$guncelle=mysqli_query($con,$sql);
if($guncelle){ 
echo "Sifreniz Basari ile Güncellendi...  Yeni Sifreniz $sifre1"; 
echo "<br><a href=index.php>Giriş Yapınız</a>"; 
}else{ 
echo "Sifre Güncelleme islemi Yapilamadi"; 
exit(); 
} 

} 

} 
?>