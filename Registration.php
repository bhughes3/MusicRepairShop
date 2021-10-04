<?php
include("Register.php"); // Include Register for registering
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	<header>
	   <img src="images/logo.png" style="float:left;width:250px;height:250px;">
	</header>
	<div class="registration">
	   <h1 align="center">Registration</h1>
	   <form action="" method="post" style="text-align:center;">
	   <input type="text"  placeholder="Username*" id="user" name="user"><br/><br/>
	   <input type="name" placeholder="Name*" id="name" name="name"> <br/><br/>
	   <input type="password" placeholder="Password*" id="pass" name="pass"> <br/><br/>
           <input type="text" placeholder="Address" id="address" name="address"> <br/><br/>
	   <input type="submit" value="Register" name="submit">
	   </form>
	</div>
	<br/><br/>
	<a href="Login.php">Go Back To Login</a>
        <span><?php echo $error; ?></span>
    </body>
</html>