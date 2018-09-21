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
?>



<!DOCTYPE html>
<html>
<head>

<title>Nerd Shades Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"type ="text/css" href="glassStyle.css">



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
	  <li><a href="http://localhost/PHP/registration/register.php">Register</a></li>
	  </ul>
	<?phpendif?>
	
	
	<?php elseif(isset($_SESSION['username'])) : ?>
	    <a href ="javascript:void(0)" 
	    class="dropbtn"><?php   echo "Hello " . $_SESSION['firstName']; ?></a>
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
<div id="content">
<div class = "row">


<div class="col-1"></div>
<div id="mainImage" class ="col-10">


<div class="mySlides fade">
	 <img src="beachSlide.jpg" style="width:100%">
   
 </div>


 <div class="mySlides fade">
    <img src="FacebookCover.jpg" style="width:100%">
    
 </div>

  <div class="mySlides fade">
    <img src="snowSlide.jpg" style="width:100%">
 
 </div>
 
  
  
  
 <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

</div>
</div>
<div id="footer">
<p> This yo favorite footer</p>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="FunctionsHome.js"></script>
</body>

</html>