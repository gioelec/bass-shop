function conferma(){
    AjaxManager.performAjaxRequest("GET","conferma.php",true,null,useHttpResponse);
    window.location.href = "../php/homepage.php";
    function useHttpResponse(response){
        alert(response);
    }
}
function rimuovi(item,sub,totale){
	var newtot= totale-sub;
	alert("sub "+ sub);
	alert(newtot);
	var id = encodeURIComponent(item);
	var row = document.getElementById("row."+item);
	document.getElementById("totale").textContent="TOTALE: "+newtot;
	document.getElementById("tabella").deleteRow(row.rowIndex);
	if(newtot==0){
		var bottone = document.getElementById("conferma");
   		bottone.parentNode.removeChild(bottone);
	}
	AjaxManager.performAjaxRequest("GET","rimuovi.php?id="+id,true,null,useHttpResponse);
	
	function useHttpResponse(response){
        alert(response);
    }

}