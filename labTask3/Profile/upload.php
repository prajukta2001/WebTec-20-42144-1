<!DOCTYPE html>
<html> <title> Upload Form </title>
<body>
 
    <?php
	
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       
       if(isset($_POST["submit"])) 


       // Allow certain file formats
       if($imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png") 
	   {
       echo "Only JPG, JPEG, PNG  files are allowed.";
       $uploadOk = 0;
       }

       // Check file size
       if ($_FILES["fileToUpload"]["size"] <= 4000000) 
	   {
       echo "File is too large.";
       $uploadOk = 0;
       }
	   
	   if ($uploadOk == 0) 
	    {  
         echo "File was not uploaded.";
		 
         // if everything is ok, try to upload file
        } 
		else 
		{
             if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
			 {
                 echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
             } 
			 else 
			 {
                echo  "There was an error uploading your file.";
             }

			 
		}

?>

</body>
</html>