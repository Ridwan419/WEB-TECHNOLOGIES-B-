<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>



<?php 

$username="Dealership";
$password="Dealership";

if (isset($_POST['uname'])) 
   {
    if ($_POST['uname']==$username && $_POST['pass']==$password) 
    {
       echo "Login Successfull";
    }
    else
    {
        $msg="username or password invalid";
    }

}

?>
        <?php if(isset($msg)){?>
            <?php echo $msg;?>
        <?php } ?>

<div class="login-box">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            
            <h1>Login</h1>

            <div class="textbox">
            	<i class="fa fa-user" aria-hidden="true"></i>
        
            <input type="text" placeholder="User Name" name="uname"> <br>

            </div>

           <div class="textbox">
           	<i class="fa fa-lock" aria-hidden="true"></i>
           	<input type="password" placeholder="Password" name="pass">
           </div>

                                    <input class="btn" type="submit" name="Login" value="Login">  
</div>
</body>
</html>

