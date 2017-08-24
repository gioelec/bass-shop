function nascondi(id){
    idAcquisto = encodeURIComponent(id);
    AjaxManager.performAjaxRequest("GET","nascondi.php?idAcquisto="+idAcquisto,true,null,useHttpResponse);
    function useHttpResponse(response){
        alert(response);
    }

}