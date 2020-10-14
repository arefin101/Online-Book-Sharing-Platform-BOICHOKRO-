<?php
	
	require_once '../controllers/FileController.php';
	
	$id = $_REQUEST["username"];

	$id = checkid($id);

	if($id){
		echo "true";
	}else{
		echo "false";
	}

?>