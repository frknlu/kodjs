<?php 
include("baglanti.php");
ob_start();
session_start();

$bkm = "SELECT * FROM ayarlar";
$bakim=mysqli_query($con,$bkm);
$bakims=mysqli_fetch_array($bakim,MYSQLI_ASSOC);

if($bakims["site_durum"] == 1){
header("Refresh:0; url=sayfa/bakim.php");	   
}

$login=$_COOKIE["kullanici"]; 
$id = $_GET["ders"];

if($login==""){ 	
header("Refresh: 0; url=index.php");
}
?> 
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
$sql = "SELECT * FROM ayarlar";
$result=mysqli_query($con,$sql);
$title=mysqli_fetch_array($result,MYSQLI_ASSOC);
echo '<title>'.$title['title'].'</title>' ;
    ?>
    <meta name="description" content="">
    <meta name="author" content="">
	
	
	    <link rel="shortcut icon" href="assets/img/favicon.png">
	
	<link type="text/css" href="assets/css/app.css" rel="stylesheet"> 
	
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css">
	
    <link type="text/css" href="assets/css/derszamani.css" rel="stylesheet"> 
	
	    <style type="text/css">

.orange-circle-button {
	box-shadow: 2px 4px 0 2px rgba(0,0,0,0.1);
    border: .4em solid #29baff;
    font-size: 1em;
    line-height: 1.1em;
    color: #000000;
    background-color: #ffffff; 
    margin: auto;
    border-radius: 50%;
    height: 6em;
    width: 6em;
    position: relative;
	margin-left: 15px;
}
.orange-circle-button:hover {
    color: #000000;
    background-color: #ffffff;
    text-decoration: none;
    border-color: #ff7536;
	
}
.orange-circle-button:visited {
	color:#ffffff;
    background-color: #e84d0e;
	text-decoration: none;
	
}
.orange-circle-link-greater-than {
    font-size: 1em;
}

.mai-sub-header {

    background-color: #323232;
padding: 0 0 0px;
}



.mai-sub-header>.container {
    padding: 0px 0 0;
}

.mai-sub-header:before {
    position: absolute;
    content: '';
    display: block;
    background-color: #fff;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 0px;
    z-index: 1;
}
    </style>

	</head>
 <body>

	<!-- Üst Menü -->
    <nav class="navbar navbar-expand navbar-dark mai-top-header">
      <?php require('sayfa/ustmenu.php') ?>
    </nav>
	<!-- Üst Menü Son -->
	

    <div class="mai-wrapper">
      <nav class="navbar navbar-expand-lg mai-sub-header">
        <div class="container">
<nav class="navbar navbar-expand-md">
                      <button type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="#mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler hidden-md-up collapsed">
                        <div class="icon-bar"><span></span><span></span><span></span></div>
                      </button>
                      <div id="mai-navbar-collapse" class="navbar-collapse collapse mai-nav-tabs">
                        <ul class="nav navbar-nav">
                                    
									<li class="nav-item parent">
									<a href="kodjs" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-home"></span><span>Anasayfa</span></a>
	
								   </li>
								  
 
                        </ul>
                      </div>
                    </nav>     
        </div>
      </nav>
	 
	  <div class="main-content container">
        <div class="row">
          <div class="col-md-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">			
						 <center>Ders seçimi ve ilerleme durumunuzu görebilirsiniz.
						 <br>
						 <br>
						 
						   
						   
<?php $menu=mysqli_query($con,"select * from kategori where ustKategori='0'");
while($m=mysqli_fetch_assoc($menu)){
echo '<a href="derszamani?ders='.$m["url"].'"><button style="font-size: 18px; " class="btn btn-default orange-circle-button" >'.$m["baslik"].'<span class="orange-circle-greater-than"></span></button></a>';
}
						?>
						   
						   
						   </center>
                        </div>
            
                        <div class="panel-body" style="">
<div style="margin-bottom:-65px;margin-top:50;font-weight: bold;" class="row">
	<div class="col-sm-2">
    </div>
    <div class="col-sm-6">
     <font color="#29baff"><h4>SIRADAKİ DERS</h4></font>
    </div>
    <div class="col-sm-3">
      <font color="#00ba5c"><h4>BAŞARILI DERSLER</h4></font>
    </div>
  </div>
							<div class="row">
		<div id="timeline">
			<div class="row timeline-movement timeline-movement-top">
				<div class="timeline-badge timeline-future-movement">
						<p style="text-transform: uppercase;margin-left: -8;margin-top: 8;"><?php $dersadi=mysqli_query($con,"select * from kategori where id=$id");
$drs=mysqli_fetch_assoc($dersadi);
echo $drs["baslik"];
						?></p>
				</div>
			</div>
			
			<?php 
$kategoribul=$id;

if($kategoribul==1)
{
	$kategoriadi="JavascriptPuan";
}
elseif($kategoribul==2)
{
	$kategoriadi="AngularPuan";
}
elseif($kategoribul==3)
{
	$kategoriadi="JqueryPuan";
}
elseif($kategoribul==4)
{
	$kategoriadi="KnockoutPuan";
}
elseif($kategoribul==5)
{
	$kategoriadi="BackbonePuan";
}
else
{
	$kategoriadi="HATA";
}

$uybilg=mysqli_query($con,"select * from uyeler where uyeadi='$login'");
$uyrow=mysqli_fetch_assoc($uybilg);
$uyepuani=$uyrow[$kategoriadi];

/*SIRADAKİ DERS*/
$result=mysqli_query($con,"select * from kategori where ustKategori='$id'");
while($row=mysqli_fetch_assoc($result))
{

$derspuani=$row["gpuan"];

echo '<div class="row timeline-movement">';
if($derspuani>=$uyepuani){
	
	echo '
				<div class="timeline-badge center-left">
					
				</div>
				
				<div class="col-sm-6  timeline-item">
					<div class="row">
						<div class="col-sm-11">
							<div class="timeline-panel credits  anim animate  fadeInLeft">
								<ul class="timeline-panel-ul">
									<div class="lefting-wrap">
<li class="img-wraping"><a href="'.$row["url"].'"><img src="'.$row["ders_logo"].'" class="img-responsive" alt="user-image" /></a></li>
									</div>
									<div class="righting-wrap">
										<li><a href="'.$row["url"].'" class="importo">'.$row["baslik"].'</a></li>
										<li><span class="causale" style="color:#000; font-weight: 600;">'.$row["mbaslik"].'</span></li>
						<li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'.$row["tarih"].'</small></p> </li>
									</div>
									<div class="clear"></div>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
';	
}
/*BAŞARILI DERS*/
else if($derspuani<=$uyepuani){
	echo '
				
				<div class="offset-sm-6 col-sm-6  timeline-item">
					<div class="row">
						<div class="offset-sm-1 col-sm-11">
							<div class="timeline-panel debits anim animate fadeInRight animated">
								<ul class="timeline-panel-ul">
									<div class="lefting-wrap">
										<li class="img-wraping"><a href="'.$row["url"].'"><img src="'.$row["ders_logo"].'" class="img-responsive" alt="user-image"></a></li>
									</div>
									<div class="righting-wrap">
										
										<li><a href="'.$row["url"].'" class="importo">'.$row["baslik"].'</a></li>
										<li><span class="causale" style="color:#000; font-weight: 600;">'.$row["mbaslik"].'</span></li>
						<li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'.$row["tarih"].'</small></p> </li>
										
									</div>
									<div class="clear"></div>
								</ul>
							</div>

						</div>
					</div>
				</div>
				

';	
}
else{

}
echo '</div>';

	/* içerik belli bir kısmı çekilecek substr problem yaratıyor kullanma - !!!
$ic=$row["icerik"];
$icerik = substr($ic, 0, 5);
						<li><span class="causale"> '.$icerik.' </span></li>
*/
}
?>		

			
		</div>
	</div>

						
                        </div>
                    </div>
          </div>
        </div>
    </div>
	  
   </div>  
	
	
	
	
	
	

	<!-- Stil Dosyaları -->

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	
	<script src="assets/lib/ders/derszamani.js" type="text/javascript"></script>
	
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	
    <script src="assets/js/app.js" type="text/javascript"></script>

    <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>

</body>
</html>