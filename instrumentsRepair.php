<?php
   include("sess.php");
   require('db.php');

   $rID="";
   $insID="";
   $cost="";
   $username=$_SESSION['username'];
   $sql = "SELECT DISTINCT RT.repairID, RT.instrumentID, RC.cost
		FROM repairtable RT, instrumenttable IT, repaircost RC 
		WHERE RT.instrumentID = IT.instrumentID AND RT.damageLevel = RC.damageLevel AND IT.instrumenttype = RC.instrumenttype AND IT.brand = RC.brand AND RT.username = '$username'
		ORDER BY repairID";

   $result = mysqli_query($conn, $sql);

   while($row = mysqli_fetch_assoc($result)) {
        $rID .= $row["repairID"]. "<br>";
	$insID .= $row["instrumentID"]. "<br/>";
	$cost .= "$" .$row["cost"]. "<br/>";
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
	<h1>Instruments Repair</h1>
	<div style="text-align:center;">
	   <table border="1">
	      <tr>
		<th>repairID</th>
		<th>InstrumentID</th>
		<th>Cost</th>
	      </tr>
	      <tr>
              <td> <?php echo $rID ?> </td>
	      <td> <?php echo $insID ?> </td>
	      <td> <?php echo $cost ?> </td>
	      </tr>
	   </table>
    </body>
</html>