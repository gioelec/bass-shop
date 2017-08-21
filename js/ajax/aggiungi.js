function aggiungi(id){

   //var id = <?php echo json_encode($idEsca); ?>;
    alert("nome."+id)
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
    paginaEsca(id);

    quanti = encodeURIComponent(document.getElementById("quanti."+id).value);
    nome = encodeURIComponent(document.getElementById("nome."+id).value);
    prezzo = encodeURIComponent(document.getElementById("prezzo."+id).value);
   alert(quanti);
    alert(nome);
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
function paginaEsca(id){

   //var id = <?php echo json_encode($idEsca); ?>;
    alert("paginaEsca");
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

    id = encodeURIComponent(id);
    xmlHttp.open("GET", "paginaDettagliata.php?id="+id, true);
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