<?php 
include("baglanti.php");

ob_start();
$id = (int) $_GET['id'];
$type = $_GET['type'];
if ($type != 'cevaplar' && $type != 'konular')
{
	header('Location: forum.php');
	exit();
}
ob_end_clean();
?>
<?php
function clear($message)
{
	if(!get_magic_quotes_gpc())
	$message = addslashes($message);
	$message = strip_tags($message);
	$message = htmlentities($message);
	return trim($message);
}

if ($_POST['submit'])
{

	$message = $_POST['message'];
	$subject = clear($_POST['subject']);
	$poster = clear($_POST['poster']);
	$idyenicek = $_POST['slct_konu'];
	
	$uyeidcek=$_COOKIE["kullanici"];
	$bildirim = "0";
	$konusahibi = $_POST['konu_sahibi'];;
	
	
	$date = mktime();/*zaman alındı*/
	if($type == 'konular')
	{
		 
	if($id==0){
        $sqlx="SELECT konular FROM forum WHERE id='$idyenicek'";
		
		$sorgu=mysqli_query($con,$sqlx);
		$query = mysqli_fetch_assoc($sorgu);
		
		$konular = $query['konular'] + 1;
		/*konu +1 ekliyor */
		$sql2=("UPDATE forum SET konular = '$konular', lastposter='$poster', lastpostdate='$date' WHERE id='$idyenicek'");
		mysqli_query($con,$sql2);
		
        $sql3=("INSERT INTO konular (id,forumid,message,subject,poster,date,lastposter,lastpostdate,cevaplar) VALUES ('','$idyenicek','$message', '$subject','$poster', '$date', '', '', '0')");
		mysqli_query($con,$sql3);
		
		/*bildirim sistemi eski
		$uyesis="UPDATE uyeler SET forumid='$idyenicek',bildirimid='$bildirim' where uyeadi='$uyeidcek'";
		mysqli_query($con,$uyesis);*/
		
		
		header("Refresh:0; url=konular.php?id=$idyenicek");
	}
	else{
		
		$sqlx=("SELECT konular FROM forum WHERE id='$id'");
		
		$sorgu=mysqli_query($con,$sqlx);
		
		$query = mysqli_fetch_assoc($sorgu);
		
		$konular = $query['konular'] + 1;
		/*konu +1 ekliyor */
		$sql2=("UPDATE forum SET konular = '$konular', lastposter='$poster', lastpostdate='$date' WHERE id='$id'");
		mysqli_query($con,$sql2);
		
		
        $sql3=("INSERT INTO konular (id,forumid,message,subject,poster,date,lastposter,lastpostdate,cevaplar) VALUES ('','$id','$message', '$subject','$poster', '$date', '', '', '0')");
		mysqli_query($con,$sql3);

		
		header("Refresh:0; url=konular.php?id=$id");
	}
		
	}
	else
	{
		$sql5="SELECT cevaplar, forumid FROM konular WHERE id = '$id'";
		$coz=mysqli_query($con,$sql5);
		$queryy=mysqli_fetch_assoc($coz);
		
		
		$id2=$queryy['forumid'];
		
		$cevaplarx=$queryy['cevaplar'] + 1;
		$sql4x="UPDATE konular SET cevaplar='$cevaplarx', lastposter='$poster', lastpostdate='$date' WHERE id='$id'";
		mysqli_query($con,$sql4x);
		
		
		$sql6="SELECT cevaplar FROM forum WHERE id = '$id2'";
		$ww=mysqli_query($con,$sql6);
		$query = mysqli_fetch_array($ww);	
		$cevaplarxx = $query['cevaplar'] + 1;
		mysqli_query($con,"UPDATE forum SET cevaplar='$cevaplarxx',lastposter='$poster', lastpostdate='$date' WHERE id='$id2'");
		
		
		$sql7="INSERT INTO cevaplar (id,topicid,message,subject,poster,date) VALUES ('', '$id', '$message', '$subject','$poster', '$date')";
		mysqli_query($con,$sql7);

		/*bildirim sistemi cevap*/
	
		$sqlb="select * from bildirim where uyeadi='$konusahibi'";
		$bildoku=mysqli_query($con,$sqlb);
		$bildcekildi = mysqli_fetch_array($bildoku);
		$bildsonuc=$bildcekildi["uyeadi"];
		
		if ($uyeidcek==$konusahibi)
		{
			header("Refresh:0; url=cevaplar.php?id=$id");
		}
		else{

		if($bildsonuc==0){
/*eğer üye kendine yorum atıyorsa bildirim eklenmesin boş geçsin*/		
		$bildeklendi="INSERT INTO bildirim (uyeadi,forumid,bildirimid)VALUES('$konusahibi', '$id', '1')";
		$bildirimislem=mysqli_query($con,$bildeklendi);
		
		if($bildirimislem==0){
			echo"hata eklenemedi bildirim insert";
		}
		else
		{
			/*insert işlemi doğruysa*/
				header("Refresh:0; url=cevaplar.php?id=$id");
		}
		
		}
		
		else{
			echo "uyenin adı var ";
			/*aynı konuysa güncelliyor bildirimi bildirim update*/
		$bildguncellendi="UPDATE bildirim SET uyeadi='$konusahibi',forumid='$id',bildirimid='1'";
		$bildirimislem=mysqli_query($con,$bildguncellendi);
		
		if($bildirimislem==0){
			echo"hata eklenemedi 2";
		}
		else
		{
				header("Refresh:0; url=cevaplar.php?id=$id");
		}
		

		}
	}
		
	

	}
}
?>