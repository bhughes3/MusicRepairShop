<?php
   require('db.php');
   session_start();
   $error=''; //Variable to Store error message;
   if(isset($_POST['submit'])) {
      if(empty($_POST['user']) || empty($_POST['pass'])) {
         $error = "Username or Password is Invalid";
      }
   else
   {
      //Define $user and $pass
      $user=$_POST['user'];
      $pass=$_POST['pass'];

      //sql query to fetch information of registerd user and finds user match.
      $query = mysqli_query($conn, "SELECT * FROM customertable WHERE password='$pass' AND username='$user'");
 
      $rows = mysqli_num_rows($query);
      if($rows == 1){
	if($user == 'admin'){
	  $_SESSION['username'] = $user;
	  header("Location: Admin.php"); // Redirecting to admin page
	}
	else
	{
	  $_SESSION['username'] = $user;
          header("Location: Welcome.php"); // Redirecting to other page
	}
      }
      else
      {
        $error = "Username of Password is Invalid";
      }
      }
   }
 
?>