<?php
include("LoginServerWithAdmin.php"); // Include LoginServer for checking username and password
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
	<header>
	   <img src="images/logo.png" style="float:left;width:200px;height:200px;">
	</header>
	<div class="login">
           <h1 align="center">Login</h1>
	   <form action="" method="post" style="text-align:center;">
	   <input type="text" placeholder="Username" id="user" name="user"><br/><br/>
	   <input type="password" placeholder="Password" id="pass" name="pass"><br/><br/>
	   <input type="submit" value="Login" name="submit">
	   </form>
	   <p style="text-align:center">Not registered yet? <a href='Registration.php'>Register Here</a></p>
	</div>
	<span><?php echo $error; ?></span>
    </body>
</html>
