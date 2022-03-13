<!DOCTYPE html>
<html> <title> Upload File </title>
<body>



    <form action="upload.php" method="post" enctype="multipart/form-data"> 
   <fieldset>
        <legend> <h2> PROFILE PICTURE </h2> </legend>
             <img  src="1.png" height="200px" width="250px"  title="profile pic"> </img> <br>
        
            <span style="color: rgb(255, 255, 255);">  </span>  
        <input type="file" name="fileToUpload" id="fileToUpload"> <br> <br>
  
        <div>
         <hr>
             <input type="submit" name="submit" value="Submit" >
       </div>
       </fieldset>	 
    </form>
</body>
</html>