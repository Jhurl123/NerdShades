<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"type ="text/css" href="../../PHP/glassStyle.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
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
<div class= "navDiv">
<ul id="nav">
    <li> <a href="../phpTest.php">Home</a></li>
	<li> <a href="../products.php">Products</a></li>
    <li> <a href="../About.php">About Us</a></li>		
    <li class="dropDown"> 
	
	
	<?php if(!isset($_SESSION['username'])) : ?>
	<a href ="signIn.php"
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
<p> This yo favorite footer</p>
</div>
	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="FunctionsProducts.js"></script>
</body>

</html>
