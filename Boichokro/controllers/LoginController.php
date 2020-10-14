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
		if($_POST["cpassword"] <> $password){
			$err_cpassword = "Password Not Matched";
			$hasError = true;
		}
		
		/*$target_dir = "../image/user/";
		$target_file = "../image/user/". basename($_FILES["image"]["name"]);
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);*/
		
		if(!$hasError){
			$password = md5($password);
			$cpassword = md5($password);
			insertUser($fullname, $username, $number,$address, $password, $cpassword);
			insertImage($username, $_POST['image']);
			$success="Registration Successful";
		}
	}

	if(isset($_POST["edit"])){
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
			editProfile($fullname, $username, $number, $address, $password, $cpassword);
		}else{
			header("Location: my_profile.php?username='$username'");
		}
	}


	if(isset($_POST["login"])){
		
		session_start();

		if(empty($_POST["username"])){
			$err_username= "Username required";
			$hasError = true;
		}else{
			$username=$_POST["username"];
			$_SESSION["username"]=$username;

		}
		if(empty($_POST["password"])){
			$err_password="Password Required";
			$hasError=true;
		}else{
			$password=$_POST["password"];
		}
		if(!$hasError){
			$password = md5($password);
			if(authenticate($_SESSION["username"],$password)){
				header("Location: my_profile.php?username='$username'");
			}

			if($username=='admin' || $username=='ADMIN' || $username=='Admin' && $password == 'admin' || $password == 'ADMIN' || $password == 'Admin'){
				setcookie("name", $username, time() + 3600);
				header("Location: admin_profile.php?username='admin'");
			}
		}
	}

	if(isset($_POST['change_photo'])){
		$link = $_POST['username'];
		header("Location: change_photo.php?username='$link'");
	}


	function insertUser($fullname, $username, $number,$address, $password, $cpassword){
		$query = "INSERT INTO register VALUES ('$fullname', '$username', '$number', '$address', '$password', '$cpassword')";
		execute($query);
	}

	function authenticate($username,$password){
		$query = "SELECT username from register where username='$username' and password='$password'";
		$result = getAssocArray($query);
		if($result){
			$result = $result[0];
		}
		return $result;
	}

	function getUser($username){
		$query ="SELECT * FROM register where username=$username";
		$user = getAssocArray($query);
		return $user[0];
	}

	function editProfile($fullname, $username, $number, $address, $password, $cpassword){
		$query="UPDATE register SET fullname='$fullname', number='$number', address='$address', password='$password', cpassword='$cpassword'  WHERE username='$username'";
		execute($query);
		header("Location: my_profile.php?username='$username'");
	}

	function insertImage($username, $image){
		$query = "INSERT INTO images VALUES ('$username', '$image')";
		execute($query);
	}

?>