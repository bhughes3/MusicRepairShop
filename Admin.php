<?php
   include("sess.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	<header>
	   <a href="logout.php" style="float:right; padding:0px;">Logout</a><br/>
	   <img src="images/logo.png" style="float:left;width:220px;height:220px;">
	   <h1 align="center" style="padding:0px 0px 25px 0px;"> Welcome <?php echo $_SESSION['username']; ?></h1>
	</header>	
	<div style="text-align:center">
		<a href="addInstrumentCanRepair.php">Add An Instrument User Can Repair</a><br/><br/>
		<a href="addCostToInst.php">Add Cost To Instrument</a><br/><br/>
		<a href="deleteRepairOrder.php">Delete Repair Order</a><br/><br/>
		<a href="changeCost.php">Change Cost</a>
    </body>
</html>