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
    alert(idAcquisto);
    xmlHttp.open("GET", "nascondi.php?idAcquisto="+idAcquisto, true);
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