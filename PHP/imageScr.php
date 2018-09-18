<?php





function getImageTable($getID){
	
	

try {
		 if(!isset($conn)){
    $ConnectScr = new ConnectScr();
	$conn = $ConnectScr->dbconn();
  }
	

 
  
    
	$sql = "SELECT path FROM pictureTable WHERE id = $getID";
	
    $query = $conn->prepare($sql);
	
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
	//$sql = 
  // INSERT INTO productTable (id, title, description, color, quantity)
	//VALUES ('70300','NERD Wharf','With a lightweight frame and our signature glass lenses, 
	//the Wharf allows you to see better in any water conditions and help you keep the big one on the line until 
	//you got er in the boat. Fish smell not included.','Black/Blue Lens','70')";
	
	
}

	catch(PDOException $e)
	{
	echo $varname. "<br>" . $e->getMessage();
	}

	$conn = null;
	
	return $result;
	
}
	
?>