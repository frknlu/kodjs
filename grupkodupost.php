  <?php  
  
  include("baglanti.php");
  
  $gkuladi=$_COOKIE["kullanici"];
  
					  $grupidal=$_POST["grupkodugir"];
					  
					  mysqli_query($con,"UPDATE uyeler SET grupid='$grupidal' where uyeadi='$gkuladi'");
					  
					  header("Refresh:0; url=grup.php");

					  ?>