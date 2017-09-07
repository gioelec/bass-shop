<div id="menu">
	<div>
		<?php
			echo "Benvenuto \n"; 
			echo $_SESSION['username'];
			
		?>
	</div>
	
	<div id= divmenusotto >
	 	<ul class=listamenu>
	 		
				<?php 
					if ($_SESSION['admin']==true) {
						echo"<li>";
						echo"<a href=./ordini.php>";
							//<span class="menu_item_img profile_img"></span>
							echo"<span class= 'spanmenu'>Ordini</span>";
						echo"</a>";
						echo "<li>";
		 				echo "<a href='./admin.php'>";
						//echo"<div class='menu_item_img settings_img'></div>	";
						echo "<span class= 'spanmenu'>Admin</span>";
						echo"</a>";
					}
	 			?>	
	 		<li>
	 			<a href="./carrello.php">
	 				<img alt="home" src="./../immagini/carrello.png" width="30" height="30">
				</a>
			</li>	
			<li>
	 			<a href="./ordiniPassati.php">
					<span class= "spanmenu">Stato Ordini</span>
				</a>
			</li>	
			<li>
				<a href="./logout.php">
					<!--<div class="menu_item_img sign_out_img"></div>	-->
					<span class= "spanmenu">Sign out</span>
				</a>
		</ul>
	</div>
</div>