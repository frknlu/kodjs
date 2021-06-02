<?php 
include("baglanti.php");

$bkm = "SELECT * FROM ayarlar";
$bakim=mysqli_query($con,$bkm);
$bakims=mysqli_fetch_array($bakim,MYSQLI_ASSOC);
if($bakims["site_durum"] == 1){
header("Refresh:0; url=sayfa/bakim.php");	   
}

$idpc = $_GET["idp"]; 

$sql = "select * from uyeler where uyeno='$idpc' or uyeadi='$idpc'";

$result=mysqli_query($con,$sql);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$ad = $row["uyeadi"];

$nadi = $row["UyeAd"];

$soyadi = $row["UyeSoyad"];

$mail = $row["email"];

$puan = $row["puan"];

?> 
<html lang="tr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php 
$sql = "SELECT * FROM ayarlar";
$result=mysqli_query($con,$sql);
$title=mysqli_fetch_array($result,MYSQLI_ASSOC);
echo '<title>'.$title['title'].'</title>' ;
    ?>
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="assets/img/favicon.png">
	<link rel="stylesheet" type="text/css" href="assets/css/app.css"> 
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <!-- Mega Menu Başlangıç -->
		  <?php require('sayfa/megamenu.php') ?>
             <!-- Mega Menu Son -->      
        </div>
      </nav>
	  
	  
	  <div class="main-content container">
        <div class="user-profile">
          <div class="row">
            <div class="col-md-12">
              <div class="user-display">
                <div class="user-display-cover">
				 <?php 
				if($row["uyeresim"]){
			  echo '<img src="'.$row["uyeresim"].'" alt="cover">';	 
		 }else {
			 echo '<img src="resim/no_avatar.jpg" alt="cover">';
		 } ?>
				</div>
				
                <div style="padding: 60px;" class="user-display-bottom">
                  <div class="user-display-id">
				 <?php 
				if($row["uyeresim"]){
			  echo '<img src="'.$row["uyeresim"].'" alt="avatar" class="user-display-avatar">';	 
		 }else {
			 echo '<img src="resim/no_avatar.jpg" alt="avatar" class="user-display-avatar">';
		 } ?>
                    <div class="user-display-name"><?php echo $row["UyeAd"];?> <?php echo $row["UyeSoyad"];?></div>
                  </div>
				 
                  <div class="user-display-stats">
                   <!-- <div class="user-display-stat"><span class="user-display-stat-counter">26</span><span class="user-display-stat-title">Issues</span></div>
                    <div class="user-display-stat"><span class="user-display-stat-counter">165</span><span class="user-display-stat-title">Commits</span></div>
                    <div class="user-display-stat"><span class="user-display-stat-counter">43</span><span class="user-display-stat-title">Followers</span></div>
                  
					 <div class="user-display-stat"><span class="user-display-stat-title">Following</span></div>
					 -->
                  </div>
				
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="user-info-list panel panel-default">
                <div class="panel-heading panel-heading-divider">Hakkımda</div>
                <div class="panel-body">
                  <table class="no-border no-strip skills">
                    <tbody class="no-border-x no-border-y">
                      <tr>
                        <td class="icon"><span class="icon s7-user"></span></td>
                        <td class="item">Profil Adresim</td>
                        <td><a href="@<?php echo $row["uyeadi"];?>"> @<?php echo $row["uyeadi"];?></a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-gift"></span></td>
                        <td class="item">Doğum Günüm</td>
                        <td> <a href="#"><?php echo $row["DogumTarihi"];?></a></td>
                      </tr>
                      <tr>
                        <td class="icon"><span class="icon s7-mail"></span></td>
                        <td class="item">Mail Adresim</td>
                        <td> <a href="#"><?php echo $row["email"];?></a></td>
                      </tr>
<?php 
$bilgiler=$_COOKIE["kullanici"]; 
if($bilgiler==""){ 
?> 
<?php }else{ ?> <tr>
                        <td class="icon"><span class="icon s7-chat"></span></td>
                        <td class="item">Mesaj Gönder</td>
                        <td> <a href="mesaj_gonder.php?id=<?php echo $row["uyeno"];?>">Mesaj Gönder</a></li></td>
                      </tr>
<?php  	
}
?>	
                    <tr>
                        <td class="icon"><span class="icon s7-date"></span></td>
                        <td class="item">Kayıt Tarihi</td>
                        <td> <a href="#"><?php echo $row["tarih"];?></a></td>
                      </tr>   
                    </tbody>
                  </table>
                </div>
                <div class="panel-heading panel-heading-divider">Sosyal Ağ</div>
                <div class="panel-body">
                  <table class="no-border no-strip social">
                    <tbody class="no-border-x no-border-y">
					<tr>
                        <td class="icon"><span class="fa fa-github"></span></td>
                        <td class="item"> 
						
						<?php if($row["uyegithub"]){
			
			  echo "<a href='".$row["uyegithub"]."'>".$row["uyegithub"]."</a>";
			
		 }else {
			 
			 echo ' Github Adresi Yok.';
			 
		 } 
		
		?> 					
						</td>
                      </tr>
					  
                      <tr>
                        <td class="icon"><span class="fa fa-facebook"></span></td>
                        <td class="item">
						<?php if($row["uyefacebook"]){
			
			  echo "<a href='".$row["uyefacebook"]."'>".$row["uyefacebook"]."</a>";
			
		 }else {
			 
			 echo ' Facebook Adresi Yok.';
			 
		 } 
		
		?> 
		
						</td>
                      </tr>
					  
                      <tr>
                        <td class="icon"><span class="fa fa-twitter"></span></td>
                        <td class="item"> 
						
						<?php if($row["uyetwitter"]){
			
			  echo "<a href='".$row["uyetwitter"]."'>".$row["uyetwitter"]."</a>";
			
		 }else {
			 
			 echo ' Twitter Adresi Yok.';
			 
		 } 
		
		?> 
						</td>
                      </tr>

                      
                    </tbody>
                  </table>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="widget widget-fullwidth ">
                <div class="widget-head">
                  <span class="title"><center>HAKKIMDA</center></span>
				  
                </div>
				<div class="widget-chart-container" style="height: 180px;padding: 20px;position: relative;"> 
                  
                   <h4>
		  <?php 
		  if($row["uyehakkinda"]){
			  
			  echo nl2br($row["uyehakkinda"]);
			  
		  }else {
			  
			  echo 'Hakkında bilgisi yok.';
			  
		  }
		 
		?>
		  </h4>
                  
                </div>
				
        
       
                
              </div>
              
            </div>
          </div>
        </div>
        
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
</div>	
	<!-- Stil Dosyaları -->
	<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/app.js" type="text/javascript"></script>
	<script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
	
    <script type="text/javascript">
      $(document).ready(function(){
      	App.init();
      	App.dashboard();
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
      	App.livePreview();
      });
    </script> 
</body>
</html>