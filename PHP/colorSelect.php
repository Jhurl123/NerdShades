<?php

include("ConnectScr.php");


	

try {
		
	

  
    $ConnectScr = new ConnectScr();
	$conn = $ConnectScr->dbconn();

if(isset($_POST['color'])){
	
	$color=$_POST['color'];
	
	$sql="SELECT id FROM productTable WHERE color ='$color'";
	$query = $conn->prepare($sql);
	$query->execute();
    $result1 = $query->fetch(PDO::FETCH_ASSOC);
    $newId = $result1['id'];
	//echo $newId;

	$sql2="SELECT path FROM pictureTable WHERE id = $newId";
	$query2 = $conn->prepare($sql2);
	$query2->execute();
	$path= $query2->fetch(PDO::FETCH_ASSOC);
	$path2 = $path['path'];
	$pre ="http://localhost/PHP/images/";
	$data = $pre.$path2;

	
	
	
	echo $data;
}
}
	
	catch(PDOException $e)
	{
		
	   echo "<br>" . $e->getMessage();
	}

	$conn = null;

		
	?>
	