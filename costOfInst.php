<?php
   include("sess.php");
   require('db.php');

   $error="";
   $cost="";
   if(isset($_POST['submit'])) {
      if(empty($_POST['dmglvl']) || empty($_POST['instype']) || empty($_POST['brand'])) {
	$error="Fields should not be empty";
      }
      else {
	$dmglvl=$_POST['dmglvl'];
	$instype=$_POST['instype'];
	$brand=$_POST['brand'];
	
	$sql="SELECT cost
		FROM repaircost
		WHERE damageLevel = '$dmglvl' AND instrumentType = '$instype' AND brand = '$brand'";

	$result = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($result);
	if($rows == 1){
	   $row = mysqli_fetch_assoc($result);
           $cost = "Total cost is $" .$row["cost"];
	}

      }
   }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	<a href="Welcome.php">Back to Home</a> <br/><br/>
	<div class="costOfInt">
        <h1 align="center">Get Cost of Instrument</h1>
	<form action="" method="post" style="text-align:center;">
	 <label for="damageLvl">Damage Level:</label>
	 <select id="dmglvl" name="dmglvl">  
  	   <option value="Low">Low</option>  
  	   <option value="Medium">Medium</option>
	   <option value="High">High</option>  
	 </select><br/><br/>
	<input type="text" placeholder="Instrument Type*" id="instype" name="instype"><br/><br/>
	<input type="text" placeholder="Brand*" id="brand" name="brand"><br/><br/>
	<input type="submit" value="Calculate Cost" name="submit">
	</form>
	</div>
    	<span><?php echo $error; ?></span> 
	<span><?php echo $cost; ?></span>   
    </body>
</html>