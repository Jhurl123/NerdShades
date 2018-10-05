<?php

  session_start(); 

  include("connectScr.php");
  
  
  
 /* if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../PHP/registration/signIn.php');
  }*/
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../PHP/phpTest.php");
  }




try {


    $ConnectScr = new ConnectScr(); 
    $conn = $ConnectScr->dbConn();
    $varname = $_GET['varname'];
	
 
    $sql = "SELECT id, title, price, description, color, quantity FROM productTable WHERE id = '$varname'";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
	
	
	
    $sql2="SELECT path FROM pictureTable WHERE id = '$varname'";
	$query2 = $conn->prepare($sql2);
	$query2->execute();
	$path= $query2->fetch(PDO::FETCH_ASSOC);
	
	
	$default = $path['path'];
	$pre ="http://localhost/PHP/images/";
	$data = $pre.$default;
	
	
	
	$id = $result['id'];
	$title = $result['title'];
	$price = $result['price'];
	$description = $result['description'];
	$color = $result['color'];
	$quantity = $result['quantity'];
	
	$sql3 = "SELECT id, color FROM productTable WHERE title = '$title'";
	$query3 = $conn->prepare($sql3);
	$query3->execute();
	$dropColor = $query3->fetchAll(PDO::FETCH_ASSOC);

	//var_dump($dropColor);
	
}

	catch(PDOException $e)
	{
	echo $varname. "<br>" . $e->getMessage();
	}

	$conn = null;
	
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
<div id="wrapper">
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
<div id="content">


<div class="mainContainer">

<div class ="productImg">
<img class="prodSlides" id="prodSlides" src="<?php echo $data ?>"></img>


</div>


<div class="rightDiv">
<!--changed from title to trial id-->
<h1 id="productHead"><?php echo $title; ?></h1>

<p class="prodDescription"><?php echo $description; ?></p>
<span id = "price"><?php echo "$" . bcdiv($price,1,0);?></span>


<div class="selectDiv">
<p>Color:


<form method="POST"
action="colorSelect.php">


<select class="selectBox" id="imgControl" name="image">
<?php
$length = count($dropColor);
for($i=0; $i<$length; $i++){
	?>
	<option value = "<?php echo $dropColor[$i]['color'];?>,<?php echo $dropColor[$i]['id'];?>">
	<?php echo $dropColor[$i]['color'];?></option>
	
	<?php
	
}

?>

 </select>
 
</form>

</p>
</div>




<!--
$result_explode = explode(',', $color);
	var_dump($result_explode[0]);
	var_dump($result_explode[1]);

-->

<?php if(isset($_SESSION['username'])) : ?>
<form method="POST" id="prodForm" 
 action="cart.php?action=add&id=<?php echo $id; ?>">

 
<div id="addButt">
  <input type="text" name="quantity" value="1" size="2" />
  <input name="add" type="submit" value="Add to cart"
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