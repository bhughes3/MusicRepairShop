<?php
   include("sess.php");
   require('db.php');
 
   $instType="";
   $brand="";
   $username=$_SESSION['username'];
   $sql = "SELECT DISTINCT IT.instrumenttype, IT.brand
		FROM instrumenttable IT, repairtable RT
		WHERE RT.instrumentID = IT.instrumentID AND username = '$username'";
   $query = mysqli_query($conn, $sql);

   while($row = mysqli_fetch_assoc($query)) {
	$instType .= $row["instrumenttype"]. "<br/>";
	$brand .= $row["brand"]. "<br/>";
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
	<h1 align="left">Instrument Being Repaired</h1>
        <table border="1">
	      <tr>
		<th>Instrument Type</th>
		<th>Brand</th>
	      </tr>
	      <tr>
	      <td> <?php echo $instType ?> </td>
	      <td> <?php echo $brand ?> </td>
	      </tr>
	</table>
      </div>
    </body>
</html>