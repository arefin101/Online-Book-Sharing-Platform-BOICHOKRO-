

<?php

require_once '../models/db_connect.php';

$username=$_REQUEST['username'];

delete($username);

function delete($username){
		$query="DELETE FROM register WHERE username='$username'";
		execute($query);
		header("Location: allusers.php");
	}

?>