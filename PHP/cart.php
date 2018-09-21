<?php 
  session_start(); 

 /* if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../PHP/registration/signIn.php');
  }*/
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../PHP/phpTest.php");
  }
  
include("ShoppingCart.php");


 

//Go back to this if memberid is a problem

if(isset($_SESSION['id']))
{
$Id = $_SESSION['id'];

}
$ShoppingCart = new ShoppingCart();


if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
	if(!empty($_POST["quantity"])) {
		
		$productResult = $ShoppingCart->getProductId($_GET["id"]);
		
		$cartResult = $ShoppingCart->getCartItemByProduct($productResult['id'],$Id);
		
		//Update cart item quantity in db
		if(!empty($cartResult)) {
			
			$newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
			$ShoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
			
		
		}
		else{
			$ShoppingCart->addToCart($productResult["id"], $_POST["quantity"], $Id);
			
		}
		
		
	}
	break;
	
	//remove cart item
	case "remove":
	    $ShoppingCart->deleteCartItem($_GET["id"]);
		break;
	
	//Empty whole cart
	case "empty":
	    
		$ShoppingCart->emptyCart($Id);
		break;
		
	   
	   
	
	}
}


  

  
  
  
  
  
  
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"type ="text/css" href="glassStyle.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
</head>



<body>
<div id = "wrapper">
<div id="topMess">
<p> Disclaimer: This is not yet a fully functioning or finished site,
 Merely a test before bringing to market</p>
 </div>
<header>

<div class="headDiv">
<h1 class="headLogo"> Nerd Shades</h1>

</div>
<span class = "borderLine">

</span>

<div class= "navDiv">
<ul id="nav">
    <li> <a href="../PHP/phpTest.php">Home</a></li>
	<li> <a href="../PHP/products.php">Products</a></li>
    <li> <a href="../PHP/About.php">About Us</a></li>		
    <li class="dropDown"> 
	
	
	<?php if(!isset($_SESSION['username'])) : ?>
	<a href ="../PHP/registration/signIn.php"
	class="dropbtn">Sign In</a>
	
	 <ul class="dropDown-content">
	  <li><a href="../PHP/registration/register.php">Register</a></li>
	  </ul>
	<?phpendif?>
	
	
	<?php elseif(isset($_SESSION['username'])) : ?>
	    <a href ="javascript:void(0)" 
	    class="dropbtn"><?php   echo "Hello " . $_SESSION['firstName'] . "!"; ?></a>
	 	 <ul class="dropDown-content">
	  <li><a href="http://localhost/PHP/cart.php">Cart</a></li>
	  <li><a href="#">My Account</a></li>
	  <li><a href="#">Contact Us</a></li>
	  <li><a href="phpTest.php?logout='1'">Log Out</a></li>
	  </ul>
	  <?php endif ?>
	  </li>
</ul>
</div>
</header>



<div class="cartPage" id = "content">
<div id="shopping-cart">
   <div class="txt-heading">
      <div class="txt-heading-label">Shopping Cart</div>
	  <a id="btnEmpty" href="cart.php?action=empty">
	  <img src="empty-cart.png" alt="Empty cart" title="Empty Cart"/></a>
	  </div>
	  
<?php
if(isset($Id)){
$cartItem = $ShoppingCart->getMemberCartItem($Id);
}

if(!empty($cartItem)) {
	$item_total = 0;
	?>

	<table cellpadding="10" cellspacing="1">
	   <tbody>
	     <tr>
		    <th style="text-align: left;"><strong>Name</strong></th>
                    <th style="text-align: left;"><strong>Color</strong></th>
                    <th style="text-align: right;"><strong>Quantity</strong></th>
                    <th style="text-align: right;"><strong>Price</strong></th>
                    <th style="text-align: center;"><strong>Action</strong></th>
                </tr>	
<?php
    foreach($cartItem as $item) {
		?>
		
		<tr>
		    <td
			    style="text-align:left; border-bottom:#F0F0F0 1px solid;"><strong>
				<?php echo $item['title']; ?></strong></td>
		
		    <td
			    style="text-align:left; border-bottom:#F0F0F0 1px solid;"><strong>
				<?php echo $item['color']; ?></strong></td>
				
		    <td
			    style="text-align:right; border-bottom:#F0F0F0 1px solid;"><strong>
				<?php echo $item['quantity']; ?></strong></td>
				
		    <td
			    style="text-align:right; border-bottom:#F0F0F0 1px solid;"><strong>
				<?php echo $item['price']; ?></strong></td>
		
		    <td
			    style="text-align: center; border-bottom: #F0F0F0 1px solid;"><a
				href="cart.php?action=remove&id=<?php echo $item["cartId"]; ?>"
				class="btnRemoveAction"><img class="deleteImg" src="icon-delete.png" alt="icon-delete" title="Remove Item"/></a></td>
		  </tr>
		 <?php
		 
		 $item_total += ($item['price'] * $item['quantity']);
	     } ?>
			
			
      <tr>
	      
		  <td colspan="3" align=right><strong>Total:</strong></td>
		  <td align=right><?php echo "$".$item_total; ?></td>
		  <td></td>
	  </tr>
	 </tbody>
   </table>
   <?php
    }
   ?>
   
</div>

<?php if(isset($_SESSION['username'])) : ?>
<form method="post" id="prodForm"
 action="">

 
<div id="addButt">
  <input
                    type="submit" value="Check out"
                    class="btnAddAction" />

</div>
</form>
<?phpendif?>
	
	
	<?php elseif(!isset($_SESSION['username'])) : ?>
<div id = "addButt">
  <input type="text" name="quantity" value="1" size="2" /><input
                    type="submit" value="Please Sign in"
                    class="btnAddAction" />

</div>
<?php endif?>
			
	


</div>
<div id="footer">
<p> This yo favorite footer</p>
</div>
</div>
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="FunctionsProducts.js"></script>
<script type="text/javascript" src="FunctionsHome.js"></script>
</body>

</html>