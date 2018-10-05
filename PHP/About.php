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