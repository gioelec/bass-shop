
<!DOCTYPE html>
<html lang="it">

	<head>
		<meta charset="utf-8">
		<meta name = "author" content = "GIOELE">
    	<meta name = "keywords" content = "shop">
		<title>Bass Shop - Registrazione</title>
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<script type="text/javascript" src="./../js/ajax/exists.js"></script>
		<link rel="stylesheet" href="./../css/login.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./../css/register.css" type="text/css" media="screen">
	</head>
	<body>
		<div id="cA">
			<form class="sign_in" id='registerForm' method="POST" action="./registraCliente.php" onsubmit="return Validate()" >
				<h1>Registrazione</h1>
				<div class="divForm">
					<input type="text" title="Inserisci un nome valido"  id="nome" name="nome" class="lightwide"  placeholder="Name" pattern="^[a-zA-Zìàèò ,.'-]+$" onblur="validateName('nome');"  required />
					<div id="nome_error" class="error" ></div>
				</div>
				<div class="divForm">
					<input pattern="^[a-zA-Zìàèò ,.'-]+$" type="text" title="Inserisci un cognome valido" id="cognome" name="cognome" class="lightwide" placeholder="Surname" required onblur="validateName('cognome');"/>
					<div id="cognome_error" class="error"></div>
				</div>
				<div class="divForm"> 
					<input placeholder="Username" pattern="[a-zA-Z0-9_-]{6,20}" required  title="Inserisci tra i 6 e i 20 caratteri,numeri o i simboli '-_'" type="text" name="username" id="username" class="lightwide" onblur=" existsUser();"/>
					<div id="username_error" class="error"></div>
				</div>
				<div class="divForm"> 
					<input placeholder="nome@email.com" title="Inserisci un email corretta: email@provider.ext" type="email"  id="email" name="email" class="lightwide" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required onblur="existsMail();" >
					<div id="mail_error" class="error"></div>
				</div>
				<div class="divForm">
					<input placeholder="Password" type="password" title="Inserisci una password corretta: almeno 7 caratteri e/o numeri (max 20)"  id="password" name="password" class="lightwide" pattern=".{7,20}" required />
					<div id="password_error" class="error"></div>
				</div>
				<div>				
					<input type="submit" class= "submit" value="REGISTRATI" >
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
	</body>
</html>
