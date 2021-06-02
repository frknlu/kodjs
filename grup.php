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
echo '<title>[Grupid] - '.$title['title'].'</title>' ;
    ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="/assets/lib/stroke-7/style.css">
	<link type="text/css" href="/assets/css/app.css" rel="stylesheet">  

    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css">
	
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.min.css">
	
    <link rel="stylesheet" type="text/css" href="assets/lib/datepicker/css/bootstrap-datepicker3.min.css">
	
	<link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css">
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
          <div class="col-12">
            <div class="panel panel-default panel-table">
		
			<script>
			function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
			</script>

	<style>
.button22 {
    background-color: #747474;
    border: none;
    color: white;
    padding: 8px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 100px;
}
</style>	
			
			 <div class="panel-heading">Grup kodu:
			 <?php 
$ogretmenx=$_COOKIE["kullanici"];
$grupkd=mysqli_query($con,"SELECT * FROM uyeler where uyeadi='$ogretmenx'");
$grupkoducek=mysqli_fetch_assoc($grupkd);
			?>
			

			<div id="displayDivId" style="display: none;">
			<p id="p1"><?php echo $grupkoducek['grupid'] ?></p></div>
			
<button class="button22" onclick="copyToClipboard('#p1')"> 

<?php echo $grupkoducek['grupid'] ?> </button>
		
		
		<?php 
		$grupidblx=$grupkoducek['grupid'];

					  $rstx=mysqli_query($con,"select * from uyeler where rutbeid='2' and grupid='$grupidblx'");
					  
					$ogrncmx=mysqli_fetch_assoc($rstx);
echo ' <div style="float:right;">Grup Öğretmeni: <a target="_blank" href="/@'.$ogrncmx["uyeadi"].'">'.$ogrncmx["UyeAd"].' '.$ogrncmx["UyeSoyad"].'</a></div>';
	

				
		
		?>

              </div> 
			  
			  
			  
			  
			  
			  
			  <div id="table1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

              <div class="panel-body">
			 
                <div class="table-responsive noSwipe">
				 
                  <table class="table table-striped table-hover">
				  <p style="margin-left: 25px;font-size: 16;color: darkslategray;">Grup Üyeleri</p>
                    <thead>
                      <tr>
					  <th style="width:2%;">Profil</th>
                        <th style="width:10%;">Adı</th>
						<th style="width:70%;">Soyadı</th>
                        <th style="width:10%;">Üye Tarihi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
  
					  $grupidbl=$grupkoducek['grupid'];

					  $rst=mysqli_query($con,"select * from uyeler where rutbeid='1' and grupid='$grupidbl'");
					  
					  while($ogrncm=mysqli_fetch_assoc($rst))
					  {
						  $ogrenciminid=$ogrncm["uyeno"];
						  
				
					  
						  echo '
						   <tr>

                        <td class="user-avatar cell-detail user-info">
						';
								if($ogrncm["uyeresim"]){
	     echo' <img src="'.$ogrncm["uyeresim"].'" alt="Avatar"/>';
            }
          else {
	    echo  '<img src="resim/no_avatar.jpg" alt="Avatar"/>';
         }
						echo'
						</td>
						
						 <td class="cell-detail"><span>'.$ogrncm["UyeAd"].'</span>
						 <span class="cell-detail-description"><a href="/@'.$ogrncm["uyeadi"].'">@'.$ogrncm["uyeadi"].'</a></span>
						</td>
						
						 <td class="cell-detail"><span>'.$ogrncm["UyeSoyad"].'</span>
						</td>
						
                        <td class="cell-detail"><span>'.$ogrncm["tarih"].'</span>
						</td>
						
						
                      
						  ';
						  
						  
					  }
					  
					
					  ?>
					  
                    </tbody>
                  </table>
                </div>
              </div>

			  <div class="row mai-datatable-footer"><div class="col-sm-5"><div class="dataTables_info" id="table1_info" role="status" aria-live="polite">Gösterilenler 1 ile 10 arası </div></div><div class="col-sm-7">
			  <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="table1_previous"><a href="#" aria-controls="table1" data-dt-idx="0" tabindex="0" class="page-link">Önceki</a></li>
			 
			 <li class="paginate_button page-item active">
			 <a href="#" aria-controls="table1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
			  
			  <li class="paginate_button page-item ">
			  <a href="#" aria-controls="table1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
			  
			 <li class="paginate_button page-item next" id="table1_next"><a href="#" aria-controls="table1" data-dt-idx="7" tabindex="0" class="page-link">Sonraki</a></li></ul></div>
			  </div>
			  </div>
			  
			  </div>
			  
			  
			  
			  
			  
			  
			  

            </div>
          </div>
        </div>
      </div>  

	<!-- Stil Dosyaları -->
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="/assets/js/app.js" type="text/javascript"></script>

	
	 <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
	
    <script src="/assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="/assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
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