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
echo '<title>Öğrencilerim '.$title['title'].'</title>' ;
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
		
                <div class="tools">
				
				<div id="table1_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Öğrenci Ara" aria-controls="table1"></label></div>
				
				</div>
              </div> 
			  <div id="table1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

              <div class="panel-body">
                <div class="table-responsive noSwipe">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:5%;">
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label"></span>
                          </label>
                        </th>
                        <th style="width:20%;">Adı Soyadı</th>
                        <th style="width:15%;">Javascript</th>
						<th style="width:15%;">AngularJs</th>
						<th style="width:15%;">Jquery</th>
						<th style="width:15%;">Knockout</th>
						<th style="width:15%;">Backbone</th>
                        <th style="width:10%;">Tarih</th>
                        <th style="width:10%;"></th>
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
					  
					  

					  /*öğretmenin öğrencileri çekiliyor*/
					  $ogr=mysqli_query($con,"select * from uyeler where uyeadi='$login'");
					  $rstsn=mysqli_fetch_assoc($ogr);
					  $grupidbl=$rstsn["grupid"];
					  
					  $rst=mysqli_query($con,"select * from uyeler where rutbeid='1' and grupid='$grupidbl'");
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
                        <td>
                          <label class="custom-control custom-control-sm custom-checkbox">
                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label"></span>
                          </label>
                        </td>
						
                        <td class="user-avatar cell-detail user-info">
						';
								if($ogrncm["uyeresim"]){
	     echo' <img src="'.$ogrncm["uyeresim"].'" alt="Avatar"/>';
            }
          else {
	    echo  '<img src="resim/no_avatar.jpg" alt="Avatar"/>';
         }
						echo'
						<span>'.$ogrncm["UyeAd"].' '.$ogrncm["UyeSoyad"].'</span>
						<span class="cell-detail-description"><a href="/@'.$ogrncm["uyeadi"].'">@'.$ogrncm["uyeadi"].'</a></span>
						</td>
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
						
						
                        <td class="cell-detail"><span>'.$ogrncm["tarih"].'</span>
						</td>
						
						
                        <td class="text-right">
                          <div class="btn-group btn-hspace">
                            <button type="button" data-toggle="dropdown" class="btn btn-secondary btn-xs dropdown-toggle">Seç <span class="icon-dropdown s7-angle-down"></span></button>
                            <div role="menu" class="dropdown-menu dropdown-menu-right">
							<a href="ogrencilerim.php?id='.$ogrenciminid.'" class="dropdown-item">Çıkar</a>		
                              <div class="dropdown-divider"></div>
							  <a href="#" class="dropdown-item">İptal</a>
                            </div>
                          </div>
                        </td>
                      </tr>
						  ';
						  
						  
					  }
					  
					  $ogrencisilid=$_GET['id'];
					  
					 if(isset($ogrencisilid)){
					
					  $uyesiladi=mysqli_query($con,"select * from uyeler where uyeno='$ogrencisilid'");
					  $uyeislemad=mysqli_fetch_assoc($uyesiladi);
					  $uyeadi=$uyeislemad["UyeAd"];
					  
					  $bildirimislem=mysqli_query($con,"update uyeler set grupid='0' where uyeno='$ogrencisilid'");
					
if($bildirimislem==0){
		}
		else
		{
echo "<script language='javascript'>";
echo 'alert("$uyeadi öğrenci çıkarıldı.");';
echo "</script>";
header("Refresh:0; url=ogrencilerim.php");
		}
					 }
else{
	
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