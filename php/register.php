
<!DOCTYPE html>
<html>
<body>
	<head>
		<meta charset="utf-8">
		<title>Bass Shop - Registrazione</title>
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<script type="text/javascript" src="./../js/ajax/exists.js"></script>
		<link rel="stylesheet" href="./../css/register.css" type="text/css" media="screen">
	</head>
		<div id="cA">
			<form id="registerForm" method="POST" action="./registraCliente.php" onsubmit="return Validate()" >
				<h1>Registrazione</h1>
				<div class="divForm">
					<input type="text" title="Inserisci un nome valido"  id="nome" name="nome" class="light wide"  placeholder="Name" pattern="^[a-zA-Zìàèò ,.'-]+$" onfocusout="validateName('nome');"  required />
					<div id="nome_error" class="error" ></div>
				</div>
				<div class="divForm">
					<input pattern="^[a-zA-Zìàèò ,.'-]+$" type="text" title="Inserisci un cognome valido" id="cognome" name="cognome" class="light wide" placeholder="Surname" required onfocusout="validateName('cognome');"/>
					<div id="cognome_error" class="error" "></div>
				</div>
				<div class="divForm"> 
					<input placeholder="Username" pattern="[a-zA-Z0-9_-]{6,10}" required  title="Inserisci tra i 6 e i 10 caratteri,numeri o i simboli '-_'" type="text" name="username" id="username" class="light wide" onfocusout=" existsUser();"/>
					<div id="username_error" class="error"></div>
				</div>
				<div class="divForm"> 
					<input placeholder="nome@email.com" title="Inserisci un email corretta: email@provider.ext" type="email"  id="email" name="email" class="light wide" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required onfocusout="existsMail();" >
					<div id="mail_error" class="error"></div>
				</div>
				<div class="divForm">
					<input placeholder="Password" type="password" title="Inserisci una password corretta: almeno 7 caratteri e/o numeri (max 20)"  id="password" name="password" class="light wide" pattern=".{7,20}" required />
					<div id="password_error" class="error"></div>
				</div>
				<div>				
					<input class="pulsanti" type="submit" class= "submit" value="REGISTRATI" >
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
		</main>
		<!--<script type="text/javascript" src="js/components/index.js"></script>-->
</body>
