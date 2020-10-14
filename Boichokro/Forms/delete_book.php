<?php

require_once '../models/db_connect.php';

$id=$_REQUEST['id'];

deleteBook($id);

function deleteBook($id){
		$query="DELETE FROM book WHERE id='$id'";
		execute($query);
		header("Location: admin_profile.php?username='admin'");
	}

?>