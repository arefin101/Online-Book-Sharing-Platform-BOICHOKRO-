<?php
	
	require_once '../controllers/UserController.php';
	$username = $_REQUEST["key"];

	$user = checkUser($username);

	if($user){
		echo "true";
	}else{
		echo "false";
	}

?>