<?php 
require_once("baglanti.php"); 
$sql = "SELECT * FROM ayarlar";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($row["site_durum"] == 2){
header("Refresh:0; url=/home"); /*home*/
}else {
header("Refresh:0; url=/bak%C4%B1m");  
}
?>