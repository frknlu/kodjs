<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'db_kodjs');
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
//include("baglanti.php"); can be added
	
    if(isset($_POST['action']) && $_POST['action'] == 'availability')
    {
		    $uyeadicek=$_POST['kullaniciadi'];
		
            $username = mysqli_real_escape_string($connection,$uyeadicek);
            $query  = "select uyeadi from uyeler where uyeadi='".$username."'";
            $res    = mysqli_query($connection,$query);
            $count  = mysqli_num_rows($res);
            echo $count;
  
    }
	
	
	if(isset($_POST['action']) && $_POST['action'] == 'availabilitymail')
    {
		    $uyeemailcek=$_POST['kullaniciemail'];
		
            $email = mysqli_real_escape_string($connection,$uyeemailcek);
            $query2  = "select email from uyeler where email='".$email."'";
            $res2    = mysqli_query($connection,$query2);
            $count2  = mysqli_num_rows($res2);
            echo $count2;
  
    }
 
?>
