function evadi(id){

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
    idAcquisto = encodeURIComponent(id);
    tipo=encodeURIComponent(0);

    alert(idAcquisto);
    xmlHttp.open("GET", "evadi.php?idAcquisto="+idAcquisto+"&tipo="+tipo, true);
    xmlHttp.onreadystatechange = useHttpResponse;
    xmlHttp.send(null);
    

    function useHttpResponse(){
        //maiStato = true;
        //if(xmlHttp.readyState == 4)
            //document.getElementById("divUsername").style.backgroundColor = xmlHttp.responseText;
        //setTimeout('ajaxHandler()', 2000);
        alert(xmlHttp.responseText);
    }
   // document.getElementById("evadi."+id).style.display = 'none';
    var d=document.getElementById("div."+id);
    d.innerHTML = "<img border='0' alt='spedito' src='./../immagini/spedito.png' width='100' height='100'>";

}
function nascondi(id){
    
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

    idAcquisto = encodeURIComponent(id);
    tipo=encodeURIComponent(1);

    alert(idAcquisto);
    xmlHttp.open("GET", "evadi.php?idAcquisto="+idAcquisto+"&tipo="+tipo, true);
    xmlHttp.onreadystatechange = useHttpResponse;
    xmlHttp.send(null);
    document.getElementById("lista."+id).style.display = 'none';  

    function useHttpResponse(){
        //maiStato = true;
        //if(xmlHttp.readyState == 4)
            //document.getElementById("divUsername").style.backgroundColor = xmlHttp.responseText;
        //setTimeout('ajaxHandler()', 2000);
        alert(xmlHttp.responseText);
    }

}