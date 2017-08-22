function existsUser(){

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
				document.getElementById("username").style.borderColor = "green";
				document.getElementById("username_error").innerHTML = "";
			}else{
				document.getElementById("username").style.borderColor = "red";
				document.getElementById("username_error").innerHTML = "Ci dispiace, ma l'username risulta già preso";
			}
		}
		//alert(xmlHttp.responseText);
	}

}

function existsMail(){

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
				document.getElementById("email").style.borderColor = "green";
				document.getElementById("username_error").innerHTML = "";
			}else{
				document.getElementById("email").style.borderColor = "red";
				document.getElementById("mail_error").innerHTML = "Ci dispiace, ma la mail risulta già utili";
			}
		}
		//alert(xmlHttp.responseText);
	}

}