<?php
	session_start();
	require_once __DIR__ . "/php/config.php";
    include DIR_UTIL . "sessionUtil.php";
  	if (isset($_SESSION['logged']) && $_SESSION['logged']){
		    header('Location: ./php/homepage.php');
		    exit;
    }
    $GLOBALS['carrello'] = null;
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "GIOELE">
    	<meta name = "keywords" content = "shop">
		<link rel="stylesheet" href="./css/login.css" type="text/css" media="screen">
		<!--<script type="text/javascript" src="./js/effects.js"></script>-->
		<link rel="icon" href = "./immagini/icon2.jpg" sizes="32x32" type="image/jpg"> 
		<script type="text/javascript" src="./js/bassShop.js"></script>		
		<title>Bass Shop</title>
	</head>
	<body onLoad="begin()">
		<section class="sign_in">
		<div id="sign_in_content_header">
			<h3>Bass Shop</h3>
		</div>
		<div id="login_form">
			<form name="login" method="post" action="php/login.php">
				<div>
					<label>Username</label>
					<input type="text" class="post" placeholder="Username" name="username" required autofocus>
				</div>
				<div>
					<label>Password</label>
					<input type="password" class="post" placeholder="Password" name="password" required>
				</div>	
				<div>
					<input type="submit" value="Enter">
					<a href="./php/register.php">Registrati</a>
				</div>
				
				<?php
					if (isset($_GET['errorMessage'])){
						echo '<div class="sign_in_error">';
						echo '<span>' . $_GET['errorMessage'] . '</span>';
						echo '</div>';
					}
				?>
			</form>
		</div>
		</section>
		<footer id="footer">
		<p>
			Progettazione Web A.A. 2016/2017
		</p>
		<p>
			Cos'è Bass-Shop? <a id="scopri" href="./html/about.html">Scoprilo qua!</a>

		</p>
		</footer>
	</body>

</html>
