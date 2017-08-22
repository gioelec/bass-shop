function Validate(){
	var username= document.forms["registerForm"]["username"];
	var email= document.forms["registerForm"]["email"];
	var password= document.forms["registerForm"]["password"];
	var nome= document.forms["registerForm"]["nome"];
	var cognome== document.forms["registerForm"]["cognome"];
	
	//predno riferimenti ai div per mostrare gli eventuali errori
	var name_error= document.getElementById("name_error");
	var mail_error= document.getElementById("mail_error");
	var surname_error= document.getElementById("surname_error");
	var password_error= document.getElementById("password_error");
	var username_error= document.getElementById("username_error");

	nome.addEventListener("blur",verificaNome,true);
	email.addEventListener("blur",verificaMail,true);
	password.addEventListener("blur",verificaPass,true);
	cognome.addEventListener("blur",verificaCognome,true);
	username.addEventListener("blur",verificaUsername,true);
	
		if(username.value==""){
			username.style.border="1px solid red";
			username_error.textContent="Username è richiesto";
			username.focus();
			return false;
		}
		if(password.value==""){
			password.style.border="1px solid red";
			password_error.textContent="La password è richiesta";
			password.focus();
			return false;
		}
		if(cognome.value==""){
			cognome.style.border="1px solid red";
			surname_error.textContent="Il cognome è richiesto";
			cognome.focus();
			return false;
		}
		if(nome.value==""){
			nome.style.border="1px solid red";
			name_error.textContent="Il nome è richiesto";
			username.focus();
			return false;
		}
		if(email.value==""){
			email.style.border="1px solid red";
			mail_error.textContent="La e-mail è richiesta";
			email.focus();
			return false;
		}
}
	function verificaUsername(){
		if(username.value!=" "){
			username.style.border="1px solid black";
		}

	}