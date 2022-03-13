<?php  
 $message = '';  
 $error = '';
  $isok=false;
  $istrue=false;
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["un"]))  
      {  
           $error = "<label class='text-danger'>Enter a username</label>";  
      }  
      else  if(!preg_match("/^[a-zA-Z-_ ]*$/",$_POST["un"])) 
      {
     $error = " User Name can contain alpha numeric characters, period, dash or underscore only!";
    }

      else if(empty($_POST["pass"]))  
      {  
           $error = "<label class='text-danger'>Enter a password</label>";  
      }
      else if(!preg_match('/[\'^£$%&*()}{@#~?><,|=_+¬-]/', $_POST["pass"])) 
          {
        $error= "Password must contain at least 1 special char!"."<br>";
     }
      else if(empty($_POST["Cpass"]))  
      {  
           $error = "<label class='text-danger'>Confirm password field cannot be empty</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Gender cannot be empty</label>";  
      } 
       
     

      else  
      {  
          $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
              
              $uploadOk = 1;
            } else {
             
              $uploadOk = 0;
            }
          }
          
          // Check if file already exists
          if (file_exists($target_file)) {
              $error="File already exits";
              
            $uploadOk = 0;
          }
          
          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 500000) {
              $error="File is large";
             
            $uploadOk = 0;
          }
          
          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
              $error="Jpg or png formet only";
             $uploadOk = 0;
          }
          
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
              $error="File is not uploaded";
              $istrue=false;
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              
              $istrue=true;
            } else {
              $error="File is not uploaded";
              $istrue=false;
            }
          }  

           if(file_exists('Data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
               
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['name'],
                     'Pass'            =>     $_POST['pass'],
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"],  
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"]  
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                
                if(file_put_contents('Data.json', $final_data) && $istrue)  
                {  
                     $isok=true;  
                }
                else
                {
                     $isok=false;
                     $error="Error";
                } 
                
           }  
           else  
           {  
                $isok=false;  
           }
           
           if($istrue && $isok)
           {
             $message="Registration Complete"; 
           }
          
      } 
      
    
     
     
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Registration</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  


           <div> 
		   
           <p ><h1 style="color: green">  X  <sub style="color:black">Company </sub> <h1> </p> 
      
      
        
            <h3 align= "right">
      
      
            <a style="color:SlateBlu;" href="Home.php">  Home |  </a> 
            <a style="color:SlateBlu;" href="Login.php">  Login |  </a>  
            <a style="color:SlateBlu;" href="Registration.php">  Registration </a> 
      
       
        </h3>
        
       <hr>
       
     </div>

           <div class="container" style="width:500px;">  
                <h3 align="center"> <b>Registration</b></h3><br />                 
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data"> 
                   
                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name" class="form-control" /><br />  
                     <label>E-mail</label>
                     <input type="text" name = "email" class="form-control" /><br />
                     <label>User Name</label>
                     <input type="text" name = "un" class="form-control" /><br />
                     <label>Password</label>
                     <input type="password" name = "pass" class="form-control" /><br />
                     <label>Confirm Password</label>
                     <input type="password" name = "Cpass" class="form-control" /><br />

                    <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label><br>

                     <legend>Date of Birth:</legend>
                     <input type="date" name="dob"> <br><br>

                     
                    </fieldset> 
                     
                    <fieldset>
        <legend> <h2> PROFILE PICTURE </h2> </legend>
             <img  src="1.png" height="500px" width="500px"  title="profile pic"> </img> <br>
        
            <span style="color: rgb(255, 255, 255);">  </span>  
        <input type="file" name="fileToUpload" id="fileToUpload"> <br> <br>
  
        <div>
         <hr>
         <input type="submit" name="submit" value="Append" class="btn btn-info" /><br /> 
       </div>
       </fieldset>	 
  
                     
                     
        
                      
                </form> 
                
                <?php  
                     if($istrue && $isok)  
                     {  
                          echo $message;  
                     } 
                     else
                     echo $error; 
                     ?>
           </div>  
           <br />  
      </body>  
 </html>  