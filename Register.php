<?php
   require('db.php');

   $error='';
   if(isset($_POST['submit'])) {
      if(empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['name'])) {
         $error = "Username, Password, or Name should not be empty";

      }
   else {
      //Define $user and $pass
      $user=$_POST['user'];
      $pass=$_POST['pass'];
      $name=$_POST['name'];
      $address=$_POST['address'];
      
      if(empty($_POST['address'])) {
	$sql = "INSERT INTO customertable (username, password, name)
      VALUES ('$user', '$pass', '$name')";
      }
      else {
        $sql = "INSERT INTO customertable (username, password, name, address)
        VALUES ('$user', '$pass', '$name', '$address')";
      }

      if(mysqli_query($conn, $sql)) {
	echo "You are registered successfully.";
	header("Location: login.php");
       }
	else  {
	  echo "Error" . mysqli_error($conn);
	}
   }
}
?>