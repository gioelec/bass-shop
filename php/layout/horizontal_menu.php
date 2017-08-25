<nav id="content_nav">
	<a href="./homepage.php"><img class= "immaginisezione" alt="home" src="./../immagini/home.png" width="100" height="100"></a>	

	<a id="canne" href="./homepageCanne.php" class="normal_text">Canne</a>
	<a id="mulinelli" href="./homepageMulinelli.php" class="normal_text">Mulinelli</a>
	<a id="esche" href="./homepageEsca.php" class="normal_text">Esche</a>
	<a id="acquisti" href="./homepageLatest.php" class="normal_text">Ultimi Acquisti</a>
	<a href="javascript:show('search')"><img class= "immaginisezione"  alt="ricerca" src="./../immagini/lente.png" width="100" height="100"></a>	
	<aside id="search">
			<div class="closeButton" onclick="javascript:hide('search')"></div>
			<header>
				<h2>Ricerca</h2>
			</header>
			<form name="form" method="post" action="../php/search.php">
				<input type="text" name="search" placeholder="ricerca cosa vuoi acquistare">
				<input type="submit" value="cerca">	
			</form>
	</aside>
	<script type="text/javascript" src="../js/utility.js"></script>
</nav>