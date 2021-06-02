<meta charset="utf-8"/>
<?php 
include("baglanti.php"); 
$kullaniciadi=$_COOKIE["kullanici"]; 
$sifre1=$_POST["sifre"]; 
$sifre2=$_POST["sifretekrari"]; 
$msifre=md5($sifre1); 
if(($sifre1=="")or($sifre2=="")) 
{ 
echo "Bos Alan Birakmyin"; 
exit(); 
}else{ 
if($sifre1=="$sifre2"){
$sql = "update uyeler set uyesifre='$sifre1',msifre='$msifre' where uyeadi='$kullaniciadi'";
$guncelle=mysqli_query($con,$sql);
if($guncelle){ 
echo "<script type='text/javascript'>alert('Şifreniz Basari ile Güncellendi... Yeni Sifreniz: $sifre1');</script>"; 
echo '<meta http-equiv="refresh" content="0;URL=sifredegis.php">';
}else{ 
echo "<script type='text/javascript'>alert('Hata Sifre değiştirme işlemi yapılamadı !');</script>"; 
echo '<meta http-equiv="refresh" content="0;URL=sifredegis.php">';
exit(); 
} 

} 

} 
?>