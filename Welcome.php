<?php
   include("sess.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
    </head>
    <body>
	<header>
	   <a href="logout.php" style="float:right; padding:0px;">Logout</a><br/>
	   <img src="images/logo.png" style="float:left;width:250px;height:250px;">
	   <h1 align="center" style="padding:0px 0px 25px 0px;"> Welcome <?php echo $_SESSION['username']; ?></h1>
	</header>	
	<div style="text-align:center">
		<a href="newAddress.php">Change Address</a><br/><br/>
		<a href="addInstrument.php">Add Instruments In Repair</a><br/><br/>
		<a href="costOfInst.php">Find Cost of an Instrument</a><br/><br/>
		<a href="instrumentsRepair.php">Cost of Each Order You Have</a><br/><br/>
		<a href="brandAndType.php">Instrument Type and Brand You Repaired</a>
	</div>
    </body>
</html>