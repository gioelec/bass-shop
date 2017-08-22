<?php
	require_once __DIR__ . "/config.php";
    include DIR_UTIL . "sessionUtil.php";
    include __DIR__ . "/esca.php";
    require_once DIR_UTIL . "bassShopDbManager.php";
    
    session_start();
    if (!isset($_SESSION['logged'])) {
    	exit();
    }
  	if ($_SESSION['logged']==false|| $_SESSION['admin']==0){
		    header('Location: ./../index.php');
		    exit;
    }
    global $bassShopDb;
    $elenco;
    $stmnt = $bassShopDb->prepare("SELECT *
        FROM acquisti NATURAL JOIN items 
        INNER JOIN clienti ON clienti.idClienti= acquisti.idCliente
        WHERE visibile=1
        ORDER BY data DESC");
    checkQuery($stmnt); 
        
    $stmnt->execute();
    $result = $stmnt->get_result();
    $elenco=toArray($result);
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"> 
        <meta name = "author" content = "PWEB">
        <meta name = "keywords" content = "game">       
        <link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
        <link rel="stylesheet" href="./../css/carrello.css" type="text/css" media="screen">
        <link rel="icon" href = "./immagini/icon2.jpg" sizes="32x32" type="image/jpg"> 
        <script type="text/javascript" src="../js/ajax/evadi.js"></script>
        <title>Bass Shop - Ordini</title>
    </head>
    <?php
        include DIR_LAYOUT . "menu.php";
        include DIR_LAYOUT . "horizontal_menu.php";
    ?>  
            <article data-fragment data-name="Seguiti">
                <header><h3>Ordini</h3></header>
                    <?php
                        if(!sizeof($elenco)) echo "<p class='emptyResult'>Non abbiamo ricevuto ancora nessun ordine</p>";
                    ?>
                    <ul class="ListaOrdini">
                        <?php
                            foreach($elenco as $esca) {
                                $idAcquisto=$esca['idAcquisto'];
                                echo "<ul class='pubblicizza' id='lista.$idAcquisto'>";
                                    echo "<li >";
                                       //echo "<div>";
                                        echo "<span >";//
                                        echo "<p>Item: {$esca['Nome']}  Quantita: {$esca['idItem']} Prezzo: {$esca['Prezzo']} Nome, Cognome cliente: {$esca['nome']}, {$esca['cognome']}</p> ";
                                       // echo "<span >{$esca['idItem']}</span> ";
                                       // echo "<span >{$esca['quantita']}</span> ";
                                       // echo "<span >{$esca['Prezzo']}</span> ";
                                       // echo "<span >{$esca['nome']}</span> ";
                                       // echo "<span >{$esca['cognome']}
                                        echo"</span> ";
                                        echo "<div id='div.$idAcquisto'>";
                                        if($esca['spedito']==0)
                                            echo "<input class= 'conferma' id='evadi.$idAcquisto' type='button' value='Evadi' onclick='evadi({$esca['idAcquisto']})''>";
                                        else{
                                            echo"<img border='0' alt='spedito' src='./../immagini/spedito.png' width='100' height='100'>";
                                        }
                                        echo "</div>";
                                        echo "<input class= 'conferma' id='nascondi' type='button' value='Nascondi Spedizione' onclick='nascondi({$esca['idAcquisto']})'>";
                                        echo "<input type='hidden' value={$esca['idAcquisto']}>";
                                        //echo "</div>";
                                    echo "</li>";
                                echo "</ul>";                                     
                            }
                        ?>
                    </ul>
            </article>
        </div>
    </body>
</html>