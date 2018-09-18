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

<h1 class="productHead">Products</h1>

<div class = "grid-wrapper">
<div class = "grid-number">
<a href="productTemplate.php?varname=70300">
<div id="make-3D-space">

    <div class="product-card">
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
            <?php echo '<img src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            <div id="view_details">View details</div>
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
</div>		
    </div>	
</a>
</div>



<div class="grid-number">
<a href="productTemplate.php?varname=70400">
<div id="make-3D-space">
    <div class="product-card">
	
    <?php $getID="70400";
	     $path = "http://localhost/PHP/images/";
		 $answer = getProductTable($getID);
	     $pathx = getImageTable($getID);
         $file = $pathx['path'];
		?>
       <div id="product-front">
        	<div class="shadow"></div>
           <?php echo '<img src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            <div id="view_details">View details</div>
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
</div>		
    </div>	
</a>
</div>
	


<div class="grid-number">
<a href="productTemplate.php?varname=70500">
<div id="make-3D-space">
    <div class="product-card">
	
	<?php $getID="70500";
		 $answer = getProductTable($getID);
	     $pathx = getImageTable($getID);
         $file = $pathx['path'];
		?>
		  <div id="product-front">
        	<div class="shadow"></div>
           <?php echo '<img src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            <div id="view_details">View details</div>
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
</div>		
    </div>	
</a>
</div>


<!--ROW 2-->
<div class ="grid-number">
<a href="productTemplate.php?varname=70600">
<div id="make-3D-space">

    <div class="product-card">
	
	<?php $getID="70600";
		$answer = getProductTable($getID);
	    $pathx = getImageTable($getID);
        $file = $pathx['path'];
		  
		?>
         <div id="product-front">
        	<div class="shadow"></div>
           <?php echo '<img src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            <div id="view_details">View details</div>
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
</div>		
    </div>	
</a>
</div>



<div class="grid-number">
<a href="productTemplate.php?varname=70700">
<div id="make-3D-space">
    <div class="product-card">
	
	<?php $getID="70700";
		 $answer = getProductTable($getID);
	     $pathx = getImageTable($getID);
         $file = $pathx['path'];
		?>
         <div id="product-front">
        	<div class="shadow"></div>
            <?php echo '<img src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            <div id="view_details">View details</div>
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
</div>		
    </div>	
</a>
</div>


<div class="grid-number">
<a href="productTemplate.php?varname=70800">
<div id="make-3D-space">
    <div class="product-card">
	
	<?php $getID="70800";
		  $answer = getProductTable($getID);
	      $pathx = getImageTable($getID);
          $file = $pathx['path'];
		?>
         <div id="product-front">
        	<div class="shadow"></div>
            <?php echo '<img src="'.$path.$file.'">'; ?>
            <div class="image_overlay"></div>
            <div id="view_details">View details</div>
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
</div>		
    </div>	
</a>
</div>


</div>



<div id="footer">
<p> This yo favorite footer</p>
</div>
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="FunctionsProducts.js"></script>
</body>

</html>