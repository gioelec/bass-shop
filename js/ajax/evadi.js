function evadi(id){
    idAcquisto = encodeURIComponent(id);
    tipo=encodeURIComponent(0);
    AjaxManager.performAjaxRequest("GET","evadi.php?idAcquisto="+idAcquisto+"&tipo="+tipo,true,null,useHttpResponse); 
    function useHttpResponse(response){
        alert(response);
    }
    var bottone = document.getElementById("evadi."+id);
    bottone.parentNode.removeChild(bottone);
    var elem = document.createElement("img");
    elem.src = './../immagini/spedito.png';
    elem.setAttribute("height", "100");
    elem.setAttribute("height", "100");
    elem.setAttribute("alt", "spedito");
    document.getElementById("div."+id).appendChild(elem);
}
function nascondi(id){
    idAcquisto = encodeURIComponent(id);
    tipo=encodeURIComponent(1);
    AjaxManager.performAjaxRequest("GET","evadi.php?idAcquisto="+idAcquisto+"&tipo="+tipo,true,null,useHttpResponse); 
    document.getElementById("lista."+id).style.display = 'none';  
    function useHttpResponse(response){
        alert(response);
    }

}