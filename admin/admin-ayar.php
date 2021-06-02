<?php 

include("../baglanti.php");
ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
  ?>
  
  
  

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="admin.php">Proje </a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <font color="green">. .</font>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">

	                          <li><a href="logout.php">Çıkış Yap</a></li>

	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
    <div class="page-content">
    	<div class="row">
		<div class="col-md-2">
		  	<?php require_once("sayfa/solmenu.php") ?>
		  </div>
		  <div class="col-md-10">
		  	<div class="row">
		  	<div class="content-box-large">

<?php 
$sql = "SELECT * FROM admin"; 
$result=mysqli_query($con,$sql);
$admin = mysqli_fetch_array($result,MYSQLI_ASSOC);
    ?>
<form  class="form-horizontal" id="form1" name="form1" method="post" action="admin-sifre.php">

    <td colspan="3">Merhaba <font color="green"><?php echo $admin['username'] ; ?> </font>Sifrenizi Degismek Üzeresiniz</td> 
	<br>

<br>
  
  
      <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Parola:</label>
    <div class="col-sm-4"> 
      <input type="text" name="sifre" class="form-control" id="pwd" placeholder="Parola">
    </div>
  </div>

  
    <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Tekrar Parola:</label>
    <div class="col-sm-4"> 
      <input type="text" name="sifretekrari" class="form-control" id="pwd" placeholder="Tekrar Parola">
    </div>
  </div>
  

  
    <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="Submit" class="btn btn-default">Değiştir</button>
    </div>
  </div>
  
  </form>
			
				
		  	</div>
		  </div>
		</div>
    </div>
    <footer>
         <div class="container">
            <div class="copy text-center">
            </div>
         </div>
      </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>




 
<?php
}
?>