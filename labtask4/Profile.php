<?php
session_start();
?>

<!DOCTYPE html>

<html>
     <fieldset>
	 <head>
	     <title> Profile </title>
	 
	 </head>
	     
	 <body>
	 
	    <br> 
		
		   <div> 
		   
		     <p> <h1 style="color: green">  X  <sub style="color:black"> Company </sub> <h1> </p>
		 
		   
		       <h2 align= "right">
		 
		 
		        Logged in as<a style ="color:SlateBlu;"  href= "profile.php"> <?php  echo $_SESSION["username"]?>| </a>
		       <a style="color:SlateBlu;" href="Home.php">  Logout </a>  
		       
		 
		  
		   </h2>
		   
		  <hr>
		  
		</div> 
			<fieldset><fieldset>
			
	      <legend><h2> <u> Account </u> </h2> <style="color: rgb(255, 255, 255);"> </legend> 
		   
		    
		   
            <h2>
            <ul>
                <li> <a style="color:SlateBlu;" href="Dashboard.php">  Dashboard   </a></li> 
                <li> <a style ="color:SlateBlu;"  href= "profile.php"> View Profile </a> </li>
                <li> <a style ="color:SlateBlu;" href="Editprofile.php"> Edit Profile </a></li>
				
                <li> <a style ="color:SlateBlu;" href="Changepass.php">Change Password</a> </li>
                <li> <a style ="color:SlateBlu;" href="Home.php">Logout</a> </li>
                 
		     </ul>  
		     </h2></fieldset>
		 </fieldset><br>
			 
		   <div>
		   
		   
			<fieldset><fieldset>
		    <legend align="center"><h1> PROFILE </h1></legend>
			
			<h3 align="center">
		    
			<img  src="1.png" height="200px" width="250px"  > </img> <br>
			<a align="right" href=" "> Change </a> <br><br>
			
			
			
		      Name <span style="color: rgb(255, 255, 255);"> </span>:<?php  echo $_SESSION["name"]?><hr>
	          Email <span style="color: rgb(255, 255, 255);"> </span> : <?php  echo $_SESSION["email"]?> <hr>
		      Gender<span style="color: rgb(255, 255, 255);"> </span>: <?php  echo $_SESSION["gender"]?> <hr>
		      Date of Birth <span style="color: rgb(255, 255, 255);"> </span>: <?php  echo $_SESSION["dob"]?> <hr>

		   
		    <a tyle ="color:SlateBlu;"  href=" "> Edit Profile </a>
			
			</h3>
			</fieldset>
		    </fieldset>
			
		</div>
		
		   <div align="center">
		   
		    <hr>
		   
		   <h4> <span style="color: rgb(140, 140, 140);"> Copyright Š  <?php echo date(2017);?> </span> </h4>
		   
		   </div>
		   
	 </body>
	 </fieldset>
</html>