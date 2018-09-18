<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"type ="text/css" href="../../PHP/glassStyle.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<title>Sign in - Nerd Shades</title>

</head>
<body>
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

<div class ="header">
<h2>Sign in!</h2>
</div>


<form method = "post" action="signIn.php">
 <?php include('errors.php'); ?>
 
 
<div class="input-group">
 <label>Username</label>
 <input type="text" name="username">
</div>
 
<div class ="input-group">
 <label>Password</label>
 <input type="password" name ="password">
</div>

<div class="input-group">
   <button type="submit" class="btn" name="login_user">Sign in</button>
</div>

<p>Not a member yet? <a href="register.php">Sign up</a>
</p>

</form>





<div id="footer">
<p> This yo favorite footer</p>
</div>
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="FunctionsProducts.js"></script>
</body>

</html>