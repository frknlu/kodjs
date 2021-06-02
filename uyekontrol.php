<?php
include ("baglanti.php");
header('Content-type: text/html; charset=utf-8');


$kullanici = $con->real_escape_string($_POST['kullanici']);
$sifre = $con->real_escape_string($_POST['sifre']);
/*$kullanici=$_POST["kullanici"]; 
$sifre=$_POST["sifre"]; */
$benihatirla=$_POST["benihatirla"]; 
$msifre=md5($sifre); 

if(($kullanici=="")or($sifre=="")){ 
echo "Bos Alan Birakmayiniz"; 
exit(); 
}else{ 
$sql = "select * from uyeler where email='$kullanici' and msifre='$msifre' or uyeadi='$kullanici' and msifre='$msifre'"; 
$sor=mysqli_query($con,$sql); 
if(@mysqli_num_rows($sor)>0){ 
$kullanicidurumucek=mysqli_fetch_array($sor,MYSQLI_ASSOC); 

$durum=$kullanicidurumucek['ban'];
$kullanici=$kullanicidurumucek['uyeadi'];
if($durum=="0"){ 

if($benihatirla == '1') { 
setcookie("kullanici","$kullanici",time()+7200); 
header( "refresh:0;url=kodjs" );
}
else{
setcookie("kullanici","$kullanici",time()+60*60); 
header( "refresh:0;url=/kodjs#giris_yapildi_uye" );
}

}else{ 
echo "
<html><head>

<script language='JavaScript'>
<!--
var left='[';
var right=']';
var msg=' BANNED - www.kodjs.com ';
var speed=200;
 
function scroll_title() {
        document.title=left+msg+right;
        msg=msg.substring(1,msg.length)+msg.charAt(0);
        setTimeout('scroll_title()',speed);
}
scroll_title();
 
// End -->
</script>

</head>
<body bgcolor='#464646'>
<center style='margin-top:100px'>
<img src='img/banned.png' height='120px'>
    <br>
    <font color='white' size='21'>Siteye Girişiniz Yasaklanmıştır </font><font color='red' size='30'><b>!</b></font>
<center>
</center></center></body></html>
"; 

exit(); 
} 

}else{ 

echo "<script type='text/javascript'>  
alert('Kullanici Adi Yada Sifre Hatali Girdiginiz Sifre : $sifre'); 
</script>"
        . header("refresh:0;url=home");
    
exit(); 
} 

} 

?>