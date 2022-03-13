<?php

session_start();
  $istrue=false;
  if(isset($_POST["submit"]))  
  { 
     $istrue=true;
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
             <li> <a style ="color:SlateBlu;"  href= "Profile.php"> View Profile </a> </li>
             <li> <a style ="color:SlateBlu;" href="Editprofile"> Edit Profile </a></li>
             
             <li> <a style ="color:SlateBlu;" href="Changepass.php">Change Password</a> </li>
             
              
          </ul>  
          </h2></fieldset>
      </fieldset><br>
	   
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
       

      
       <b><p align="center" <label for="email"> Enter Email : </label> </b>
       <input type="email" name="" id="email">
       <h3 align="center"><input type="submit" name="submit" value="Submit"> </h3>

     </form>
  

     <?php

     if($istrue)
     echo "An Email has been sent to your Account <br>";
     ?>

</body>
</html>