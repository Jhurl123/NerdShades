<?php

include("connectScr.php");

 $ConnectScr = new ConnectScr();
  
    $conn = $ConnectScr->dbConn();
 
 
$username = "";
$firstName ="";
$lastName = "";
$email = "";
$errors = array();

if(session_status() == PHP_SESSION_NONE){
session_start();
}
try {
 
 if(isset($_POST['reg_user'])){
	 
	 $username = $_POST['username'];
	 $firstName = $_POST['firstName'];
	 $lastName = $_POST['lastName'];
	 $email = $_POST['email'];
	 $password_1 = $_POST['password_1'];
	 $password_2 = $_POST['password_2'];
	 
 
 
 if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($firstName)){array_push($errors, "First Name is required");}
  if (empty($lastName)){array_push($errors, "Last Name is required");}
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
 
$userCheckQuery = "SELECT * FROM userTable WHERE username='$username' OR email='$email' LIMIT 1";
$query = $conn->prepare($userCheckQuery);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

    if($user) {
		if($user['username'] === $username) {
			
			
			array_push($errors, "Username already exists");
		}
		
		if($user['email'] === $email) {
			array_push($errors, "Email already exists");
		}
	}
	
	if(count($errors) == 0){
		
		$passwordHash = password_hash($password_1, PASSWORD_DEFAULT);
	
	
	 $enter = 'INSERT INTO usertable (userName, firstName, lastName, email, password) VALUES (:username, :first, :last, :email, :pass)';
	 $enterQuery = $conn->prepare($enter);
	 
	 $enterQuery->execute(array(':username' => $username, ':first' => $firstName, ':last' => $lastName, ':email' => $email, ':pass' => $passwordHash));
	
	$_SESSION['username'] = $username;
	$_SESSION['firstName'] = $firstName;
	
	$_SESSION['success'] = "You are now logged in";
	
	header('location: ../../PHP/phpTest.php');
	
	
	
	}
	
	
 }
 
 //Sign in============================
if(isset($_POST['login_user'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username)) {
		array_push($errors, "Username is required");
	}
	
	if(empty($password)) {
		array_push($errors, "Password is required");
	}
	
	
	if(count($errors) == 0) {
		
		
		$query = "SELECT  id, firstName, password FROM userTable Where username = 
		'$username'";
		$enterQuery = $conn->prepare($query);
		
		$enterQuery->execute();
		$sign = $enterQuery->fetch(PDO::FETCH_ASSOC);
		
		
		if(password_verify($password, $sign['password'])) {
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $sign['id'];
			$_SESSION['firstName'] = $sign['firstName'];
			$_SESSION['success'] = "You are now logged in";
			header('location: ../../PHP/phpTest.php');
		} else {
			 array_push($errors, "Wrong username/password combination");
		}
		
	}
	
}
 
	
}
catch(PDOException $e)
	{
	echo "<br>" . $e->getMessage();
	}

	$conn = null;
	