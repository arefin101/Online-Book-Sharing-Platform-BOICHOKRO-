<?php

	require_once '../models/db_connect.php';


	if(isset($_POST['search'])){
		$bookname = $_POST['bookname'];
		$result=downloadBooks($bookname);

		$id = $result['id'];

		if($id){
			header("Location: download_book.php?id=".$result['id']."& username=");
		}else{
			header("Location: not_found.php");
		}
	}

	if(isset($_POST['search_by_user'])){
		$bookname = $_POST['bookname'];
		$result=downloadBooks($bookname);
		$username=$_POST['username'];
		$id = $result['id'];

		if($id){
			header("Location: download_by_user.php?id=".$result['id']."& username=".$username."");
		}else{
			header("Location: not_found_user.php?username=".$username."");
		}
	}


	function SearchBook($key){
		$query = "SELECT * FROM book WHERE bookname LIKE '%$key%'";
		$books = getAssocArray($query);
		return $books;
	}

	function downloadBooks($bookname){
		$query="SELECT * FROM book WHERE bookname='$bookname'";
		$books = getAssocArray($query);
		return $books[0];
	}

?>