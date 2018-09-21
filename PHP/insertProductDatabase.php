<?php

$servername= "localhost";
$username= "root";
$password= "";
$dbname = "myDBPDO";



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	/*$sql = 
    "INSERT INTO productTable (id, title, price, description, color, quantity)
    VALUES ('70501','NERD Sport', 55.00, 'When these bad boys first arrived from the
	Nerd Factory we finally realized that you could become the best there ever was just by
    opening up a box. You will be seeing life differently once you slip these on. If you didn\'t really like 
    the way things looked before, you might like them more. Or you might not. No promises.',
	'Grey/Blue Lens','90')";
	
	*/
	$sql = "INSERT INTO pictureTable (id, path)
	VALUES ('70501','nerdSportGrey.png')";
	
	//$sql = "INSERT INTO pictureTable (id, path)
	//VALUES ('70700','originalNerd.png')";
	
	
	/*$sql = "INSERT INTO pictureTable (id, path)
	VALUES ('70401','baseballNerdGreen.png')";
			*/
	
	$query = $conn->prepare($sql);
	$query->execute();
	
	
	
	 

	
    echo "Record added successfully";
	}
	catch(PDOException $e)
	{
	echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;
	
?>