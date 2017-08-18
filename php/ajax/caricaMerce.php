<?php
	session_start();
	
	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "bassShopManagerDb.php";
	require_once DIR_AJAX_UTIL . "AjaxResponse.php";
	
	$response = new AjaxResponse();
	
	if (!isset($_GET['searchType'])){
		echo json_encode($response);
		return;
	}		
	
	$searchType = $_GET['searchType'];
	//$movieToLoad = $_GET['movieToLoad'];
	//$offset = $_GET['offset'];
	echo "ciao";
		
	switch ($searchType){
		case 0:
			$result = getEsche();
			break;
		case 1:
			$result = getDiTendeza();
			break;
		case 2:
			$result = getCanne();
			break;
		case 3:
			$result = getMulinelli();
			break;
		default:
			$result = null;
			break;
	}
	
	if (checkEmptyResult($result)){
		$response = setEmptyResponse();
		echo json_encode($response);
		return;
	}
	
	$message = "OK";	
	$response = setResponse($result, $message);
	echo json_encode($response);
	return;
	
	
	
	
	function checkEmptyResult($result){
		if ($result === null || !$result)
			return true;
			
		return ($result->num_rows <= 0);
	}
	
	function setEmptyResponse(){
		$message = "Non vi sono oggetti da caricare";
		return new AjaxResponse("-1", $message);
	}
	/*
	function setResponse($result, $message){
		$response = new AjaxResponse("0", $message);
			
		$index = 0;
		while ($row = $result->fetch_assoc()){
			// Set UserStat class
			$userStat = new UserStat();
			
			$userMovieResult = getUserMovieStat($_SESSION['userId'], $row['movieId']);
			if ($userMovieRow = $userMovieResult->fetch_assoc()){
				$userStat->watched = $userMovieRow['isWatched'];
				$userStat->toWatch = $userMovieRow['toWatch'];
				$userStat->liked = ($userMovieRow['isLiked'] === null)? 0 : (int)$userMovieRow['isLiked'];
				$userStat->disliked = ($userMovieRow['isLiked'] === null)? 0 : (int)!$userMovieRow['isLiked'];		
			}
			
			$likedCountResult = getMovieLikes($row['movieId']);
			$likedCountRow = $likedCountResult->fetch_assoc();
			$userStat->likedCount = $likedCountRow['num'];
			$dislikedCountResult = getMovieDislikes($row['movieId']);
			$dislikedCountRow = $dislikedCountResult->fetch_assoc();
			$userStat->dislikedCount = $dislikedCountRow['num'];
		
			// Set Movie class
			$movie = new Movie();
			$movie->movieId = $row['movieId'];
			$movie->posterUrl = $row['poster'];
			$movie->title = $row['title'];
			$movie->director = $row['director'];

			// Set MovieUserStat class		
			$movieUserStat = new MovieUserStat($movie, $userStat);
		
			$response->data[$index] = $movieUserStat;
			$index++;
		}
		
		return $response;
	}*/

?>
