<?php
   include("sess.php");
   require('db.php');
 
  
   $error='';
   if(isset($_POST['submit'])) {
      if(empty($_POST['repairID'])) {
         $error = "repairID should not be empty";
      }
   else {
      $repairID = $_POST['repairID'];
      $sql = "DELETE
		FROM repairtable
		WHERE repairID = '$repairID'";
	
      $result = mysqli_query($conn, $sql);
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
	<a href="Admin.php">Back to Home</a> <br/><br/>
	<div class="deleteRepairID">
           <h1 align="center">Delete RepairID</h1>
	   <form action="" method="post" style="text-align:center;">
	   <input type="text" placeholder="repairID" id="repairID" name="repairID"><br/><br/>
	   <input type="submit" value="Delete" name="submit">
	   </form>
	</div>
	<span><?php echo $error; ?></span>  
    </body>
</html>