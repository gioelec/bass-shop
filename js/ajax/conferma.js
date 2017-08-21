function conferma(){
    
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
    xmlHttp.open("GET", "conferma.php", true);
    xmlHttp.onreadystatechange = useHttpResponse;
    xmlHttp.send(null);
  //  window.location.href = "../homepage.php";
    window.location.href = "../php/homepage.php";

    function useHttpResponse(){
        //maiStato = true;
        //if(xmlHttp.readyState == 4)
            //document.getElementById("divUsername").style.backgroundColor = xmlHttp.responseText;
        //setTimeout('ajaxHandler()', 2000);
        alert(xmlHttp.responseText);
    }

}