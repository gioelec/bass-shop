function conferma(){
    AjaxManager.performAjaxRequest("GET","conferma.php",true,null,useHttpResponse);
    window.location.href = "../php/homepage.php";
    function useHttpResponse(response){
        alert(response);
    }

}