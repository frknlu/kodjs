<?php 
include("baglanti.php");
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
    <link rel="shortcut icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="/assets/lib/stroke-7/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/theme-switcher/theme-switcher.min.css">
	<link type="text/css" href="/assets/css/app.css" rel="stylesheet">  
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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center>KONU TESTİ</center>
                        </div>
            
                        <div class="panel-body">
                          	
	<center>			
<form method="POST" action="sorular.php">

Konu Seç:
<select name="testsec" required>
  <option value="">Seçiniz</option>
    <option value="1">Javascript</option>
	<option value="2">AngularJs</option>   
	<option value="3">Jquery</option>  
    <option value="4">Knockout</option> 	
	<option value="5">Backbone</option> 
	</select>
	Konu Testi Seç:
	<select name="testsec2" required>
	<option value="">Seçiniz</option>
    <option value="1">Javascript Testi 1</option>
	<option value="2">Javascript Testi 2</option>   
	<option value="1">Angular Js Testi 1</option>  
    <option value="1">Jquery Testi 1</option> 	
	</select>
	
	
	
	<br>
	<br>
<input type="submit" value="BAŞLA" name="gonder">
</form>
</center>

							
                        </div>
         
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
   
</div>
	<!-- Stil Dosyaları -->
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="/assets/js/app.js" type="text/javascript"></script>
    <script src="/assets/lib/theme-switcher/theme-switcher.min.js" type="text/javascript"></script>
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
<div class="tooltip-chart" style="display: none; position: absolute;"></div>
</body>
</html>