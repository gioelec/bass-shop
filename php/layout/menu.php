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
	 		<li>
	 			<a href="">
					<div class="menu_item_img settings_img"></div>	
					<span>Settings</span>
				</a>
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
</div>