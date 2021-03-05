<!DOCTYPE HTML>
<html>

<head>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
</head>

<body>

    <?php
$flag=1;
$nameErr = $emailErr = $genderErr = $dobErr = $name = $email = $dob = $gender = "";
$message = '';  
$error = ''; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $flag=0;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$name)) {
      $nameErr = "Only letters white space, period & dash allowed";
      $name ="";
      $flag=0;
    }
    else if (str_word_count($name)<2) {
      $nameErr = "At least two words needed";
      $name ="";
      $flag=0;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $flag=0;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format Give valid";
      $email ="";
      $flag=0;
    }
  }

  if (empty($_POST["birthday"])) {
    $dobErr = "Date of birth is required";
    $flag=0;
  } else {
    $dob = test_input($_POST["birthday"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Select gender";
    $flag=0;
  } else {
    $gender = test_input($_POST["gender"]);
  }

  
 if ($flag==1) {
 	if(isset($_POST["submit"]))  
    {
 	if(file_exists('Registration.json'))
 		{
 			$current_data = file_get_contents('Registration.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array(  
                 'name'               =>     $_POST['name'],
                 'email'          =>     $_POST["email"],  
                 'dateOfBirth'          =>     $_POST["birthday"],  
                 'gender'     =>     $_POST["gender"]  
                );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('Registration.json', $final_data))  
            {  
                 $message = "<label>Data Recorded Successfully</p>";  
            }  
        }  
        else  
        {  
           $error = 'JSON File not exits';  
        }  
    }
 }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <legend>REGISTRATION:</legend>
            Name: <input type="text" name="name">
            <span class="error"> <?php echo $nameErr;?></span>
            <br>
            <hr>
            E-mail: <input type="text" name="email">
            <span class="error"> <?php echo $emailErr;?></span>
            <br>
            <hr> 
            <fieldset>
                <legend>Date Of Birth</legend>
                <input type="date" name="birthday">
                <span class="error"> <?php echo $dobErr;?></span>
                <br>
            </fieldset>          
            <hr>
            <fieldset>
                <legend>Gender</legend>            
                <input type="radio" name="gender" value="male">male
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="other">Other
                <span class="error"> <?php echo $genderErr;?></span>
            </fieldset>            
            <hr>
            <fieldset>
                <legend>Degree</legend>              
                <input type="radio" name="degree" value="ssc">SSC
                <input type="radio" name="degree" value="hsc">HSC
                <input type="radio" name="degree" value="bsc">BSc
                <input type="radio" name="degree" value="msc">MSc
                <span class="error"> <?php echo $degreeErr;?></span>
            </fieldset>            
            <hr>
            <fieldset>
            	<body>
            	<legend>Blood Group</legend>
            	<select name="bloodgp" id="bloodgp" <?php echo($data['user_bloodgroup']==$bloodgp)?'checked':'' ?>>
    <option value="A+">A+</option
    <option value="B+">B+</option>
    <option value="AB+">AB+</option>
    <option value="O+">O+</option>
    <option value="A-">A-</option>
    <option value="B-">B-</option>
    <option value="AB-">AB-</option>
    <option value="O-">O-</option>
</select>
</body>
            </fieldset>
            <hr>
            <input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset">
        </fieldset>
    </form>
    <?php
echo $error;
echo "<br>";
echo $message;
echo "<br>";
?>
</body>

</html>