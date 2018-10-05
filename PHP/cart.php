<?php 
  session_start(); 

  
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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

<div class= "Navbar">

<div id ="titleText" class="NavbarLink NavbarLink-brand">
Nerd Shades
</div>

<div class ="NavbarLink NavbarLink-toggle">
 <i class="fas fa-bars"></i>
</div>


<nav class="NavbarItems">
   <div class="NavbarLink">
    <a href="../PHP/phpTest.php">Home</a>
   </div>

   <div class="NavbarLink">
	 <a href="../PHP/products.php">Products</a>
   </div>
   
    <div class="NavbarLink">
     <a href="../PHP/About.php">About Us</a>
    </div>
	
	
	<?php if(!isset($_SESSION['username'])) : ?>
	<li class="dropDown">
	<div class = "NavbarLink">
	 <a href ="../PHP/registration/signIn.php"
	    class="dropbtn">Sign In</a>
	</div>
	
	
	 <ul class="dropDown-content">
	  <li><a href="http://localhost/PHP/registration/register.php">Register</a></li>
	  </ul>
	  </li>
	  
	<?phpendif?>
	
	
	<?php elseif(isset($_SESSION['username'])) : ?>
	<li class="dropDown">
	  <div class = "NavbarLink">
	    <a href ="javascript:void(0)" 
	       class="dropbtn"><?php   echo "Hello " . $_SESSION['firstName'] . "!"; ?></a>
	 </div>
	 	 <ul class="dropDown-content">
	  <li><a href="http://localhost/PHP/cart.php">Cart</a></li>
	  <li><a href="#">Contact Us</a></li>
	  <li><a href="phpTest.php?logout='1'">Log Out</a></li>
	  </ul>
	  </li>
	  <?php endif ?>
	  


</nav>

<nav class="NavbarItems NavbarItems-right">

<div class="NavbarLink">

</div>
</nav>
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

			
	


</div>
<div id="footer">
<p class ="footParagraph"><a href="phpTest.php">Home</a></p>
<br>
<p class ="footParagraph"><a href="products.php">Products</a></p>
<br>
<p class ="footParagraph"><a href="About.php">About</a></p>
<br>
<p class ="footParagraph"><a href="Contact.php">Contact Us</a></p>


<p class="disclaimer"> &#169 Nerd Shades - Nerd Shades does not own or sell Costa brand merchandise,
 product images are merely used as displays for website for portfolio </p>

</div>
</div>
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="FunctionsProducts.js"></script>
<script type="text/javascript" src="FunctionsHome.js"></script>
</body>

</html>