<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"type ="text/css" href="../../PHP/glassStyle.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<title> Register to join Nerd Shades!</title>

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
<div class ="header">
  <h2>Register</h2>
  <p>We won't email you our junk</p>
</div>

<form method ="post" action="register.php">
 <?php include('errors.php'); ?>
 <div class="input-group">
  <label>Username</label>
  
  <input type="text" name="username" value="<?php echo $username; ?>">
  </div>
  
  <div class="input-group">
  <label>Password</label>
  
  <input type="password" name="password_1">
  </div>
  
  
  <div class="input-group">
  <label>Confirm Password</label>
  
  <input type="password" name="password_2">
  </div>
  
 <div class="input-group">
  <label>First Name</label>
  
  <input type="text" name="firstName" value="<?php echo $firstName; ?>">
  </div>
  
  <div class="input-group">
  <label>Last Name</label>
  
  <input type="text" name="lastName" value="<?php echo $lastName; ?>">
  </div>
  
  <div class="input-group">
  <label>Email</label>
  
  <input type="text" name="email" value="<?php echo $email; ?>">
  </div>
  
  <div class="input-group">
 <button type="submit" class="btn" name="reg_user">Register</button>
  </div>
 
  	<p>
  		Already a member? <a href="signIn.php">Sign in</a>
  	</p>
  </form>
  
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
</body>

</html>
