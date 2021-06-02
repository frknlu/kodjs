<nav class="navbar navbar-expand-md">
                      <button type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="#mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler hidden-md-up collapsed">
                        <div class="icon-bar"><span></span><span></span><span></span></div>
                      </button>
                      <div id="mai-navbar-collapse" class="navbar-collapse collapse mai-nav-tabs">
                        <ul class="nav navbar-nav">
                                    
									<li class="nav-item parent"><!-- open -->
									<a href="/kodjs" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-home"></span><span>Anasayfa</span></a>
                                    </li>
									
									
									<li class="nav-item parent open">
<?php
try {
    $bag = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $bag->exec("SET CHARSET UTF8");
} catch (PDOException $e) {
    die("hata var");
}
 
//bütün kayıtları diziden çekiyoruz kaydetmek için.
$query = "SELECT * FROM kategori order by id";
$goster = $bag->prepare($query);
$goster->execute(); //queriyi tetikliyor
 
$toplamSatirSayisi = $goster->rowCount(); //malumunuz üzere sorgudan dönen satır sayısını öğreniyoruz
 
$tumSonuclar = $goster->fetchAll(); //DB'deki bütün satırları ve sutunları $tumSonuclar değişkenine dizi şeklinde aktarıyoruz

 
//alt kategorisi olmayan kategorilerin sayısını öğreniyoruz:
$altKategoriSayisi = 0;
for ($i = 0; $i < $toplamSatirSayisi; $i++) {
    if ($tumSonuclar[$i]['ustKategori'] == "0") {
        $altKategoriSayisi++;
    }
}
 
echo "
<a href='#' role='button' aria-expanded='false' class='nav-link'><span class='icon s7-bookmarks'></span><span>Dersler ($altKategoriSayisi)</span></a>";

echo "<ul class='mai-nav-tabs-sub mai-sub-nav nav'>";
 
for ($i = 0; $i < $toplamSatirSayisi; $i++) {
    if ($tumSonuclar[$i]['ustKategori'] == "0") {
        Kategoriler($tumSonuclar[$i]['id'], $tumSonuclar[$i]['baslik'], $tumSonuclar[$i]['ustKategori'], $tumSonuclar[$i]['url']);
    }
}
 
 
/*
 * FONKSIYONUN OZELLIKLERI:
 * verilen kategoriyi yazar sonra, yeni bir <ul> </ul> arasina o kategorinin alt kateogirilerini yazar.
 * bu işlemi sonsuza kadar yapar, yani ne kadar alt kategoriniz varsa hepsini ekler
 */
 
function Kategoriler($id, $baslik, $ustKategori ,$url) {
 
    global $tumSonuclar;
    global $toplamSatirSayisi;
 
    //kategorinin, alt kategori sayısını öğreniyoruz:
    $altKategoriSayisi = 0;
    for ($i = 0; $i < $toplamSatirSayisi; $i++) {
        if ($tumSonuclar[$i]['ustKategori'] == $id) {
            $altKategoriSayisi++;
        }
    }

    ///////////////////////////////////////////
 
    echo "<li class='nav-item'><a href='derszamani?ders=$url' style='font-size: 15;text-transform: uppercase;' class='nav-link'><span class='icon s7-diamond'></span><span class='name'>$baslik";/*dropdown parent*/
	if ($altKategoriSayisi > 0) {
        echo " ($altKategoriSayisi)</span></a>";
    }
	else
	{
		echo "</span></a>";
	}
	
	
   
    
	echo"</li>";
}
echo "</ul>";
?>
</li>
									
									
									 <li class="nav-item parent">
									<a href="#" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-help2"></span><span>Forum</span></a>
									
									<ul class="mai-nav-tabs-sub mai-sub-nav nav">
									
									<li class="nav-item"><a href="forum.php" style="font-size: 15;text-transform: uppercase;" class="nav-link"><span class="icon s7-ribbon"></span><span class="name">Konular</span></a>
                                     </li>
									   
									  <li class="nav-item"><a href="yenikonu.php?type=konular&id=0" style="font-size: 15;text-transform: uppercase;" class="nav-link"><span class="icon s7-plus"></span><span class="name">Yeni Konu Aç</span></a>
                                       </li>
									  
                                      </ul> 
                                    </li>
								<?php
					
$ogr=$_COOKIE["kullanici"]; 
$ogrt=mysqli_query($con,"SELECT * FROM uyeler where uyeadi='$ogr'");
$ogretmen = mysqli_fetch_assoc($ogrt);
$ogretmenson = $ogretmen['rutbeid'];

								if ($ogretmenson==2){
										echo '<li class="nav-item parent">
									<a href="ogrencilerim.php" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-study"></span><span>Öğrencilerim</span></a>
                                    </li>';
									}
									?>
									
       
                        </ul>
                      </div>
                    </nav>