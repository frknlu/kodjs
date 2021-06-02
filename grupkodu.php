<?php 
include("../baglanti.php");

$bkm = "SELECT * FROM ayarlar";
$bakim=mysqli_query($con,$bkm);
$bakims=mysqli_fetch_array($bakim,MYSQLI_ASSOC);
if($bakims["site_durum"] == 1){
header("Refresh:0; url=sayfa/bakim.php");	   
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
echo '<title>Grup Kodu Nedir? '.$row0['title'].'</title>' ;
  
    ?>
   
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <link type="text/css" href="assets/css/app.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

 <!-- Eklenti -->
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="js/ders.js"></script>
</head>
<style>
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

#duyuru{}
#duyuru .duyuruyazi{
background:rgba(255,255,255,.8);
display:none;
border-top:none;
border-right:2px solid #777777;
border-left:2px solid #777777;
border-bottom:2px solid #777777;
-webkit-border-radius:0 0 5px 5px;
-moz-border-radius:0 0 5px 5px;
border-radius:0 0 5px 5px;
left:0;
margin:25px auto;
padding:10px 30px;
right:0;
color:black;
}

#about{
	margin-top: 60px;
}

#header {
    padding: 30px 0;
    height: 92px;
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    transition: all 0.5s;
    z-index: 997;
    background: rgba(52, 59, 64, 0.9);
</style>
<body>


  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
	  
	                                                     <?php 
echo '<a class="navbar-brand" href="/"><img src="'.$row0['logo_resim'].'" alt="" title="" /></img></a>';
    ?>  
	
        <a href="/"></a>

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
    
         <li class=""><a href="/index_1.php">Derse Devam Et</a></li>     
<?php 
} 
?>		

        </ul>
      </nav>
    </div>
  </header>
  

  <main id="main">


    <section id="about">
      <div class="container">
        <div class="row about-container">


		<div class="main-content container">
<center>
<div class="row">

          <div class="col-md-12">
            <div class="panel panel-border-color panel-border-color-info">
              <div class="panel-heading">Grup Kodu Nedir</div>
              <div class="panel-body panel-body-contrast">
                <p> Görevli öğretmen tarafıdan oluşturulan grup kodu ile öğrenciye erişebilir öğrenci istatistiklerine göz atabilir.</p>

              </div>
            </div>
          </div>

        
        </div>
		 
	 </center>

	</div>

		 
		 
        </div>
      </div>
    </section>
    
	
    
    
    <section id="services">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">KONULAR</h3>
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
  <script src="lib/jquery/jquery.min.js"></script> 


  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  -->
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script src="lib/wow/wow.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>