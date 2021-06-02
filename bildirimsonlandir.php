<?php
include("baglanti.php");
$uyeidcek=$_COOKIE["kullanici"];

$sql = "DELETE from bildirim where uyeadi='$uyeidcek'";

mysqli_query($con,$sql);

$url = htmlspecialchars($_SERVER['HTTP_REFERER']);  // hangi sayfadan gelindigi degerini verir.
header("Refresh:0; url=$url");

?>