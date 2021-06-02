<?php
require_once("../baglanti.php");

$bkm = "SELECT * FROM ayarlar";
$bakim=mysqli_query($con,$bkm);
$bakims=mysqli_fetch_array($bakim,MYSQLI_ASSOC);

if($bakims["site_durum"] == 2){
header("Refresh:0; url=/index.php");	   
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo 'BAKIM - '.$bakims['title'].'' ;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style type="text/css">
.header,.outer{position:fixed;top:0;right:0;left:0}body{width:100%;height:100%;margin:0;padding:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif}.header a{color:#fff;border:1px solid rgba(255,255,255,.7);padding:8px 12px;font-weight:300;font-size:12px;text-decoration:none;border-radius:5px}a {color:#fff}a:hover{border-color:#fff}.wrap{display:table;margin:0 auto;height:95%}.header{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-pack:justify;justify-content:space-between;padding:2vw}.logo svg{height:25px;}.logo svg g,.logo svg path {fill:#fff}.content{padding:0 30px;display:table-cell;vertical-align:middle;text-align:center}h1,h2{padding:0;color:#fff}h1{margin:0 0 10px;font-weight:100;font-size:70px;line-height:1.1em;letter-spacing:3px}h2{margin:0;font-weight:200;font-size:23px;line-height:1.3em;letter-spacing:1px}@media screen and (max-width:800px){h1{font-size:6.5vw;letter-spacing:2px}h2{font-size:16px}}.outer{bottom:0;background:#3eb0ef}
</style>
</head>
<body>
<div class="outer">
    <header class="header">
        <div class="logo">
          <img src="../img/logo.png"/>
        </div>
    </header>
    <div class="wrap">
        <div class="content">
            <h1>BAKIM MODU</h1>
            <h2>Kısa Sürede Açılacak...</h2>
        </div>
    </div>
</div>
</body>
</html>