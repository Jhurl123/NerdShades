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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<h1 class="productHead">Products</h1>

<div class = "grid-wrapper">
<div class = "grid-number">
<a href="productTemplate.php?varname=70300">
<div id="make-3D-space">

    <div class="product-card"id ="prod1">
	<?php $getID="70300";
	include('productScr.php');
	include('imageScr.php');
					 
	$path = "http://localhost/PHP/images/";
	$answer = getProductTable($getID);
	$pathx = getImageTable($getID);
    $file = $pathx['path'];
     
				?>
	
	<div id="product-front">
        	<div class="shadow"></div>
            <?php echo '<img class="prodImg" src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            <div class="stats">        	
                <div class="stats-container">
                    <span class="product_price"><?php echo "$" . bcdiv($answer['price'],1,0);?></span>
                    <span class="product_name">
					<?php echo $answer['title']; ?>
					</span>    
                    <p><?php echo $answer['short'];?></p>                                            
                                 
					<div class="product-options">
                   
                    <strong>COLORS</strong>
                    <div class="colors">
                        <div class="c-blue"><span></span></div>
                        <div class="c-red"><span></span></div>
                        <div class="c-white"><span></span></div>
                        <div class="c-green"><span></span></div>
                    </div>
                </div>                       
                </div>                         
            </div>
        </div>
		<p id="prodTitle"><?php echo $answer['title']; ?></p>		
		<p id="prodPrice"><?php echo "$" . bcdiv($answer['price'],1,0);?></p>
</div>

    </div>	
</a>
</div>



<div class="grid-number">
<a href="productTemplate.php?varname=70400">
<div id="make-3D-space">
    <div class="product-card" id ="prod2">
	
    <?php $getID="70400";
	     $path = "http://localhost/PHP/images/";
		 $answer = getProductTable($getID);
	     $pathx = getImageTable($getID);
         $file = $pathx['path'];
		?>
       <div id="product-front">
        	<div class="shadow"></div>
           <?php echo '<img class="prodImg" src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            <div class="stats">        	
                <div class="stats-container">
                    <span class="product_price"><?php echo "$" . bcdiv($answer['price'],1,0);?></span>
                    <span class="product_name">
					<?php echo $answer['title']; ?>
					</span>    
                    <p><?php echo $answer['short'];?></p>                                            
                                 
					<div class="product-options">
                   
                    <strong>COLORS</strong>
                    <div class="colors">
                        <div class="c-blue"><span></span></div>
                        <div class="c-red"><span></span></div>
                        <div class="c-white"><span></span></div>
                        <div class="c-green"><span></span></div>
                    </div>
                </div>                       
                </div>                         
            </div>
        </div>
		<p id="prodTitle"><?php echo $answer['title']; ?></p>		
		<p id="prodPrice"><?php echo "$" . bcdiv($answer['price'],1,0);?></p>
</div>		
    </div>	
</a>
</div>
	


<div class="grid-number">
<a href="productTemplate.php?varname=70500">
<div id="make-3D-space">
    <div class="product-card" id ="prod3">
	
	<?php $getID="70500";
		 $answer = getProductTable($getID);
	     $pathx = getImageTable($getID);
         $file = $pathx['path'];
		?>
		  <div id="product-front">
        	<div class="shadow"></div>
           <?php echo '<img class="prodImg" src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
               <div class="stats">        	
                <div class="stats-container">
                    <span class="product_price"><?php echo "$" . bcdiv($answer['price'],1,0);?></span>
                    <span class="product_name">
					<?php echo $answer['title']; ?>
					</span>    
                    <p><?php echo $answer['short'];?></p>                                            
                                 
					<div class="product-options">
                   
                    <strong>COLORS</strong>
                    <div class="colors">
                        <div class="c-blue"><span></span></div>
                        <div class="c-red"><span></span></div>
                        <div class="c-white"><span></span></div>
                        <div class="c-green"><span></span></div>
                    </div>
                </div>                       
                </div>                         
            </div>
        </div>
		<p id="prodTitle"><?php echo $answer['title']; ?></p>		
		<p id="prodPrice"><?php echo "$" . bcdiv($answer['price'],1,0);?></p>
</div>		
    </div>	
</a>
</div>


<!--ROW 2-->
<div class ="grid-number">
<a href="productTemplate.php?varname=70600">
<div id="make-3D-space">

    <div class="product-card" id ="prod4">
	
	<?php $getID="70600";
		$answer = getProductTable($getID);
	    $pathx = getImageTable($getID);
        $file = $pathx['path'];
		  
		?>
         <div id="product-front">
        	<div class="shadow"></div>
           <?php echo '<img class="prodImg" src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            <div class="stats">        	
                <div class="stats-container">
                    <span class="product_price"><?php echo "$" . bcdiv($answer['price'],1,0);?></span>
                    <span class="product_name">
					<?php echo $answer['title']; ?>
					</span>    
                    <p><?php echo $answer['short'];?></p>                                            
                                 
					<div class="product-options">
                   
                    <strong>COLORS</strong>
                    <div class="colors">
                        <div class="c-blue"><span></span></div>
                        <div class="c-red"><span></span></div>
                        <div class="c-white"><span></span></div>
                        <div class="c-green"><span></span></div>
                    </div>
                </div>                       
                </div>                         
            </div>
        </div>
		<p id="prodTitle"><?php echo $answer['title']; ?></p>		
		<p id="prodPrice"><?php echo "$" . bcdiv($answer['price'],1,0);?></p>
</div>		
    </div>	
</a>
</div>



<div class="grid-number">
<a href="productTemplate.php?varname=70700">
<div id="make-3D-space">
    <div class="product-card" id ="prod5">
	
	<?php $getID="70700";
		 $answer = getProductTable($getID);
	     $pathx = getImageTable($getID);
         $file = $pathx['path'];
		?>
         <div id="product-front">
        	<div class="shadow"></div>
            <?php echo '<img class="prodImg" src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            <div class="stats">        	
                <div class="stats-container">
                    <span class="product_price"><?php echo "$" . bcdiv($answer['price'],1,0);?></span>
                    <span class="product_name">
					<?php echo $answer['title']; ?>
					</span>    
                    <p><?php echo $answer['short'];?></p>                                            
                                 
					<div class="product-options">
                   
                    <strong>COLORS</strong>
                    <div class="colors">
                        <div class="c-blue"><span></span></div>
                        <div class="c-red"><span></span></div>
                        <div class="c-white"><span></span></div>
                        <div class="c-green"><span></span></div>
                    </div>
                </div>                       
                </div>                         
            </div>
        </div>
		<p id="prodTitle"><?php echo $answer['title']; ?></p>		
		<p id="prodPrice"><?php echo "$" . bcdiv($answer['price'],1,0);?></p>
</div>		
    </div>	
</a>
</div>


<div class="grid-number">
<a href="productTemplate.php?varname=70800">
<div id="make-3D-space">
    <div class="product-card" id ="prod6">
	
	<?php $getID="70800";
		  $answer = getProductTable($getID);
	      $pathx = getImageTable($getID);
          $file = $pathx['path'];
		?>
         <div id="product-front">
        	<div class="shadow"></div>
            <?php echo '<img class="prodImg" src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            
            <div class="stats">        	
                <div class="stats-container">
                    <span class="product_price"><?php echo "$" . bcdiv($answer['price'],1,0);?></span>
                    <span class="product_name">
					<?php echo $answer['title']; ?>
					</span>    
                    <p><?php echo $answer['short'];?></p>                                            
                                 
					<div class="product-options">
                   
                    <strong>COLORS</strong>
                    <div class="colors">
                        <div class="c-blue"><span></span></div>
                        <div class="c-red"><span></span></div>
                        <div class="c-white"><span></span></div>
                        <div class="c-green"><span></span></div>
                    </div>
                </div>                       
                </div>                         
            </div>
        </div>
		<p id="prodTitle"><?php echo $answer['title']; ?></p>		
		<p id="prodPrice"><?php echo "$" . bcdiv($answer['price'],1,0);?></p>
</div>		
    </div>	
</a>
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