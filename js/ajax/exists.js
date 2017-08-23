
function existsUser(){
	document.getElementById("username_error").textContent="";
	var len = document.getElementById("username").value.length;
	//alert(len);
	if(len<6||len>10){
		document.getElementById("username").style.border="2px solid red";
		document.getElementById("username_error").textContent="Username da 6 a 10 caratteri";
		return;
	}
	var xmlHttp;
	try{xmlHttp = new XMLHttpRequest();}
	catch(e){
		try{xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");}
		catch(e){
			try{xmlHttp = new ActiveXObject("Microsoft.XMLHTTP")}
			catch(e){
				window.alert("Your browser does not support AJAX!");
				return;
			}
		}
	}
//	window.alert("username");
	username = encodeURIComponent(document.getElementById("username").value);
	tipo = encodeURIComponent(0);
	//window.alert(username);
	xmlHttp.open("GET", "esiste.php?username="+username+"&tipo="+tipo, true);
	xmlHttp.onreadystatechange = useHttpResponse;
	xmlHttp.send(null);
	function useHttpResponse(){
		if(xmlHttp.readyState == 4){
			if(xmlHttp.responseText==0){
				document.getElementById("username").style.border="2px solid green";
				document.getElementById("username_error").textContent = "";
			}else{
				document.getElementById("username").style.border="2px solid red";
				document.getElementById("username_error").textContent = "Username già esistente";
			}
		}
		//alert(xmlHttp.responseText);
	}

}

function existsMail(){
	var ex = /^[a-z0-9]+@[a-z0-9]+\.[a-z]+$/;
	var mail=document.getElementById("email").value;
	var test = ex.test(mail);
	if(!test){
		email.style.border="2px solid red";
		document.getElementById("mail_error").textContent="Rispetta il formato di una e-mail";
		return;
	}
	var xmlHttp;
	try{xmlHttp = new XMLHttpRequest();}
	catch(e){
		try{xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");}
		catch(e){
			try{xmlHttp = new ActiveXObject("Microsoft.XMLHTTP")}
			catch(e){
				window.alert("Your browser does not support AJAX!");
				return;
			}
		}
	}
	//window.alert("email");
	username = encodeURIComponent(document.getElementById("email").value);
	tipo = encodeURIComponent(1);
	//window.alert(username);
	xmlHttp.open("GET", "esiste.php?username="+username+"&tipo="+tipo, true);
	xmlHttp.onreadystatechange = useHttpResponse;
	xmlHttp.send(null);
	function useHttpResponse(){
		if(xmlHttp.readyState == 4){
			if(xmlHttp.responseText==0){
				document.getElementById("email").style.border="2px solid green";
				document.getElementById("mail_error").textContent = "";
			}else{
				document.getElementById("email").style.border = "2px solid red";
				document.getElementById("mail_error").textContent = "E-mail già esistente";
			}
		}
		//alert(xmlHttp.responseText);
	}

}
function validateName(ns){
	//alert (ns);
	var nome = document.getElementById(ns);
	var error= document.getElementById(ns+"_error");
	if(nome.value==""){
		nome.style.border="2px solid red";
		if(ns=="nome")
			error.textContent="Il nome è richiesto";
		else
			error.textContent="Il cognome è richiesto";
		return;
	}
	var ex=/^[a-zA-Zìàèò]+$/;
	var test= ex.test(nome.value);
	if(!test){
		nome.style.border="2px solid red";
		if(ns=="nome")
			error.textContent="Inserisci un nome valido";
		else
			error.textContent="Inserisci un cognome valido";
		return;
	}
	nome.style.border="2px solid green";
	error.textContent="";
	return;
}