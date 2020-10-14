<?php
	require_once '../models/db_connect.php';
    
    $fullname="";
	$err_fullname="";
	$username="";
	$err_username="";
	$number="";
	$err_number="";
	$address="";
	$err_address="";
	$password="";
	$err_password="";
	$cpassword="";
	$err_cpassword="";
	$success="";
	$hasError=false;

	if(isset($_POST["edit_user"])){
		if(empty($_POST["fullname"])){
			$err_fullname = "Name Required";
			$hasError = true;
		}else{
			$fullname=$_POST["fullname"];
		}
		if(empty($_POST["username"])){
			$err_username = "Username Required";
			$hasError = true;
		}else{
			$username=$_POST["username"];
		}
		if(empty($_POST["number"])){
			$err_number = "Number Required";
			$hasError = true;
		}else{
			$number=$_POST["number"];
		}
		if(empty($_POST["address"])){
			$err_address = "Address Required";
			$hasError = true;
		}else{
			$address=$_POST["address"];
		}
		if(!$hasError){
			editUser($fullname, $username, $number, $address);
		}
		else{
			header("Location: allusers.php");
		}
	}

	if(isset($_POST["register"])){
		if(empty($_POST["fullname"])){
			$err_fullname = "Name Required";
			$hasError = true;
		}else{
			$fullname=$_POST["fullname"];
		}
		if(empty($_POST["username"])){
			$err_username = "Username Required";
			$hasError = true;
		}else{
			$username=$_POST["username"];
		}
		if(empty($_POST["number"])){
			$err_number = "Number Required";
			$hasError = true;
		}else{
			$number=$_POST["number"];
		}
		if(empty($_POST["address"])){
			$err_address = "Address Required";
			$hasError = true;
		}else{
			$address=$_POST["address"];
		}
		if(empty($_POST["password"])){
			$err_password = "Password Required";
			$hasError = true;
		}else{
			$password=$_POST["password"];
		}
		if(empty($_POST["cpassword"])){
			$err_cpassword = "Re Enter Password Required";
			$hasError = true;
		}else{
			$cpassword=$_POST["cpassword"];
		}
		if ($_POST["cpassword"] <> $password){
			$err_cpassword = "Password Not Matched";
			$hasError = true;
		}
		//Wrtie other validations here
		if(!$hasError){
			$password = md5($password);
			$cpassword = md5($password);
			insertUser($fullname, $username, $number,$address, $password, $cpassword);
			insertImage($username, $_POST['image']);
		}
	}


	function insertUser($fullname, $username, $number,$address, $password, $cpassword){
		$query = "INSERT INTO register VALUES ('$fullname', '$username', '$number', '$address', '$password', '$cpassword')";
		execute($query);
		header("Location: allusers.php");
	}
	
	function getUsers(){
		$query = "SELECT * FROM register";
		$users = getAssocArray($query);
		return $users;
	}

	function editUser($fullname, $username, $number, $address){
		$query="UPDATE register SET fullname='$fullname', number='$number', address='$address'  WHERE username='$username'";
		execute($query);
		header("Location: allusers.php");
	}

	function checkUser($username){
		$query = "SELECT username FROM register WHERE username='$username'";
		$user = getAssocArray($query);
		return $user;
	}

	function insertImage($username, $image){
		$query = "INSERT INTO images VALUES ('$username', '$image')";
		execute($query);
	}

	function getUser($username){
		$query ="SELECT * FROM register where username='$username'";
		$user = getAssocArray($query);
		return $user[0];
	}

?>