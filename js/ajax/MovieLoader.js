function MovieLoader(){}

MovieLoader.DEFAUL_METHOD = "GET";
MovieLoader.URL_REQUEST = "./ajax/movieLoader.php";
MovieLoader.ASYNC_TYPE = true;

MovieLoader.MOVIE_TO_LOAD = 20;
MovieLoader.CURRENT_PAGE_INDEX = 1;

MovieLoader.LATEST_MOVIES_SEARCH = 0;
MovieLoader.UPCOMING_MOVIES_SEARCH = 1;
MovieLoader.MY_MOVIES_SEARCH = 2;
MovieLoader.TO_WATCH_MOVIES_SEARCH = 3;

MovieLoader.SUCCESS_RESPONSE = "0";
MovieLoader.NO_MORE_DATA = "-1";

MovieLoader.init = 
	function() {
		MovieLoader.PAGE_INDEX = 1;
	}

MovieLoader.loadData =
	function(searchType){
		var queryString = "?searchType=" + searchType + "&movieToLoad=" + MovieLoader.MOVIE_TO_LOAD 
							+ "&offset=" + (MovieLoader.CURRENT_PAGE_INDEX-1)*MovieLoader.MOVIE_TO_LOAD;
		var url = MovieLoader.URL_REQUEST + queryString;
		var responseFunction = MovieLoader.onAjaxResponse;
	
		AjaxManager.performAjaxRequest(MovieLoader.DEFAUL_METHOD, 
										url, MovieLoader.ASYNC_TYPE, 
										null, responseFunction);
	}

MovieLoader.next =
	function(searchType){
		MovieLoader.CURRENT_PAGE_INDEX++;
		MovieLoader.loadData(searchType);
	}
	
MovieLoader.previous = 
	function(searchType){
		MovieLoader.CURRENT_PAGE_INDEX--;
		if (MovieLoader.CURRENT_PAGE_INDEX < 1)
			MovieLoader.CURRENT_PAGE_INDEX = 1;
		
		MovieLoader.loadData(searchType);
	}

MovieLoader.search =
	function(pattern){
		// To implement
	}
	
MovieLoader.onAjaxResponse = 
	function(response){
		if (response.responseCode === MovieLoader.NO_MORE_DATA){		
				MovieDashboard.setEmptyDashboard();
				MovieDashboard.updateNavigationPage(MovieLoader.CURRENT_PAGE_INDEX,	true);
				return;
		}
		
		if (response.responseCode === MovieLoader.SUCCESS_RESPONSE)
			MovieDashboard.refreshData(response.data);
		
		var noMoreDataExist = (response.data === null || response.data.length < MovieLoader.MOVIE_TO_LOAD);
		MovieDashboard.updateNavigationPage(MovieLoader.CURRENT_PAGE_INDEX,	noMoreDataExist);
		
	}
