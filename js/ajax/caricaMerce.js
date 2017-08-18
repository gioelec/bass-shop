function caricaMerce(){}

caricaMerce.DEFAUL_METHOD = "GET";
caricaMerce.URL_REQUEST = "./ajax/caricaMerce.php";
caricaMerce.ASYNC_TYPE = true;

caricaMerce.STUFF_TO_LOAD = 3;
caricaMerce.CURRENT_PAGE_INDEX = 1;

caricaMerce.ESCHE = 0;
caricaMerce.DI_TENDENZA = 1;
caricaMerce.CANNE = 2;
caricaMerce.MULINELLI = 3;

caricaMerce.SUCCESS_RESPONSE = "0";
caricaMerce.NO_MORE_DATA = "-1";

caricaMerce.init = 
	function() {
		caricaMerce.PAGE_INDEX = 1;
	}

caricaMerce.loadData =
	function(searchType){
		var queryString = "?searchType=" + searchType + "&movieToLoad=" + caricaMerce.STUFF_TO_LOAD 
							+ "&offset=" + (caricaMerce.CURRENT_PAGE_INDEX-1)*caricaMerce.STUFF_TO_LOAD;
		var url = caricaMerce.URL_REQUEST + queryString;
		var responseFunction = caricaMerce.onAjaxResponse;
	
		AjaxManager.performAjaxRequest(caricaMerce.DEFAUL_METHOD, 
										url, caricaMerce.ASYNC_TYPE, 
										null, responseFunction);
	}

caricaMerce.next =
	function(searchType){
		caricaMerce.CURRENT_PAGE_INDEX++;
		caricaMerce.loadData(searchType);
	}
	
caricaMerce.previous = 
	function(searchType){
		caricaMerce.CURRENT_PAGE_INDEX--;
		if (caricaMerce.CURRENT_PAGE_INDEX < 1)
			caricaMerce.CURRENT_PAGE_INDEX = 1;
		
		caricaMerce.loadData(searchType);
	}

caricaMerce.search =
	function(pattern){
		// To implement
	}
	
caricaMerce.onAjaxResponse = 
	function(response){
		if (response.responseCode === caricaMerce.NO_MORE_DATA){		
				Finestra.setEmptyDashboard();
				Finestra.updateNavigationPage(caricaMerce.CURRENT_PAGE_INDEX,	true);
				return;
		}
		
		if (response.responseCode === caricaMerce.SUCCESS_RESPONSE)
			Finestra.refreshData(response.data);
		
		var noMoreDataExist = (response.data === null || response.data.length < caricaMerce.MOVIE_TO_LOAD);
		Finestra.updateNavigationPage(caricaMerce.CURRENT_PAGE_INDEX,	noMoreDataExist);
		
	}
