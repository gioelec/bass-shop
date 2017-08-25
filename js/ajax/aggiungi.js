function aggiungi(id){


    quanti = encodeURIComponent(document.getElementById("quanti."+id).value);
    nome = encodeURIComponent(document.getElementById("nome."+id).value);
    prezzo = encodeURIComponent(document.getElementById("prezzo."+id).value);
    idEsca = encodeURIComponent(id);
   alert(quanti);
    alert(nome);
    AjaxManager.performAjaxRequest("GET","./ajax/aggiungi.php?quanti="+quanti+"&nome="+nome+"&prezzo="+prezzo+"&idEsca="+idEsca,true,null,useHttpResponse);    

    function useHttpResponse(response){
        alert(response);
    }

}
function rimuoviArticolo(id,paginaDettagliata){
    idEsca=encodeURIComponent(id);
    AjaxManager.performAjaxRequest("POST","./ajax/rimuoviArticolo.php?idEsca="+idEsca,true,null,useHttpResponse);    
    document.getElementById("elemento."+id).style.display = 'none';
    if (paginaDettagliata) {
        window.location.replace("../php/homepage.php");
    }
    function useHttpResponse(response){
        alert(response);
    }
}