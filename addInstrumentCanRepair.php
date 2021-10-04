<?php
   include("sess.php");
   require('db.php');

   $error="";
   if(isset($_POST['submit'])) {
      if(empty($_POST['mFamily']) || empty($_POST['iType']) || empty($_POST['brand'])) {
	$error = "No field should be empty";
      }

      else {
	$musicFamily = $_POST['mFamily'];
        $instype = $_POST['iType'];
        $brand = $_POST['brand'];
      }

      $id=0;
      do {
	$id++;
	$query = mysqli_query($conn, "SELECT * FROM instrumenttable WHERE instrumentID=$id");
	$rows = mysqli_num_rows($query);
      } while($rows > 0);

      $sql = "INSERT INTO instrumenttable (instrumentID, musicFamily, instrumentType, brand)	
		VALUES ($id, '$musicFamily', '$instype', '$brand')";

      if(mysqli_query($conn, $sql)) ;
      else { $error = "Adding Instrument did not work."; }
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
           <h1 align="center">Add Instrument For User To Repair</h1>
	   <form action="" method="post" style="text-align:center;">
	   <input type="text" placeholder="Music Family*" id="mFamily" name="mFamily"><br/><br/>
	   <input type="text" placeholder="Instrument Type*" id="iType" name="iType"><br/><br/>
	   <input type="text" placeholder="Brand*" id="brand" name="brand"><br/><br/>
	   <input type="submit" value="Add Instrument" name="submit">
	   </form>
	</div>
	<span><?php echo $error; ?></span> 
        
    </body>
</html>