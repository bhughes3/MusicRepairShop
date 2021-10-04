<?php
   include("sess.php");
   require('db.php');

   $instID="";
   $musicF="";
   $instType="";
   $brand="";
   $sql = "SELECT instrumentID, musicFamily, instrumentType, brand FROM instrumentTable ORDER BY instrumentID";
   $result = mysqli_query($conn, $sql);

   while($row = mysqli_fetch_assoc($result)) {
	$instID .= $row["instrumentID"]. "<br/>";
        $musicF .= $row["musicFamily"]. "<br/>";
	$instType .= $row["instrumentType"]. "<br/>";
	$brand .= $row["brand"]. "<br/>";
    }
   $error="";
   if(isset($_POST['submit'])) {
       if(empty($_POST['instID']) || empty($_POST['dmgLvl'])) {
	$error = "Instrument ID should be empty";
       }

       else {
	  $iID=$_POST['instID'];
	  $dmgLvl=$_POST['dmgLvl'];
	  $username=$_SESSION['username'];

	  $query = "SELECT instrumentID FROM instrumenttable WHERE instrumentID='$instID'";
	  $result = mysqli_query($conn, $query);
	  if($result) ;
          else { $error = "Adding Instrument did not work."; }
	   $row = mysqli_num_rows($result);
	  if($row==0) {
		$error="Not valid Instrument ID";
	  }
	  else {
	    $id=0;
            do {
	      $id++;
	      $sql = mysqli_query($conn, "SELECT * FROM repairtable WHERE repairID=$id");
	      $rows = mysqli_num_rows($sql);
              } while($rows > 0);

              $insert = "INSERT INTO repairtable (repairID, instrumentID, username, damageLevel)	
		VALUES ($id, '$iID', '$username', '$dmgLvl')";

             if(mysqli_query($conn, $insert))	
	        $error = "Added Instrument";
             else { 
		$error = "Adding Instrument did not work."; 
	     }   
	  }
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
	<div style="text-align:center;">
	   <h1 align="center">Instruments We Can Repair</h1>
	   <table border="1" align="center">
	      <tr>
		<th>InstrumentID</th>
		<th>Music Family</th>
		<th>Instrument Type</th>
		<th>Brand</th>
	      </tr>
	      <tr>
	        <td> <?php echo $instID ?> </td>
                <td> <?php echo $musicF ?> </td>
	        <td> <?php echo $instType ?> </td>
	        <td> <?php echo $brand ?> </td>
	      </tr>
	   </table>
	</div>
	<br/><br/>
	<div class="addInstrument">
           <h1 align="center">Add Instrument To Repair</h1>
	   <form action="" method="post" style="text-align:center;">
	   <input type="text" placeholder="Instrument ID*" id="instID" name="instID"><br/><br/>
	   <label for="damageLvl">Damage Level:</label>
	   <select id="dmgLvl" name="dmgLvl">  
  	     <option value="Low">Low</option>  
  	     <option value="Medium">Medium</option>
	     <option value="High">High</option>  
	   </select>
	   <input type="submit" value="Add Instrument" name="submit">
	   </form>
	</div>
	  <span><?php echo $error; ?></span> 
    </body>
</html>
