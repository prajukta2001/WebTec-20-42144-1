
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $genderErr = $doberr = $degreeerr = $blooderr= "";
$name = $email = $gender = $dob =  $blood ="";
$degree=false;
$cnt=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
   
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["dob"])) {
    $doberr = "Date of birth required";
  } else {
    $dob = test_input($_POST["dob"]);
   
   
  }

  if (empty($_POST["Blood"])) {
    $blooderr = "Blood Group is Required";
  } else {
    $blood = test_input($_POST["Blood"]);
    if($blood=="None")
    $blooderr = "Blood Group is Required";
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
  if(!empty($_POST['deg'])) { 
       $degree=true;

       if($degree)
       {
        
         foreach($_POST['deg'] as $value){
          $cnt=$cnt+1;
       }
       if($cnt<2)
       {
         $degreeerr="Please Select at least two of them ";
       }
      
       }
       
       }
       else
       {
         $degreeerr="Please Select at least two of them";
       }


  }   
   




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2 >Task 2</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
   <label for="dob">Date of birth :</label>
   <input type="date" name="dob" id="dob">
   <span class="error">* <?php echo $doberr;?></span>
   <br>



  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  
  Degree:
      <input type="checkbox" name="deg[]"  value="SSC">SSC
      <input type="checkbox" name="deg[]"  value="HSC">HSC
      <input type="checkbox" name="deg[]" value="BSC">BSC
      <input type="checkbox" name="deg[]" value="MSC">MSC
      <span class="error">* <?php echo $degreeerr;?></span>
     <br>
   Blood Group:
   <select name="Blood" id="">
   <option value="None">None</option>
     <option value="O+">O+</option>
     <option value="O-">O-</option>
     <option value="A+">A+</option>
     <option value="A-">A-</option>
     <option value="B+">B+</option>
     <option value="B-">B-</option>
     <option value="AB+">AB+</option>
     <option value="AB-">AB-</option>
   </select>
   <span class="error">* <?php echo $blooderr;?></span>
   <br>

  <input type="submit" name="submit" value="Submit">  


</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";


if($cnt>1)
{
  if(!empty($_POST['deg'])) {   
  
  foreach($_POST['deg'] as $value){
    echo "Degrees :". $value ;
    echo "<br>";
}
  }
}
if($blood!="None")
echo $blood;


?>

</body>
</html>
