 <?php
 include("connectScr.php");




function getproductTable($getID){
	

try {
		
	

  if(!isset($conn)){
    $ConnectScr = new ConnectScr();
	$conn = $ConnectScr->dbconn();
  }
    
 
   
    $sql = "SELECT id, title, price, description, color, quantity, short FROM productTable WHERE id = $getID";
  
	
    $query = $conn->prepare($sql);
	
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
	
	$id = $result['id'];
	$title = $result['title'];
	$price = $result['price'];
	$description = $result['description'];
	$color = $result['color'];
	$quantity =$result['quantity'];
	
  


}

	catch(PDOException $e)
	{
	echo $varname. "<br>" . $e->getMessage();
	}

	$conn = null;
	
	return $result;
	
}
	
?>

