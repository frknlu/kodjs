<?php 
include("baglanti.php");

$bkm = "SELECT * FROM ayarlar";
$bakim=mysqli_query($con,$bkm);
$bakims=mysqli_fetch_array($bakim,MYSQLI_ASSOC);
if($bakims["site_durum"] == 1){
header("Refresh:0; url=/bak%C4%B1m");	   
}
?> 
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php 
$sql = "SELECT * FROM ayarlar";
$result=mysqli_query($con,$sql);
$row0=mysqli_fetch_array($result,MYSQLI_ASSOC);
echo '<title>'.$row0['title'].'</title>' ;
  
    ?>
   
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  

 <!-- Eklenti -->
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
 
 
</head>
<style>
/*header menu*/

#header {
    background: rgba(52, 59, 64, 0.9);
}




#about .about-container .background {x;
    margin-top: 0px;
}

#login-dp{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
    background-color:rgba(255,255,255,.8);
}
#login-dp .help-block{
    font-size:12px    
}
#login-dp .bottom{
    clear:both;
    padding:14px;
}
#login-dp .social-buttons{
    margin:12px 0    
}
#login-dp .social-buttons a{
    width: 49%;
}
#login-dp .form-group {
    margin-bottom: 10px;
}
.btn-fb{
    color: #fff;
    background-color:#3b5998;
}
.btn-fb:hover{
    color: #fff;
    background-color:#496ebc 
}
.btn-tw{
    color: #fff;
    background-color:#55acee;
}
.btn-tw:hover{
    color: #fff;
    background-color:#59b5fa;
}
@media(max-width:768px){
    #login-dp{
        background-color: inherit;
        color: #fff;
    }
    #login-dp .bottom{
        background-color: inherit;
        border-top:0 none;
    }
}

</style>
<body>


  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
	  
	                                                     <?php 
echo '<a class="navbar-brand" href="#hero"><img src="'.$row0['logo_resim'].'" alt="" title="" /></img></a>';
    ?>  
	
        <a href="#hero"></a>

      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
			<?php 
$bilgiler=$_COOKIE["kullanici"]; 
if($bilgiler==""){ 
?> 
         <li><p class="navbar-text" style="color:white;">Bir Hesabınız Var mı?</p></li>  
          <li class="menu-has-children"><a href="#">Giriş Yap</a>
            	<ul id="login-dp" class="dropdown-menu">
             <div class="row">
							 <div class="col-md-12">

								 <form class="form" name="form1" role="form" method="post" action="uyekontrol.php"  accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="kullanici">Kullanıcı Adı</label>
											 <input type="text" class="form-control" name="kullanici" placeholder="Kullanıcı Adı & Mail" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Parola</label>
											 <input type="password" name="sifre" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                                                          <div class="help-block text-right"><a href="" style="color:red;">Şifremi Unuttum ?</a></div>
										</div>
                                                                     <div class="checkbox" style="margin-top:-25px;">
											 <label>
											 <input type="checkbox" value="1" name="benihatirla"> Beni Hatırla
											 </label>
										</div>
										<div class="form-group">
											 <button type="submit" name="submit" class="btn btn-primary btn-block">Giriş Yap</button>
										</div>
										
								 </form>
                                                                
							</div>
							<div class="bottom text-center">
                                                            Yenimisiniz ? <a href="uyeol.php" style="color:red; "><b>Kayıt Ol

															
															
															</b></a>
							</div>
					 </div>
            </ul>
          </li>
          <li class=""><a href="uyeol.php">Kayıt Ol</a></li> 
         
         <?php 
}else{ 
?> 
    
         <li class=""><a href="/kodjs">Derse Devam Et</a></li>     
<?php 
} 
?>		

        </ul>
      </nav>
    </div>
  </header>
  <!-- <section id="hero">

    <div class="hero-container">
          
	  <div style="margin-top:50px;">
      <a href="uyeol.php" class="btn-get-started">Eğitmen olarak öğrencilerinizi takip edebilirsiniz.<br><br><font color="#5dcced"> Şimdi Ücretsiz Kayıt Olun </font></a>
	  </div>
	  
    </div>
  </section> -->

  <main id="main">


   
    
    <section id="services">
      <div class="container wow fadeIn">
	  
        <div class="section-header">
	
<script>
var TxtRotate = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};

TxtRotate.prototype.tick = function() {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

  var that = this;
  var delta = 300 - Math.random() * 100;

  if (this.isDeleting) { delta /= 2; }

  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(function() {
    that.tick();
  }, delta);
};

window.onload = function() {
  var elements = document.getElementsByClassName('txt-rotate');
  for (var i=0; i<elements.length; i++) {
    var toRotate = elements[i].getAttribute('data-rotate');
    var period = elements[i].getAttribute('data-period');
    if (toRotate) {
      new TxtRotate(elements[i], JSON.parse(toRotate), period);
    }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
  document.body.appendChild(css);
};
</script>	
<br>
<br>
	<center>	
		<h4>Kodjs ile
  <span
     class="txt-rotate"
     data-period="2000"
     data-rotate='[ "Knockout ", "JQuery ", "Angularjs ", "Javascript ", "Backbone " ]'></span>
</h4>
<h4>dillerini öğrenebilir, sorular sorarak kendinizi geliştirebilirsiniz.</h4>
		
	</center>	
        

          <p class="section-description"></p>
        </div>
		
        <div class="row">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href="backbone"><img src="img/backbone.png"></a></div>
              <h4 class="title"><a href="backbone">BACKBONE</a></h4>
              <p class="description">Backbone.js JavaScript dili ve model–view–presenter mantığı ile geliştirilen, açık kaynak web uygulama çatısı ve uygulama tasarım paradigması.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href="knockout"><img src="img/knockout.png"></a></div>
              <h4 class="title"><a href="knockout">KNOCKOUT</a></h4>
              <p class="description">Knockout, Model-View-ViewModel deseninin şablonlarla bağımsız bir JavaScript uygulamasıdır.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href="jquery"><img src="img/jquery.png"></a></div>
              <h4 class="title"><a href="jquery">JQUERY</a></h4>
              <p class="description">jQuery, John Resig tarafından 2006 yılında geliştirilmiş ve şu an geniş bir jQuery ekibi tarafından gelişimi sürdürülen JavaScript kütüphanesidir.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href="angularjs"><img src="img/angular.png"></a></div>
              <h4 class="title"><a href="angularjs">ANGULARJS</a></h4>
              <p class="description">AngularJS Google tarafından desteklenen, dünya genelinde yazılımcılar tarafından katkı sağlanan açık kaynak kodlu web uygulama çatısıdır.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href="javascript"><img src="img/javascript.png"></a></div>
              <h4 class="title"><a href="javascript">JAVASCRİPT</a></h4>
              <p class="description">JavaScript, yaygın olarak web tarayıcılarında kullanılmakta olan dinamik bir programlama dilidir.</p>
            </div>
          </div>
              
        </div>

      </div>
    </section>
	
	
	 <section id="about" style="margin-top:-100px;">
      <div class="container">
	    <div class="section-header">
          <h3 class="section-title">Yeni bir dil öğrenmenin en iyi yolu.</h3>
          <p class="section-description"></p>
        </div>
		
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <p>
              
            </p>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-book"></i></div>
              <h4 class="title"><a href="">Konu Anlatım</a></h4>
              <p class="description">Her konu çeşitli aktiviteye sahiptir. </p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-question"></i></div>
              <h4 class="title"><a href="">Konu Sınavı</a></h4>
              <p class="description">Dersini aldığın konuya ait soru cevap sınavları ile bilgilerini ölçebilirsin.</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-clock-o"></i></div>
              <h4 class="title"><a href="">Günlük Seri</a></h4>
              <p class="description">Her dil için ne kadar zaman harcadığın kayıt edilir devam etmek konusunda seni motive eder.</p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
        </div>

      </div>
    </section>
    
    <section id="facts">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">İSTATİSTİK</h3>
          <p class="section-description">Şimdi Sende Katıl...</p>
        </div>
        <div class="row counters">

  				<div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php 
	$xs=0;		
$sqlk="SELECT * FROM kategori where ustKategori=$xs";
if ($resulk=mysqli_query($con,$sqlk))
  {
  $rowcountk=mysqli_num_rows($resulk);
  echo $rowcountk;
  }

?></span>
            <p>Konu</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php

	$sqld="SELECT * FROM kategori where ustKategori!=$xs";
if ($resultd=mysqli_query($con,$sqld))
  {
  $rowcountd=mysqli_num_rows($resultd);
  echo $rowcountd;
  }

?></span>
            <p>Ders</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php 
			
			
			$sqlu="SELECT * FROM uyeler";
if ($resultu=mysqli_query($con,$sqlu))
  {
  $rowcountu=mysqli_num_rows($resultu);
  echo $rowcountu;
  }

			
			 ?></span>
            <p>Kayıtlı Kullanıcı</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php


$sqlt="SELECT * FROM test";
if ($resultt=mysqli_query($con,$sqlt))
  {
  $rowcountt=mysqli_num_rows($resultt);
  echo $rowcountt;
  }




?></span>

            <p>Çözümlü Testler</p>
  				</div>

  			</div>

      </div>
    </section>
	
	
    
  </main>

  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>KodJS</strong>. All Rights Reserved
      </div>
      <div class="credits">

      <a href="https://www.kodjs.com">www.kodjs.com</a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries 
  <script src="lib/jquery/jquery.min.js"></script> -->
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>

  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  
  
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>


  <script src="js/main.js"></script>
  


</body>
</html>