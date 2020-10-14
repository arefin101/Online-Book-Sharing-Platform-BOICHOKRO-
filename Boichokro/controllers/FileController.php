<?php
	require_once '../models/db_connect.php';

	$username = $_REQUEST['username'];

	if(isset($_POST["upload"])){
		$target_dir = "../image/user/";
		$target_file = "../image/user/". basename($_FILES["image"]["name"]);
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		EditImage($username, $target_file);
	}

	if(isset($_POST["change"])){
		$target_dir = "../image/user/";
		$target_file = "../image/user/". basename($_FILES["image"]["name"]);
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		EditImage1($username, $target_file);
	}

	$id="";
	$id_err="";
	$bookname="";
	$bookname_err="";
	$writter="";
	$writter_err="";
	$price="";
	$price_err="";
	$img_err="";
	$link_err="";
	$hasError=false;
	$success="";

	if(isset($_POST["add"])){

		if(empty($_POST['id'])){
			$id_err="You must enter id";
			$hasError=true;
		}else{
			$id=$_POST['id'];
		}
		if(empty($_POST['bookname'])){
			$bookname_err="Book Name Required";
			$hasError=true;
		}else{
			$bookname=$_POST['bookname'];
		}
		if(empty($_POST['writter'])){
			$writter_err="Writter Name Required";
			$hasError=true;
		}else{
			$writter=$_POST['writter'];
		}
		if(empty($_POST['price'])){
			$price_err="Price Required";
			$hasError=true;
		}else{
			$price=$_POST['price'];
		}
		
		$target_dir1 = "../image/Book_Image/";
		$target_dir2 = "../image/Book_Link/";
		$target_file1 = "../image/Book_Image/". basename($_FILES["img"]["name"]);
		$target_file2 = "../image/Book_Link/". basename($_FILES["link"]["name"]);
		
		$name1=basename($_FILES["img"]["name"]);
		$file_ext1 = explode(".", $name1);
		$file_ext_check1 = strtolower(end($file_ext1));
		$valid_file_ext1 = array('png', 'jpg', 'jpeg', 'gif');
		
		if(!in_array($file_ext_check1, $valid_file_ext1)){
			$img_err="You have to input png or jpg or jpeg file";
			$hasError=true;
		}

		$name2=basename($_FILES["link"]["name"]);
		$file_ext2 = explode(".", $name2);
		$file_ext_check2 = strtolower(end($file_ext2));
		$valid_file_ext2 = array('pdf');

		if(!in_array($file_ext_check2, $valid_file_ext2)){
			$link_err="You have to input pdf file";
			$hasError=true;
		}
		
		if(!$hasError){
			move_uploaded_file($_FILES["img"]["tmp_name"], $target_file1);
		    move_uploaded_file($_FILES["link"]["tmp_name"], $target_file2);
			insertBook($id, $bookname, $writter, $price, $target_file1, $target_file2);
		}else{
			header("Location: add.php? id=0 & id_err=$id_err & bookname_err=$bookname_err & writter_err=$writter_err & price_err=$price_err & img_err=$img_err & link_err=$link_err");
		}
	}

	if(isset($_POST["share"])){

		if(empty($_POST['id'])){
			$id_err="You must enter id";
			$hasError=true;
		}else{
			$id=$_POST['id'];
		}
		if(empty($_POST['bookname'])){
			$bookname_err="Book Name Required";
			$hasError=true;
		}else{
			$bookname=$_POST['bookname'];
		}
		if(empty($_POST['writter'])){
			$writter_err="Writter Name Required";
			$hasError=true;
		}else{
			$writter=$_POST['writter'];
		}
		if(empty($_POST['price'])){
			$price_err="Price Required";
			$hasError=true;
		}else{
			$price=$_POST['price'];
		}
		
		$target_dir1 = "../image/Book_Image/";
		$target_dir2 = "../image/Book_Link/";
		$target_file1 = "../image/Book_Image/". basename($_FILES["img"]["name"]);
		$target_file2 = "../image/Book_Link/". basename($_FILES["link"]["name"]);
		
		$name1=basename($_FILES["img"]["name"]);
		$file_ext1 = explode(".", $name1);
		$file_ext_check1 = strtolower(end($file_ext1));
		$valid_file_ext1 = array('png', 'jpg', 'jpeg', 'gif');
		
		if(!in_array($file_ext_check1, $valid_file_ext1)){
			$img_err="You have to input png or jpg or jpeg file";
			$hasError=true;
		}

		$name2=basename($_FILES["link"]["name"]);
		$file_ext2 = explode(".", $name2);
		$file_ext_check2 = strtolower(end($file_ext2));
		$valid_file_ext2 = array('pdf');

		if(!in_array($file_ext_check2, $valid_file_ext2)){
			$link_err="You have to input pdf file";
			$hasError=true;
		}
		
		if(!$hasError){
			move_uploaded_file($_FILES["img"]["tmp_name"], $target_file1);
		    move_uploaded_file($_FILES["link"]["tmp_name"], $target_file2);
			insertBook1($username, $id, $bookname, $writter, $price, $target_file1, $target_file2);
		}else{
			header("Location: share.php?username=$username & id=0 & id_err=$id_err & bookname_err=$bookname_err & writter_err=$writter_err & price_err=$price_err & img_err=$img_err & link_err=$link_err");
		}
	}

	if(isset($_POST["edit"])){

		$id=$_POST['id'];

		if(empty($_POST['bookname'])){
			$bookname_err="Book Name Required";
			$hasError=true;
		}else{
			$bookname=$_POST['bookname'];
		}
		if(empty($_POST['writter'])){
			$writter_err="Writter Name Required";
			$hasError=true;
		}else{
			$writter=$_POST['writter'];
		}
		if(empty($_POST['price'])){
			$price_err="Price Required";
			$hasError=true;
		}else{
			$price=$_POST['price'];
		}

		$thisBook=getBookImage($id);

		if(empty($_FILES['img']['name'])){
			$target_file1=$thisBook['book_image'];
			echo $target_file1;
			$img_err="";
		}else{
			$target_dir1 = "../image/Book_Image/";
			$target_file1 = "../image/Book_Image/". basename($_FILES["img"]["name"]);
			
			$name1=basename($_FILES["img"]["name"]);

			$file_ext1 = explode(".", $name1);

			$file_ext_check1 = strtolower(end($file_ext1));
			echo $file_ext_check1;
			$valid_file_ext1 = array('png', 'jpg', 'jpeg', 'gif');
			
			if(!in_array($file_ext_check1, $valid_file_ext1)){
				$img_err="You have to input png or jpg or jpeg or gif file";
				$hasError=true;
			}
		}
		
		if(!$hasError){
			$success="Edit Successful";
			move_uploaded_file($_FILES["img"]["tmp_name"], $target_file1);
			editBook($id, $bookname, $writter, $price, $target_file1);
			header("Location: edit_book.php? username= & id=$id & id_err=$id_err & bookname_err=$bookname_err & writter_err=$writter_err & price_err=$price_err & img_err=$img_err & success=$success");

		}else{
			header("Location: edit_book.php? username= & id=$id & id_err=$id_err & bookname_err=$bookname_err & writter_err=$writter_err & price_err=$price_err & img_err=$img_err & success=$success");
		}
	}

	if(isset($_POST['change_admin_photo'])){
		$link = $_POST['username'];
		header("Location: change_photo_admin.php?username='admin'");
	}


	function getImage($username){
		$query = "SELECT * FROM images WHERE username=$username";
		$result=getAssocArray($query);
		return $result[0];
	}

	function EditImage($username, $image){
		$query ="UPDATE  images SET image='$image' WHERE username=$username";
		execute($query);
		header("Location: change_photo.php?username=$username");
	}

	function EditImage1($username, $image){
		$query ="UPDATE  images SET image='$image' WHERE username=$username";
		execute($query);
		header("Location: change_photo_admin.php?username='admin'");
	}

	function insertBook($id, $bookname, $writter, $price, $book_image, $book_link){
		$query="INSERT INTO book VALUES ($id, '$bookname', '$writter', '$price', '$book_image', '$book_link')";
		execute($query);
		header("Location: add.php? id=$id & id_err= & bookname_err= & writter_err= & price_err= & img_err= & link_err=");
	}

	function insertBook1($username, $id, $bookname, $writter, $price, $book_image, $book_link){
		$query="INSERT INTO book VALUES ($id, '$bookname', '$writter', '$price', '$book_image', '$book_link')";
		execute($query);
		header("Location: share.php?username=$username & id=$id & id_err= & bookname_err= & writter_err= & price_err= & img_err= & link_err=");
	}

	function getBookImage($id){
		$query = "SELECT * FROM book WHERE id=$id";
		$result=getAssocArray($query);
		return $result[0];
	}

	function checkid($id){
		$query = "SELECT id FROM book WHERE id='$id'";
		$user = getAssocArray($query);
		return $user;
	}

	function getAllBook($id){
		$query = "SELECT * FROM book WHERE NOT id='$id'";
		$books = getAssocArray($query);
		return $books;
	}

	function downloadBook($id){
		$query = "SELECT * FROM book WHERE id='$id'";
		$user = getAssocArray($query);
		return $user[0];
	}

	function getBook($id){
		$query = "SELECT * FROM book WHERE id=$id";
		$result=getAssocArray($query);
		return $result[0];
	}

	function editBook($id, $bookname, $writter, $price, $target_file1){
		$query="UPDATE book SET bookname='$bookname', writter='$writter', price='$price', book_image='$target_file1' WHERE id='$id'";
		execute($query);
	}

?>