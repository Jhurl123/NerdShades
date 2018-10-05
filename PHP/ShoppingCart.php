<?php
 include("connectScr.php");
 
 
 
 

class ShoppingCart
{
	
	
	public function callConn()
	{
	
	if(!isset($conn)){
	$ConnectScr = new ConnectScr();
    $conn = $ConnectScr->dbConn();
	}
	return $conn;
	
	}
	
    function getAllProduct()
	{
	    $conn= $this->callConn();
		$query = "SELECT * FROM productTable";
		$query = $conn->prepare($query);
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_ASSOC);
	
	
     }
	 
	 
	 function getMemberCartItem($Id)
	 { 
	     $conn= $this->callConn();
	     $query = "SELECT productTable.*, cartTable.id as cartId, cartTable.quantity FROM productTable, cartTable WHERE 
            productTable.id = cartTable.productId AND cartTable.userId = ?";
        
		 $query2 = $conn->prepare($query);
		 $query2->bindParam(1, $Id, PDO::PARAM_INT);
         $query2->execute();
         $cartResult = $query2->fetchAll(PDO::FETCH_ASSOC);
		 
		 
		 return $cartResult;
	 }
	 
	 function getProductID($id)
	 {
		  $conn= $this->callConn();
		 $query = "SELECT * FROM productTable WHERE id =?";
		 
		 $query2 = $conn->prepare($query);
		 $query2->bindParam(1,$id,PDO::PARAM_INT);
         $query2->execute();
         $productResult = $query2->fetch(PDO::FETCH_ASSOC);
		
		 return $productResult;
		 
		 
	 }
	 
	 
	 function getCartItemByProduct($id, $Id)
	 {
		  $conn= $this->callConn();
		 $query = "SELECT * FROM cartTable WHERE productId = ? AND Id = ?";
		 
		  $query2 = $conn->prepare($query);
		  $query2->bindParam(1, $id, PDO::PARAM_INT);
		  $query2->bindParam(2, $Id, PDO::PARAM_INT);
		  $query2->execute();
		  $cartResult = $query2->fetchAll(PDO::FETCH_ASSOC);
		  		   
		
		  return $cartResult;
		 
	 }
	 
	 function addToCart($id, $quantity, $Id)
	 {
		 
		   $conn= $this->callConn();
		  $query = "INSERT INTO cartTable (productId,quantity,userId) VALUES (?, ?, ?)";
        
		  $query2 = $conn->prepare($query);
		  $query2->bindParam(1, $id, PDO::PARAM_INT);
		  $query2->bindParam(2, $quantity, PDO::PARAM_INT);
		  $query2->bindParam(3, $Id, PDO::PARAM_INT);
		  
		   $query2->execute();

		
	 }
	 
	 
	 function updateCartQuantity($quantity, $cartId)
    {
		 $conn= $this->callConn();
        $query = "UPDATE cartTable SET  quantity = ? WHERE id= ?";
		
		$query2 = $conn->prepare($query);
		$query2->bindParam(1, $quantity, PDO::PARAM_INT);
		$query2->bindParam(2, $cart_id, PDO::PARAM_INT);
	 
	    $query2->execute();
	}
	
	 
	 
	   function deleteCartItem($cartId)
       {
		   
	     $conn= $this->callConn();
        $query = "DELETE FROM cartTable WHERE id = ?";
        
		$query2 = $conn->prepare($query);
	    $query2->bindParam(1, $cartId, PDO::PARAM_INT);
		
	    $query2->execute();
		
	   }
	   
	   function emptyCart($Id)
    {
		 $conn= $this->callConn();
        $query = "DELETE FROM cartTable WHERE Id = ?";
	 
	    $query2 = $conn->prepare($query);
	    $query2->bindParam(1, $Id, PDO::PARAM_INT);
	 
	 
	 
	    $query2->execute();
	  
	}
	
}

?>
	 
	 
	 
	 
	 
	 
	 