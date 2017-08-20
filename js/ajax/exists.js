function ajaxHandler(){

	var xmlHttp;
	try{xmlHttp = new XMLHttpRequest();
		//xmlHttp2 = new XMLHttpRequest();}
	catch(e){
		try{xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			//xmlHttp2 = new ActiveXObject("Msxml2.XMLHTTP");}
		catch(e){
			try{xmlHttp = new ActiveXObject("Microsoft.XMLHTTP")
			//	xmlHttp2 = new ActiveXObject("Microsoft.XMLHTTP")}
			catch(e){
				window.alert("Your browser does not support AJAX!");
				return;
			}
		}
	}
	window.alert("ajax");

	username = encodeURIComponent(document.getElementById("username").value);
	email = encodeURIComponent(document.getElementById("email").value);
	xmlHttp.open("GET", "cliente.php?action=exists_user?username="+username, true);
	//xmlHttp2.open("GET", "cliente.php?action=exists_mail?email="+email, true);
	xmlHttp.onreadystatechange = useHttpResponse;
	//xmlHttp2.onreadystatechange = useHttpResponse;
	xmlHttp.send(null);
	//xmlHttp2.send(null);

	function useHttpResponse(){
		//maiStato = true;
		if(xmlHttp.readyState == 4){
			if(xmlHttp.responseText>0)
				document.getElementById("username").style.textColor = "red";
			else
				document.getElementById("username").style.textColor = "green";
		}
		/*if(xmlHttp2.readyState == 4){
			if(xmlHttp2.responseText>0)
				document.getElementById("email").style.backgroundColor = "red";
		}*/
		//setTimeout('ajaxHandler()', 2000);
		//alert(xmlHttp.responseText);
	}

}