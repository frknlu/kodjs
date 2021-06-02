<?php 
include("baglanti.php");
ob_start();
session_start();

$bkm = "SELECT * FROM ayarlar";
$bakim=mysqli_query($con,$bkm);
$bakims=mysqli_fetch_array($bakim,MYSQLI_ASSOC);
if($bakims["site_durum"] == 1){
header("Refresh:0; url=bakım");	   
}

$login=$_COOKIE["kullanici"]; 
if($login==""){ 	
header("Refresh: 0; url=index.php");
}
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
	<link rel="stylesheet" type="text/css" href="assets/css/app.css" > 
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css">
	
   <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css">

   <link rel="stylesheet" type="text/css" href="assets/lib/jquery.gritter/css/jquery.gritter.css"/>
   
   
   
	 
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
        <div class="row">
          <div class="col-md-12">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                            <center><b></b></center>
                        </div>
            
                        <div class="panel-body" style="">
						
						 <div class="table-responsive noSwipe">
						<h4> İlerleme Durumu:</h4>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:15%;">Javascript</th>
						<th style="width:15%;">AngularJs</th>
						<th style="width:15%;">JQuery</th>
						<th style="width:15%;">Knockout</th>
						<th style="width:15%;">Backbone</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
					               /*TOPLAM DERS*/
					  /*Javascript*/
					  $jvscript=mysqli_query($con,"SELECT * from kategori where ustKategori=1");
					  $jvscriptsn=mysqli_num_rows($jvscript);
					  /*Angularjs*/
					  $angular=mysqli_query($con,"SELECT * from kategori where ustKategori=2");
					  $angularsn=mysqli_num_rows($angular);
					  /*Jquery*/
					  $jquery=mysqli_query($con,"SELECT * from kategori where ustKategori=3");
					  $jquerysn=mysqli_num_rows($jquery);
					   /*Knockout*/
					  $knockout=mysqli_query($con,"SELECT * from kategori where ustKategori=4");
					  $knockoutsn=mysqli_num_rows($knockout);
					   /*Backbone*/
					  $backbone=mysqli_query($con,"SELECT * from kategori where ustKategori=5");
					  $backbonesn=mysqli_num_rows($backbone);
					  
					  
					  
					  $rst=mysqli_query($con,"select * from uyeler where uyeadi='$login'");
					  while($ogrncm=mysqli_fetch_assoc($rst))
					  {
						  $ogrenciminid=$ogrncm["uyeno"];
						  
						   /*Javascript*/	   
					 $jvscpuan=$ogrncm["JavascriptPuan"];
					 $jsbar = ($jvscpuan/$jvscriptsn) * 10;
					 $jsslacson = rtrim($jvscpuan,"0");
					 
					  /*Angularjs*/
					  $angupuan=$ogrncm["AngularPuan"];
					  $angbar = ($angupuan/$angularsn) * 10;
					  $angslacson = rtrim($angupuan,"0");
					  
					  /*Jquery*/
					  $jqupuan=$ogrncm["JqueryPuan"];
					  $jqubar = ($jqupuan/$jquerysn) * 10;
					  $jquslacson = rtrim($jqupuan,"0");
					  
					  /*Knockout*/
					  $kncpuan=$ogrncm["KnockoutPuan"];
					  $kncbar = ($kncpuan/$knockoutsn) * 10;
					  $knocslacson = rtrim($kncpuan,"0");
					  
					  /*Backbone*/
					  $bckpuan=$ogrncm["BackbonePuan"];
					  $bckbar = ($bckpuan/$backbonesn) * 10;
					  $bckslacson = rtrim($bckpuan,"0");
					
					  
						  echo '
						   <tr>
						
						<td class="milestone"><span class="completed">'.$jvscriptsn.' / '.$jsslacson.'</span><span class="version">Javascript İlerleme</span>
                          <div class="progress">
                            <div style="width: '.$jsbar.'%" class="progress-bar progress-bar-primary"></div>
                          </div>
                        </td>
						<td class="milestone"><span class="completed">'.$angularsn.' / '.$angslacson.'</span><span class="version">AngularJs İlerleme</span>
                          <div class="progress">
                            <div style="width: '.$angbar.'%" class="progress-bar progress-bar-primary"></div>
                          </div>
                        </td>
						<td class="milestone"><span class="completed">'.$jquerysn.' / '.$jquslacson.'</span><span class="version">Jquery İlerleme</span>
                          <div class="progress">
                            <div style="width: '.$jqubar.'%" class="progress-bar progress-bar-primary"></div>
                          </div>
                        </td>
						<td class="milestone"><span class="completed">'.$knockoutsn.' / '.$knocslacson.'</span><span class="version">Knockout İlerleme</span>
                          <div class="progress">
                            <div style="width: '.$kncbar.'%" class="progress-bar progress-bar-primary"></div>
                          </div>
                        </td>
						<td class="milestone"><span class="completed">'.$backbonesn.' / '.$bckslacson.'</span><span class="version">Backbone İlerleme</span>
                          <div class="progress">
                            <div style="width: '.$bckbar.'%" class="progress-bar progress-bar-primary"></div>
                          </div>
                        </td>
						  ';
					  }
					  ?>
					  
                    </tbody>
                  </table>
                </div><!--
<br>	
<hr>
<h4>Başarım:</h4>

						<div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="widget widget-tile">
              
              <div class="data-info">
                <div class="desc">*</div>
              
              </div>
            </div>
          </div>
		  
		  <div class="col-md-6 col-lg-3">
            <div class="widget widget-tile">
              
              <div class="data-info">
                <div class="desc">*</div>
              
              </div>
            </div>
          </div>
		  
		  <div class="col-md-6 col-lg-3">
            <div class="widget widget-tile">
              
              <div class="data-info">
                <div class="desc">*</div>
              
              </div>
            </div>
          </div>
		  
		  <div class="col-md-6 col-lg-3">
            <div class="widget widget-tile">
              
              <div class="data-info">
                <div class="desc">*</div>
              
              </div>
            </div>
          </div>
          
		 
       
        </div>
						
						
				-->		
						
			
						
						
						

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
	
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script> 
	
	 <script src="assets/lib/jquery.gritter/js/jquery.gritter.js" type="text/javascript"></script>
	
    
   
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
	
	<script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      	App.uiNotifications();
      });
    </script>
</body>
</html>