<!DOCTYPE html>
<html>
<head> <title> PASSWORD </title>
  
  <style>

      .error {color: Red;}
     
     
     </style>
   
  </head>
    <body>
      <?php
        $currentPassword=$newpassword=$rnewpassword="";
        $cpasswordError=$npasswordError=$rnpasswordError="";

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
          if (empty($_POST["currentPassword"]))
	       {
            $cpasswordError = "Current password is required!";
         }
          else
	       {
            $currentPassword = test_input($_POST["currentPassword"]);
             if (strcmp($currentPassword,"abc@1234"))
		        {
                $cpasswordError= "Incorrent password!";
            }     
	       }

          if (empty($_POST["newpassword"])) 
	       	{
               $npasswordError = "New password is required!";
          }
          else 
		      {
            $newpassword = test_input($_POST["newpassword"]);

            if (!strcmp($newpassword,"12345678#"))
		        {
                 $npasswordError = "Current and New password can't be same!";
            }  
		      }

          if (empty($_POST["rnewpassword"]))
			   {
                $rnpasswordError = "Reenter New Password is required!";
          }
          else 
    		   {
                $rnewpassword = test_input($_POST["rnewpassword"]);
                 if (strcmp($newpassword,$rnewpassword)) 
    			 {
                    $rnpasswordError = "Reenter password and New Password need to be same!";
                 }
    			 else
    			 {
    				  $updated = "Pasword upadated successfully";
    			 }
    			 
           }
        }

       function test_input($data) 
       {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data; 
       }
         ?>
	     <div>
		    <fieldset>
          <br>
          <legend> <h2> CHANGE PASSWORD </h2> </legend>
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		  
	  
          <label>Current Password :</label> 
		      <input type="password" name="currentPassword" value="<?php echo $currentPassword;?>">
          <span class="error">* <?php echo $cpasswordError;?></span>
          <br/><br/>
		  
		  
          <label style="color:green">New Password :</label>
          <input type="password" name="newpassword" value="<?php echo $newpassword;?>">
          <span class="error">* <?php echo $npasswordError;?></span>
          <br/><br/>
		  
		  
          <label style="color:Red">Reenter New Password :</label>

          <input type="password" name="rnewpassword" value="<?php echo $rnewpassword;?>">
          <span class="error">* <?php echo $rnpasswordError;?></span>
          <br/><br/>
           <hr> </hr>
		  
          
		      </div> 
          <br>
		 
          <input type="submit" name=" submit" value="Submit">
		      <?php  					 
               if(isset($updated))  
                 {  
                       echo $updated;  
                 }  
          ?> 
          <br/><br/>
      
      </form>
       </fieldset>
  
  </body>
</html>