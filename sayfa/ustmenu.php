<div class="container">
<?php 
$sql = "SELECT * FROM ayarlar"; 
$result=mysqli_query($con,$sql);
$adres = mysqli_fetch_array($result,MYSQLI_ASSOC);

$gkuladi=$_COOKIE["kullanici"];
?> 
 <a href="<?php echo $adres['logo_adres']; ?>" class="navbar-brand"></a>
        <!--Left Menu-->
        <ul class="nav mai-top-nav">
        </ul>
        <ul class="navbar-nav float-lg-right mai-icons-nav">
		

<?php 
$gmenu=mysqli_query($con,"SELECT * FROM uyeler where uyeadi='$gkuladi'");
$gmenus = mysqli_fetch_array($gmenu,MYSQLI_ASSOC);

if($gmenus["grupid"]=="0")
{
?>
<li style="margin-top: 4px;color: white;" class="dropdown">
		<span style="vertical-align:middle;">Grup Kodu Mevcutsa Giriniz:</span> 
		</li>


<li class="dropdown nav-item mai-settings">
		<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
		
		<script>
var text="<span style='font-size: 25px;vertical-align:middle;'  class='s7-coffee'></span>" 
var speed=80 // Hız // WebKodu.com

if (document.all||document.getElementById){
document.write('<span id="highlight">' + text + '</span>')
var storetext=document.getElementById? document.getElementById("highlight") : document.all.highlight
}
else
document.write(text)
var hex=new Array("00","14","28","3C","50","64","78","8C","A0","B4","C8","DC","F0")
var r=1
var g=1
var b=1
var seq=1
function changetext(){
rainbow="#"+hex[r]+hex[g]+hex[b]
storetext.style.color=rainbow
}
function change(){
if (seq==6){
b--
if (b==0)
seq=1
}
if (seq==5){
r++
if (r==12)
seq=6
}
if (seq==4){
g--
if (g==0)
seq=5
}
if (seq==3){
b++
if (b==12)
seq=4
}
if (seq==2){
r--
if (r==0)
seq=3
}
if (seq==1){
g++
if (g==12)
seq=2
}
changetext()
}
function starteffect(){
if (document.all||document.getElementById)
flash=setInterval("change()",speed)
}
starteffect()
</script>
		
		</a>
            
			
			<ul class="dropdown-menu">
              <li>
                <div class="title">Grup Kodu <a target="_blank" href="grupkodu.php">Nedir ?</a></div>
                <div class="content">
                  <ul>
               
			   
			   <li>
			   <center>
			   <span></span>
			   <form name="fp1" action="grupkodupost.php" method="post">
                      <div class="">
                          <input type="text" class="form-control" placeholder="Buraya Grup Kodunuzu Giriniz" name="grupkodugir"  maxlength="5">
						  <span><input class="form-control" type="submit" value="Tamam"> </span>
                      </div>
					  </form>

					  </center>                    
					  </li>
					
			   
                  </ul>
                </div>
              </li>
            </ul>
			
			
          </li>
<?php
}
else{
	?>
	<li class="dropdown nav-item">
		<a href="grup.php" role="button" class="nav-link">
		<span style="font-size: 25px;vertical-align: middle;color: #707070;" class='s7-coffee'> </span>
		</a>
	</li>
<?php	
}
 ?>
		
		
		
<li class="dropdown nav-item mai-notifications">
<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="icon s7-bell"></span>
<?php
/*BİLDİRİM SİSTEMİ*/
$bilduye=$_COOKIE["kullanici"]; 

$bildindi=mysqli_query($con,"SELECT * FROM bildirim where uyeadi='$bilduye' ");
$bildindson = mysqli_fetch_assoc($bildindi);
$bindicator = $bildindson['bildirimid'];


/*mesaj sistemi*/
$mesaj2 = "SELECT * FROM uyeler where uyeadi='$bilduye' "; 
$mesajis2=mysqli_query($con,$mesaj2);
$mson2 = mysqli_fetch_assoc($mesajis2);
$msajid2 = $mson2["uyeno"];
/*mesaj bildirim span */
$msjbildirimfetch=mysqli_query($con,"SELECT * FROM mesajlar where msj_alan_id='$msajid2' and msj_bild='1'");
$msjbildirimsnc = mysqli_fetch_assoc($msjbildirimfetch);
$msjbildirim = $msjbildirimsnc["msj_id"];
?>
<?php
if($bindicator==1){
	echo'
<span class="indicator"></span>';
}else
{}
?>
</a>
            <ul class="dropdown-menu">
              <li>
                <div class="title">Bildirim</div>
                <div class="mai-scroller ps-container ps-theme-default" data-ps-id="8a46c7ed-0e31-2be9-c6aa-865526e5e986">
                  <div class="content">
                    <ul>
					<?php 

$bildirim = "SELECT * FROM bildirim where uyeadi='$bilduye' "; 
$bild=mysqli_query($con,$bildirim);


				
while ($bildson = mysqli_fetch_assoc($bild))
{	
$b = $bildson["bildirimid"];
$forumid = $bildson["forumid"];

$cev = "SELECT * FROM cevaplar where topicid='$forumid' "; 
$cevv =mysqli_query($con,$cev);
$cevapsonuc = mysqli_fetch_assoc($cevv);

$forumid2=$cevapsonuc["topicid"];
$mesajı=$cevapsonuc["message"];
$mesajyazan=$cevapsonuc["poster"];
$mesajyazantarih=$cevapsonuc["date"];

$uzunluk = strlen($mesajı); 
$sinir = 40; 
if ($uzunluk > $sinir) { 
$icerikmsjx = substr($mesajı,0,$sinir).'...'; 
}

	echo'
                      <li>
                          <a href="cevaplar.php?id='.$forumid2.'">
                          <div class="icon"><span class="s7-check"></span></div>
                          <div class="content"><span class="desc">'.$icerikmsjx.' <div align="right"> Devamını Oku »</div>Gönderen:<strong> '.$mesajyazan.'</strong></span><span class="date">'.date('D-m-y G:i', $mesajyazantarih).'</span></div></a></li>
						  ';
}
						?>
                    </ul>
                  </div>
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                <div class="footer"> <a href="bildirimsonlandir.php">Tüm Bildirimleri Kapat</a></div>
              </li>
            </ul>
          </li>
		 <li class="dropdown nav-item mai-messages">
		  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="icon s7-comment"></span>
		  		  <?php 
		  if($msjbildirim>0){
	echo'
<span class="indicator"></span>';
}else
{}
?>
		  </a>
            <ul class="dropdown-menu">
              <li>
                <div class="title">Mesajlar</div>
                <div class="mai-scroller ps-container ps-theme-default" data-ps-id="11614f7b-f71b-c8f1-8ad2-8abf397c394c">
                  <div class="content">

				<?php
$mesaj = "SELECT * FROM mesajlar where msj_alan_id='$msajid2' and msj_bild='1' "; 
$mesajis=mysqli_query($con,$mesaj);
while ($mson = mysqli_fetch_assoc($mesajis))
{			
$msj = $mson["msj_id"];
$msajbas = $mson["msj_baslik"];
$msjic = $mson["msj_icerik"];
$msjgon = $mson["msj_gonderen_id"];	
$msjalanidcek=$gmenus["uyeno"];	
				
$mesajgon = "SELECT * FROM uyeler where uyeno='$msjgon' "; 
$mesajisgon=mysqli_query($con,$mesajgon);
$msongon = mysqli_fetch_assoc($mesajisgon);
$msajgon = $msongon["uyeadi"];
				
				
				 if($msj==0){
}
else
{
		echo'
                      <ul>
                      <li><a href="/mesajpostsil.php?msjid='.$msj.'&msjalanid='.$msjalanidcek.'">
					  
                          <div class="img">
						  ';
		if($msongon["uyeresim"]){
	     echo' <img src="'.$msongon["uyeresim"].'"/>';
            }
          else {
	    echo  '<img src="resim/no_avatar.jpg"/>';
         }
						 echo '
						  </div>
                          <div class="content"><span class="date">'.$mson["msj_tarih"].'</span><span class="name">'.$msajgon.'</span><span class="desc">'.$msjic.'</span></div></a></li>
                    </ul>
					';
}
}
		?>		  
                  </div>
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                <div class="footer"> <a href="mesaj.php">Tüm Mesajları Gör</a></div>
              </li>
            </ul>
          </li>
        </ul>
        <!--User Menu-->
        <ul class="nav navbar-nav float-lg-right mai-user-nav">
		  <?php 
$bilgiler=$_COOKIE["kullanici"]; 
if($bilgiler==""){ 
?> 
<style>
#login-dp{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
    background-color:rgba(255,255,255,.8);
	margin-left: -107px;
}
#login-dp .help-block{
    font-size:12px    
}
#login-dp .bottom{
    background-color:rgba(255,255,255,.8);
    border-top:1px solid #ddd;
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
	      <b><span><font color="white">Bir Hesabınız Var mı?&nbsp;</font></span></b>
        <li class="dropdown nav-item">
          <a href="#" class="dropdown-toggle nav-item" data-toggle="dropdown"><b>Giriş Yap</b><span class="caret"></span>
		 </a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							 <div class="col-md-12">
                            <form class="form" name="form1" role="form" method="post" action="uyekontrol.php"  accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="kullanici">Kullanıcı Adı</label>
											 <input type="text" class="form-control" name="kullanici" placeholder="kullanıcı adı" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Parola</label>
											 <input type="password" name="sifre" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Şifremi Unuttum ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" name="submit" class="btn btn-primary btn-block">Giriş Yap</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox"> Beni Hatırla
											 </label>
										</div>
								 </form>
                                                                
							</div>
							<div class="bottom text-center">
								Yenimisiniz ? <a href="uyeol.php"><b>Kayıt Ol</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
<?php 
}else{ 
?> 
          <li class="dropdown nav-item">
		  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle nav-link"> 
	<?php
		  $resultres=mysqli_query($con,"select * from uyeler where uyeadi='$bilgiler'");
          $resim=mysqli_fetch_assoc($resultres);
	     if($resim["uyeresim"])
	      {
	     echo' <img src="'.$resim["uyeresim"].'"/>';
            }
          else {
	    echo  '<img src="resim/no_avatar.jpg"/>';
         }
  ?>
		  <span class="user-name"><?php echo"$bilgiler";?></span>
		  <span class="angle-down s7-angle-down"></span>
		  </a>
            <div role="menu" class="dropdown-menu">
			<a href="uyeprofil.php" class="dropdown-item"><span class="icon s7-home"> </span> Benim Hesabım</a>
			<a href="mesaj.php" class="dropdown-item"><span class="icon s7-mail"> </span> Özel Mesaj</a>
			<a href="profilduzenleid.php" class="dropdown-item"><span class="icon s7-user"> </span>Profil Düzenle</a>
			<a href="sifredegis.php" class="dropdown-item"> <span class="icon s7-tools"> </span>Parola Değiştir</a>
			<a href="cikis.php" class="dropdown-item"><span class="icon s7-power"> </span>Çıkış Yap</a>
			</div>
          </li>
<?php 
} 
?>
        </ul>
      </div>