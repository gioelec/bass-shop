function aggiungi(id){


    quanti = encodeURIComponent(document.getElementById("quanti."+id).value);
    nome = encodeURIComponent(document.getElementById("nome."+id).value);
    prezzo = encodeURIComponent(document.getElementById("prezzo."+id).value);
    idEsca = encodeURIComponent(id);
   alert(quanti);
    alert(nome);
    AjaxManager.performAjaxRequest("GET","aggiungi.php?quanti="+quanti+"&nome="+nome+"&prezzo="+prezzo+"&idEsca="+idEsca,true,null,useHttpResponse);    

    function useHttpResponse(response){
        alert(response);
    }

}