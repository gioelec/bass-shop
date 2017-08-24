function nascondi(id){
    idAcquisto = encodeURIComponent(id);
    AjaxManager.performAjaxRequest("GET","nascondi.php?idAcquisto="+idAcquisto,true,null,useHttpResponse);
    function useHttpResponse(response){
        //maiStato = true;
        //if(xmlHttp.readyState == 4)
            //document.getElementById("divUsername").style.backgroundColor = xmlHttp.responseText;
        //setTimeout('ajaxHandler()', 2000);
        alert(response);
    }

}