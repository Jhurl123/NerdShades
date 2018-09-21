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


<h1 id="aboutHead">About Us:</h1>


<div class="imgRow">
<div class="imgColumn">

<img src = "images/aboutSample.jpg">
</div>
<div class="imgColumn">
<img src="images/aboutSample2.jpg">
</div>
</div>




<div id ="aboutDiv">
<p id="aboutStory">
Based out of Ocean City, Maryland, Nerd Shades recognizes the need for 
protection. Whether you are surfing waves at sunrise or squinting for that Instagram selfie
thats gonna make all the folks back home jealous, the sun is stabbing at your eyes with thousands
of tiny daggers.
<p id="aboutStory"> Defeat your evil nemesis with a pair of Nerd Flyers and look fly as hell or keep 
your peepers intact with a pair of Nerd Sports while you fly down that mountain at breakneck speeds.
Every pair of Nerd Shades comes with a 100% money back guarantee if you're unsatisfied
with perfection.</p>
 <p id="aboutStory"> 
 Nerd shades is all about form and function to keep you seeing 20/20 until 
 you don't need those baby blues anymore
Staying smart about your eye health and functional is our goal here so
buy a pair and get safe. </p>
</p>

<span class="line">
</span>
<p id ="aboutFrom">
   -The Crew at Nerd Shades</p>



</div>
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