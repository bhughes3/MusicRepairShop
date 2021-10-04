<?php
   include("sess.php");
   require("db.php");
   $error=''; //Variable to Store error message;
   if(isset($_POST['submit'])) {
      if(empty($_POST['address'])) {
         $error = "Address is Empty";
      }
      else {
	$username=$_SESSION['username'];
	$address=$_POST['address'];

	$query=mysqli_query($conn, "UPDATE customertable SET address = '$address' WHERE username = '$username'");

      }
   }
   mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	<a href="Welcome.php">Back to Home</a> <br/><br/>
	<div class="Address">
	   <h1 align="center">New Address</h1>
	   <form action="" method="post" style="text-align:center;">
	   <input type="text"  placeholder="New Address*" id="address" name="address"><br/><br/>
	   <input type="submit" value="Change Address" name="submit">
	   </form>
	</div> 
	<span><?php echo $error; ?></span>
    </body>
</html>