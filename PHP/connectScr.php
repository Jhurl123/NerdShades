<?php


class ConnectScr
{

   function dbConn() {
   
       if(isset($conn)){
          
	        return $conn;
   
       }
   	
	   else {
	
	//Edited to remove password and admin
	
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
             return $conn;
	
	}
   }


}
	
	
	?>
