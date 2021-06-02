<?php
include("baglanti.php"); 
$bkm = "SELECT * FROM ayarlar";
$bakim=mysqli_query($con,$bkm);
$bakims=mysqli_fetch_array($bakim,MYSQLI_ASSOC);
if($bakims["site_durum"] == 1){
header("Refresh:0; url=sayfa/bakim.php");	   
}

$bilgiler=$_COOKIE["kullanici"]; 
if($bilgiler==""){ 
?> 
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
$sql = "SELECT * FROM ayarlar";
$result=mysqli_query($con,$sql);
$title=mysqli_fetch_array($result,MYSQLI_ASSOC);
echo '<title>Üye Ol '.$title['title'].'</title>' ;
    ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="assets/css/uyeol.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">

<script type="text/javascript">
$(document).ready(function(){
    $('#kullaniciadi').keyup(function(){
      
        var username = $(this).val(); 
         
        var Result = $('#result'); 
       
        if(username.length > 2) { 
            Result.html('Kontrol Ediliyor...'); 
            var dataPass = 'action=availability&kullaniciadi='+username;
            $.ajax({ 
            type : 'POST',
            data : dataPass,
            url  : 'available.php',
            success: function(responseText){
                if(responseText == 0){
                    Result.html('<span class="success"><font color="green">Uygun</font></span>');
					
					$("#kullaniciadi").addClass("form-control valid");
                }
                else if(responseText > 0){
                    Result.html('<span class="error"><font color="red">Alınmış</font></span>');
					
					$("#kullaniciadi").addClass("form-control error");
					$("#hata").addClass("has-error");
					
                }
                else{
                    alert('Sistem Hatası');
                }
            }
            });
        }else{
            Result.html('En az 3 karakter girin');
        }
        if(username.length == 0) {
            Result.html('');
        }
    });
	

	/*email*/
	
	$('#kullaniciemail').keyup(function(){
      
        var mail = $(this).val(); 
         
        var Result = $('#resultmail'); 
       
        if(mail.length > 2) { 
            Result.html('Kontrol Ediliyor...'); 
            var dataPass = 'action=availabilitymail&kullaniciemail='+mail;
            $.ajax({ 
            type : 'POST',
            data : dataPass,
            url  : 'available.php',
            success: function(responseText){
                if(responseText == 0){
                    Result.html('<span class="success"><font color="green">Uygun</font></span>');
					
					
                }
                else if(responseText > 0){
                    Result.html('<span class="error"><font color="red">Alınmış</font></span>');
					
                }
                else{
                    alert('Sistem Hatası');
                }
            }
            });
        }else{
            Result.html('Hatalı giriş');
        }
        if(mail.length == 0) {
            Result.html('');
        }
    });
	
	
	
	
	
});
</script>
	</head>
 <body>
<header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
	  
	                                                     <?php 
echo '<a class="navbar-brand" href="/"><img src="'.$title['logo_resim'].'" alt="" title="" /></img></a>';
    ?>  
	
        <a href="/"></a>

      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">

         <li><p class="navbar-text" style="color:white;">Bir Hesabınız Var mı?</p></li>  
          <li class="menu-has-children"><a href="/home">Giriş Yap</a>
            	
          </li>

        </ul>
      </nav>
    </div>
  </header>	

	<div class="image-container set-full-height" style="background-image: url('/img/hero-bg.jpg')">
	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!-- Wizard container -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                  <form id="5" name="form1" method="post" action="uyekaydet.php">
						  <div class="wizard-title" style="text-transform:uppercase;!important">
								<br>
								<center>Ücretsiz Kayıt Ol</center>
								<br>
</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#details" data-toggle="tab">Adım 1</a></li>
			                            <li><a href="#captain" data-toggle="tab">Adım 2</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="details">
		                            	<div class="row">
			                            	<div class="col-sm-12">
			                                	<h4 class="info-text"> Temel detaylarla başlayalım.</h4>
			                            	</div>
		                                	
		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">fingerprint</i>
													</span>
													<div id="hata" class="form-group label-floating">
			                                          	<label class="control-label">Kullanıcı Adı</label>
			                                          	<input name="kullaniciadi" id="kullaniciadi" type="text" class="form-control"required>
														<div class="result" id="result"></div>
			                                        </div>
												</div>

												
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">account_circle</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Ad</label>
			                                          	<input name="uyeadi" type="text" class="form-control" required>
			                                        </div>
												</div>
												
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">account_circle</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Soyad</label>
			                                          	<input name="uyesoyadi" type="text" class="form-control" required>
			                                        </div>
												</div>
		                                	</div>
										<div class="col-sm-6">
											
											<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Email Adresi</label>
			                                          	<input name="kullaniciemail" id="kullaniciemail" type="email" parsley-type="email" class="form-control" required>
														<div class="result" id="resultmail"></div>
			                                        </div>
												</div>
												
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">card_giftcard</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Doğum Tarihi</label>
			                                          	<input name="dogumtarihi" type="date" class="form-control" dateFormat:"yyyy/dd/mm" required>
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock_outline</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Parola</label>
			                                          	<input name="kullanicisifre" type="password" class="form-control" required>
			                                        </div>
												</div>
		                                	</div>
		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="captain">
		                                <h4 class="info-text"> Eğitimci iseniz öğrencilerinizi takip edebilmek için öğretmen seçeneceğini seçiniz.</h4>
	<style>
.cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}
.ogrenci{background-image:url(https://www.kodjs.com/img/ogrenci.png);}
.ogretmen{background-image:url(https://www.kodjs.com/img/ogretmen.png);}

.cc-selector input:active +.drinkcard-cc{opacity: .9;}
.cc-selector input:checked +.drinkcard-cc{
    -webkit-filter: none;
       -moz-filter: none;
            filter: none;
}
.drinkcard-cc{
  text-align: center;
  vertical-align: middle;
  height: 116px;
  width: 116px;
  border-radius: 50%;
  color: #999999;
  margin: 0 auto 20px;
  border: 4px solid #f44336;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
  cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    width:100px;height:100px;
    -webkit-transition: all 100ms ease-in;
       -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
    -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
       -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
            filter: brightness(1.8) grayscale(1) opacity(.7);
}
.drinkcard-cc:hover{
    -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
       -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);
}

/* Extras */
a:visited{color:#888}
a{color:#444;text-decoration:none;}
p{margin-bottom:.3em;}
</style>	

						<div class="cc-selector" style="text-align: center;cursor: pointer;margin-top: 20px;">			
										<div class="row">
		                                    <div class="col-sm-12 col-sm-offset-2">                                       
											
												<div class="col-sm-4">
						
												
   <input data-group="B" id="visa" type="radio" name="credit-card" value="ogrenci" />
   <label class="drinkcard-cc ogrenci" for="visa"></label>
        


		                                                <h6>ÖĞRENCİ HESABI</h6>
		                                            
													
		                                        </div>
												
												
		                                        <div class="col-sm-4">


<input data-group="A" id="mastercard" type="radio" name="credit-card" value="ogretmen" />
<label class="drinkcard-cc ogretmen" for="mastercard"></label>
		                                               
														
		                                                <h6>ÖĞRETMEN HESABI</h6>
		                                        </div>
		
		                                    </div>
		                                </div>
										</div>									
<?php
	function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$grubidol=generateRandomString();
?>	
										
<div id="visiblityDivId" style="visibility: hidden;">	

<input data-group="B" name="uyerutbe" type="radio" id="3" value="ogrenci"/>
<input data-group="A" name="uyerutbe" type="radio" id="4" value="ogretmen"/>

<?php 
echo '
<input type="text" value="'.$grubidol.'"  style="display:none;width:46px;" name="grupidata" id="grupid3"  />
';
?>

</div>

<center>
<div style="display:none;" id="grupid2">
<label style="color:black;">GRUP KODU </label><a target="_blank" href="grupkodu.php"><font color="green"> Nedir ?</font></a><br>
</div>
<?php 
echo '
<input type="text" value="'.$grubidol.'"  style="display:none;width:46px;" name="gurubuid" id="grupid" disabled="disabled" />
';
?>
</center>

<script>
$('input[type="radio"]').change(function(){
    $('[data-group="' + $(this).data('group') + '"]').prop('checked', this.checked);
});	
	
$( "input" ).on( "click", function() {
  $( "#log" ).html( $( "input:checked" ).val());
});

$("input[type='radio']").change(function(){
if($(this).val()=="ogretmen")
{
    $("#grupid").show();
	$("#grupid2").show();
}
else
{
       $("#grupid").hide(); 
	    $("#grupid2").hide(); 
}
    
});

/*
function randomstring(L) {
  var s = '';
  var randomchar = function() {
    var n = Math.floor(Math.random() * 62);
    if (n < 10) return n; //1-10
    if (n < 36) return String.fromCharCode(n + 55); //A-Z
    return String.fromCharCode(n + 61); //a-z
  }
  while (s.length < L) s += randomchar();
  return s;
}

var yaz = randomstring(5);
 document.getElementById("grupid").value = yaz;*/
</script>

<center><div id="log"></div> hesabı olarak devam ediliyor.</center>

		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Sonraki' />
	                                    <input type='submit' name="kayit" class='btn btn-finish btn-fill btn-danger btn-wd' value='Kayıt Ol'/>
	                                </div>
	                                <div class="pull-left">
	                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Önceki' />

										<div class="footer-checkbox">
											<div class="col-sm-12">
											  <div class="checkbox">
												  <label>
													  <input type="checkbox" name="optionsCheckboxes" required/>
												  </label>
												 Site Koşullarını Kabul Ediyorum.
											  </div>
										  </div>
										</div>
	                                </div>
	                                <div class="clearfix"></div>
	                        	</div>
		                    </form>


		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->
	
	</div>				

	<script src="assets/js/uyeol.js"></script>


</body>
</html>

<?php 
}else{ 
?>
 <meta http-equiv="refresh" content="0;URL=index.php">
<?php
}
?>