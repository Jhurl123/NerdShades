<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="myDBPDO";




try {
	
	$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	
}

/*
try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE myDBPDO";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
 
 
 
 // Add column============================================
 /*
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    $sql = "ALTER TABLE productTable
	ADD short VARCHAR(50)";
	
	$conn->exec($sql);
	echo "added column successfully";
 }
 catch(PDOException $e){
	 echo $sql . "<br>" . $e->getMessage();
 }
 
 $conn = null;
 
 
 
 ?>
	*/