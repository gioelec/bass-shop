function aggiungi(){
    alert("aggiungi");

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

    quanti = encodeURIComponent(document.getElementById("quanti").value);
    nome = encodeURIComponent(document.getElementById("nome").value);
    prezzo = encodeURIComponent(document.getElementById("prezzo").value);
    xmlHttp.open("GET", "aggiungi.php?quanti="+quanti+"&nome="+nome+"&prezzo="+prezzo, true);
    xmlHttp.onreadystatechange = useHttpResponse;
    xmlHttp.send(null);

    function useHttpResponse(){
        //maiStato = true;
        //if(xmlHttp.readyState == 4)
            //document.getElementById("divUsername").style.backgroundColor = xmlHttp.responseText;
        //setTimeout('ajaxHandler()', 2000);
        alert(xmlHttp.responseText);
    }

}