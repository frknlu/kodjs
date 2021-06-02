<?php
require_once("baglanti.php");
$bilgiler=$_COOKIE["kullanici"]; 
if($bilgiler==""){ 
	header("Refresh:0; url=/home");
}
else
{
$msj=$_GET["msjid"];
$msjalanidcek=$_GET["msjalanid"];
	mysqli_query($con,"UPDATE mesajlar SET msj_bild='0' where msj_alan_id='$msjalanidcek' and msj_id='$msj'"); 
	header("Refresh:0; url=/mesajoku.php?id=$msj");
	}
?>