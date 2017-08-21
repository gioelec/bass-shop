<div id="menu">
	<div id="menu_home" class="menu_single_section">
		<a href="./../php/homeLatest.php">
			<div class="logo_img"></div>	
		</a>
		<?php
			echo "Benvenuto \n"; 
			echo $_SESSION['username'];
			
		?>
	</div>
	
	<div id="user_menu" class="menu_single_section">
	 	<ul>
	 		<li>
				<a href="">
					<span class="menu_item_img profile_img"></span>
					<span>Profile</span>
				</a>
				<?php 
					if ($_SESSION['admin']==true) {
						echo "<li>";
		 				echo "<a href='./admin.php'>";
						echo"<div class='menu_item_img settings_img'></div>	";
						echo "<span>Admin</span>";
						echo"</a>";
					}
	 			?>
	 	</ul> 	
	</div>
	<div id="movie_menu" class="menu_single_section">
		<ul>	
	 		<li>
	 			<a href="./carrello.php">
	 				<img border="0" alt="home" src="./../immagini/carrello.png" width="20" height="20">
				</a>
			</li>
	
		</ul>
	</div>
	<div id="sign_out_menu" class="menu_single_section">
		<ul>	
			<li>
				<a href="./logout.php">
					<div class="menu_item_img sign_out_img"></div>	
					<span>Sign out</span>
				</a>
		</ul>
	</div>
	<div id="search" class="menu_single_section">
		<form name="form" method="post" action="../php/search.php">
			<input type="text" name="search" placeholder="ricerca cosa vuoi acquistare">
			<input type="submit" value="cerca">
			
		</form>
	</div>
	
</div>