<?php
   include("sess.php");
   require('db.php');

   $error="";
   if(isset($_POST['submit'])) {
       if(empty($_POST['dmgLvl']) || empty($_POST['iType']) || empty($_POST['brand']) || empty($_POST['cost'])) {
	$error = "No field should be empty";
       }

       else {
	 $dmgLvl=$_POST['dmgLvl'];
         $instType=$_POST['iType'];
         $brand=$_POST['brand'];
         $cost=$_POST['cost'];

	 $sql = "INSERT INTO repairCost (damageLevel, instrumentType, brand, cost)	
		VALUES ('$dmgLvl', '$instType', '$brand', '$cost')";

         if(mysqli_query($conn, $sql)) ;
         else { $error = "Adding Cost did not work."; }
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
	<a href="Admin.php">Back to Home</a> <br/><br/>
	<div class="changeCost">
           <h1 align="center">Add Cost to Instrument Type</h1>
	   <form action="" method="post" style="text-align:center;">
	     <label for="damageLvl">Damage Level:</label>
	    <select id="dmgLvl" name="dmgLvl">  
  	    <option value="Low">Low</option>  
  	    <option value="Medium">Medium</option>
	    <option value="High">High</option>  
	    </select><br/><br/>
	   <input type="text" placeholder="Instrument Type*" id="iType" name="iType"><br/><br/>
	   <input type="text" placeholder="Brand*" id="brand" name="brand"><br/><br/>
	   <input type="text" placeholder="Cost*" id="cost" name="cost"><br/><br/>
	   <input type="submit" value="Add Cost" name="submit">
	   </form>
	</div>
	<span><?php echo $error; ?></span> 
        
    </body>
</html>