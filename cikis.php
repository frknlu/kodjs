<?php 
include("baglanti.php");	
$kullaniciadi=$_COOKIE["kullanici"]; 
if($kullaniciadi==""){ 
header("Refresh: 0; url=index.php");
exit(); 
}else{ 
setcookie("kullanici"); 
header("Refresh: 0; url=index.php");
} 
?>