<?php
   include("sess.php");
   require('db.php');


   $error='';
   if(isset($_POST['submit'])) {
      if(empty($_POST['dmglvl']) || empty($_POST['instype']) || empty($_POST['brand']) || empty($_POST['cost'])) {
         $error = "No field should be empty";
      }
   else {
      $dmglvl = $_POST['dmglvl'];
      $instype = $_POST['instype'];
      $brand = $_POST['brand'];
      $cost = $_POST['cost'];

      $sql = "UPDATE repaircost
		SET cost = '$cost'
		WHERE damageLevel = '$dmglvl' AND instrumentType = '$instype' AND brand = '$brand'";
	
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
	
	<div class="changeCost">
           <h1 align="center">Change Cost</h1>
	   <form action="" method="post" style="text-align:center;">
	   <form action="" method="post" style="text-align:center;">
	    <label for="damageLvl">Damage Level:</label>
	    <select id="dmglvl" name="dmglvl">  
  	     <option value="Low">Low</option>  
  	     <option value="Medium">Medium</option>
	     <option value="High">High</option>  
	   </select><br/><br/>
	   <input type="text" placeholder="Instrument Type*" id="instype" name="instype"><br/><br/>
	   <input type="text" placeholder="Brand*" id="brand" name="brand"><br/><br/>
	   <input type="text" placeholder="New Cost*" id="cost" name="cost"><br/><br/>
	   <input type="submit" value="Change Cost" name="submit">
	   </form>
	</div>
	<span><?php echo $error; ?></span>  
    </body>
</html>