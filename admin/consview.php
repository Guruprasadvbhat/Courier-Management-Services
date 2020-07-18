<?php 
session_start();
if(isset($_SESSION['admusername']))
			{
				
			}
else
	{
		header('location:index.php');
	}			
require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<center>
<head>
	<title>Customers in City</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">


 <br>
<br>
<br>
 <a href="index.php"><input type="button" id="back-button" value="<<Go Back" /></a>

	</center> </body>
</html>