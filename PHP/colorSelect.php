<?php

include("ConnectScr.php");


	

try {
		
	

   
    $ConnectScr = new ConnectScr();
	$conn = $ConnectScr->dbconn();

if(isset($_POST['color'])){
	
	$color=$_POST['color'];

	
	
	$result_explode = explode(',', $color);


	
	$newColor = $result_explode[0];
	$colorId = $result_explode[1];
	
	
	$sql="SELECT id FROM productTable WHERE color ='$newColor'";
	$query = $conn->prepare($sql);
	$query->execute();
    $result1 = $query->fetch(PDO::FETCH_ASSOC);
    $newId = $result1['id'];
	

	
	
	$sql2="SELECT path FROM pictureTable WHERE id = $newId";
	$query2 = $conn->prepare($sql2);
	$query2->execute();
	$path= $query2->fetch(PDO::FETCH_ASSOC);
	$path2 = $path['path'];
	$pre ="http://localhost/PHP/images/";
	$data = $pre.$path2;

	
	
	
	echo json_encode(
	array("path" => $data,
	      "colorId" => $colorId));
}
}
	
	catch(PDOException $e)
	{
		
	   echo "<br>" . $e->getMessage();
	}

	$conn = null;

		
	?>
	