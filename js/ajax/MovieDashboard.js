function MovieDashboard(){}

MovieDashboard.DEFAULT_POSTER_URL = "http://entertainment.ie/movie_trailers/trailers/flash/posterPlaceholder.jpg";

MovieDashboard.removeContent = 
	function(){
		var dashboardElement = document.getElementById("movieDashboard");
		if (dashboardElement === null)
			return;
		
		var firstChild = dashboardElement.firstChild;
		if (firstChild !== null)
			dashboardElement.removeChild(firstChild);
	
	}
	
MovieDashboard.setEmptyDashboard = 
	function(){
		MovieDashboard.removeContent();
		
		var warningDivElem = document.createElement("div");
		warningDivElem.setAttribute("class", "warning");
		var warningSpanElem = document.createElement("span");
		warningSpanElem.textContent = "There are no movies to load!";
		
		warningDivElem.appendChild(warningSpanElem);
		document.getElementById("movieDashboard").appendChild(warningDivElem);
		
	}
	
MovieDashboard.addMoreData =
	function(data){
		var dashboardElement = document.getElementById("movieDashboard");
		if (dashboardElement === null || data === null || data.length <= 0)
			return;
			
		// Get the movie list element (tag '<ul></ul>')	
		var movieListElem = document.getElementById("posterMovieList");
		if (movieListElem === null){
			movieListElem = MovieDashboard.createMovieListElement();
			dashboardElement.appendChild(movieListElem);
		}
		
		// Create new movie item (tag '<li></li>')
		for (var i = 0; i < data.length; i++){
			var movieItemElem = MovieDashboard.createMovieItemElement(data[i]);
			movieListElem.appendChild(movieItemElem);
		}		
		
	}

MovieDashboard.refreshData =
	function(data){
		MovieDashboard.removeContent();
			
		// Create new movie lists (tag <ul></ul>)
		var newMovieListElem =	MovieDashboard.createMovieListElement();
		
		// Create new movie item (tag '<li></li>')
		for (var i = 0; i < data.length; i++){
			var movieItemElem = MovieDashboard.createMovieItemElement(data[i]);
			newMovieListElem.appendChild(movieItemElem);
		}		
		
		document.getElementById("movieDashboard").appendChild(newMovieListElem);
			
	}
	
MovieDashboard.createMovieListElement = 
	function(){
		var movieListElem = document.createElement("ul");
		movieListElem.setAttribute("id", "posterMovieList");
		movieListElem.setAttribute("class", "poster_movies_list");
		
		return movieListElem;
	}

MovieDashboard.createMovieItemElement = 	
	function(currentData){
		var movieItemLi = document.createElement("li");
		movieItemLi.setAttribute("id", "movie_item_" + currentData.movie.movieId);
		movieItemLi.setAttribute("class", "poster_movie_item_wrapper");
		
		movieItemLi.appendChild(MovieDashboard.createNavBarElement(currentData));
		movieItemLi.appendChild(MovieDashboard.createPosterElement(currentData));
		movieItemLi.appendChild(MovieDashboard.createDetailMovieElement(currentData));
		
		return movieItemLi; 
	}

MovieDashboard.createNavBarElement =
	function(currentData){
		var navBarElem = document.createElement("nav");
		navBarElem.setAttribute("id", "user_movie_nav_bar_" + currentData.movie.movieId);
		
		// Create watched div elem (tag <div></div>)
		var watchedItemElem = document.createElement("div");
		watchedItemElem.setAttribute("id", "watchedItem_" + currentData.movie.movieId);
		watchedItemElem.setAttribute("class", "nav_movie_item check_img_" + currentData.userMovieStat.watched);
		watchedItemElem.setAttribute("onClick", "UserMovieNavBarEventHandler.onWatchEvent(" + currentData.movie.movieId + ")");
	
		// Create to-watch div elem (tag <div></div>)
		var toWatchItemElem = document.createElement("div");
		toWatchItemElem.setAttribute("id", "toWatchItem_" + currentData.movie.movieId);
		toWatchItemElem.setAttribute("class", "nav_movie_item to_watch_img_" + currentData.userMovieStat.toWatch);
		toWatchItemElem.setAttribute("onClick", "UserMovieNavBarEventHandler.onToWatchEvent(" + currentData.movie.movieId + ")");
		
		// Create like div elem (tag <div></div>)
		var likeItemElem = document.createElement("div");
		likeItemElem.setAttribute("id", "likeItem_" + currentData.movie.movieId);
		likeItemElem.setAttribute("class", "nav_movie_item like_img_" + currentData.userMovieStat.liked);
		likeItemElem.setAttribute("onClick", "UserMovieNavBarEventHandler.onLikeEvent(" + currentData.movie.movieId + ")");
		
		// Create dislike div elem (tag <div></div>)
		var dislikeItemElem = document.createElement("div");
		dislikeItemElem.setAttribute("id", "dislikeItem_" + currentData.movie.movieId);
		dislikeItemElem.setAttribute("class", "nav_movie_item dislike_img_" + currentData.userMovieStat.disliked);
		dislikeItemElem.setAttribute("onClick", "UserMovieNavBarEventHandler.onDislikeEvent(" + currentData.movie.movieId + ")");
		
		// Create like count div elem (tag <div></div>)
		var likeCountItemElem = document.createElement("div");
		likeCountItemElem.setAttribute("id", "likeCountItem_" + currentData.movie.movieId);
		likeCountItemElem.setAttribute("class", "nav_movie_item stats_user_movie");
		likeCountItemElem.textContent = "(" + currentData.userMovieStat.likedCount + ")";
		
		// Create dislike count div elem (tag <div></div>)
		var dislikeCountItemElem = document.createElement("div");
		dislikeCountItemElem.setAttribute("id", "dislikeCountItem_" + currentData.movie.movieId);
		dislikeCountItemElem.setAttribute("class", "nav_movie_item stats_user_movie");
		dislikeCountItemElem.textContent = "(" + currentData.userMovieStat.dislikedCount + ")";

		// Append all the div element to the nav bar
		navBarElem.appendChild(watchedItemElem);
		navBarElem.appendChild(toWatchItemElem);
		navBarElem.appendChild(likeItemElem);
		navBarElem.appendChild(likeCountItemElem);
		navBarElem.appendChild(dislikeItemElem);
		navBarElem.appendChild(dislikeCountItemElem);
		
		return navBarElem;
	}

MovieDashboard.createPosterElement =
	function(currentData){
		// Create div wrapper
		var posterDivElem = document.createElement("div");
		posterDivElem.setAttribute("class", "poster_movie_item");
		
		// Create poster link
		var posterLinkElem = document.createElement("a");
		posterLinkElem.setAttribute("href", "./detailedmovie.php?movieId=" + currentData.movie.movieId);
		
		// Create img
		var posterImgElem = new Image();
		posterImgElem.alt = "poster";
		posterImgElem.src = currentData.movie.posterUrl;
		if (currentData.movie.posterUrl === "N/A")
			posterImgElem.src = MovieDashboard.DEFAULT_POSTER_URL;
				
		posterLinkElem.appendChild(posterImgElem);
		posterDivElem.appendChild(posterLinkElem);
		
		return posterDivElem;
	}
			
MovieDashboard.createDetailMovieElement =
	function(currentData){
		// Create div wrapper
		var detailMovieDivElem = document.createElement("div");
		detailMovieDivElem.setAttribute("class", "detail_movie_item");
		
		// Create title link (tag <a></a>)
		var detailMovieLinkElem = document.createElement("a");
		detailMovieLinkElem.setAttribute("href", "./detailedmovie.php?movieId=" + currentData.movie.movieId);
		detailMovieLinkElem.textContent = currentData.movie.title;
		
		// Create director paragraph (tag <p></p>)
		var detailMovieDirectorPElem = document.createElement("p");
		detailMovieDirectorPElem.textContent = currentData.movie.director;
		
		detailMovieDivElem.appendChild(detailMovieLinkElem);
		detailMovieDivElem.appendChild(detailMovieDirectorPElem);
		
		return detailMovieDivElem;	
	}

MovieDashboard.updateMovieNavBar = 
	function(data){
		if (document.getElementById("user_movie_nav_bar_" + data.movie.movieId) === null)
			return;
	
		var itemNavBar;
		// Watched item
		itemNavBar = document.getElementById("watchedItem_" + data.movie.movieId);
		itemNavBar.setAttribute("class", "nav_movie_item check_img_" + data.userMovieStat.watched);
		// to Watch item
		itemNavBar = document.getElementById("toWatchItem_" + data.movie.movieId);
		itemNavBar.setAttribute("class", "nav_movie_item to_watch_img_" +  data.userMovieStat.toWatch);
		// like item
		itemNavBar = document.getElementById("likeItem_" + data.movie.movieId);
		itemNavBar.setAttribute("class", "nav_movie_item like_img_" + data.userMovieStat.liked);
		itemNavBar = document.getElementById("likeCountItem_" + data.movie.movieId);
		itemNavBar.textContent = "(" + data.userMovieStat.likedCount + ")";
		//dislike item
		itemNavBar = document.getElementById("dislikeItem_" + data.movie.movieId);	
		itemNavBar.setAttribute("class", "nav_movie_item dislike_img_" + data.userMovieStat.disliked);
		itemNavBar = document.getElementById("dislikeCountItem_" + data.movie.movieId);
		itemNavBar.textContent = "(" + data.userMovieStat.dislikedCount + ")";
	}
	
MovieDashboard.updateNavigationPage = 
	function(currentPage, noMoreDataExist){
		// update the number of the page
		var currentPageElems = document.getElementsByClassName("currentPage");
		for (var i = 0; i < currentPageElems.length; i++)
			currentPageElems[i].textContent = "Page " + currentPage;
		
		var previousElems = document.getElementsByClassName("previous");
		for (var i = 0; i < previousElems.length; i++){
			if (currentPage === 1) // Disable the previous event
				previousElems[i].disabled = true;
			else // Enable the previous event
				previousElems[i].disabled = false;
			
		}
		
		var nextElems = document.getElementsByClassName("next");
		for (var i = 0; i < nextElems.length; i++){
			if (noMoreDataExist) // Disable the next event
				nextElems[i].disabled = true;
			else // Enable the previous event
				nextElems[i].disabled = false;
			
		}
			
		
	}
	