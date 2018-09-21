<?php

$servername= "localhost";
$username= "root";
$password= "";
$dbname = "myDBPDO";



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	 $sql = 
"CREATE TABLE IF NOT EXISTS cartTable(
id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
productId int(6) NOT NULL,
quantity int(11) NOT NULL,
userId VARCHAR(50) NOT NULL,
created datetime NOT NULL,
modified timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

 $conn->exec($sql);
    echo "Table productTable created successfully";
	}
	catch(PDOException $e)
	{
	echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;
	
?>