<?php
	function toArray($mysqliResult) {
		$output = array();
		while($row = $mysqliResult->fetch_assoc())
			array_push($output, $row);
		return $output;
	}

	function checkQuery($statement) {
		if(!$statement) {
			throw new Exception("Preparazione query fallita");
		}
	}




?>