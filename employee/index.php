<?php 
session_start();
	if(isset($_SESSION['empusername']))
				{
					//echo "okey stay";
				}
			else
				{
					header('location:../');
				}
require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
        <title>Welcome <?php echo $_SESSION['empusername']; ?></title>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/jquery.min.js"></script>-->
<script src="../js/jquery-1.8.3.js"></script>
 <!-- Custom Theme files -->
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link href="../css/style.css" rel='stylesheet' type='text/css' />
 <!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!----webfonts--->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />-->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />

    </head>
<body>

<div class="header  about-head "  >
        <div class="container">

               

<!----- script-for-nav ---->
        </div>
    </div>
<!---- header ----->
<!------ about ---->
<div class="about">
    <!--- bradcrumbs ---->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-left">
                <h1>Welcome   <?php 
                            $un=$_SESSION['empusername'];
                            $query="select * from empuserinfo where username='$un'";
                            $query_run=mysqli_query($con,$query);
                            $row = mysqli_fetch_array($query_run);
                            echo $row['pname'];
                            ?></h1>
            </div>
            <div class="breadcrumbs-right">
                <ul>
                    <li><a href="index.php">Employee</a> <label>:</label></li>
                    <li>Home</li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--- bradcrumbs ---->
</div>
<div class="about-top-grids">
    <div class="container">
        <!---- about-grids ---->
        <div class="about-grids">
            <div class="about-grids-row1">
            
	                   <div id="abc">
							<center><h2>What are you here for?</h2></center>
							
							<form class="myform" action="index.php" method="post">
                                <br>
                                <a href="updateloc.php"> <input type="button" id="register-button" value="Update Location" /> </a>
                                <br>
                                <a href="addcons.php"><input type="button" name="addc" id="logout-button" value="Attend Pick Up" /></a>
								<br>
								<a href="deliver.php"> <input type="button" id="register-button" value="Deliver Item" /> </a>
                                <br>
								<input type="submit" name="logout" id="logout-button" value="Logout" />
								<br>	</form>
								<?php
								
								if(isset($_POST['logout']))
								{ 
										if(isset($_SESSION['empusername']))
											{
											$_SESSION = [];
											session_destroy();
											}
											header('location:index.php');
								}
								?>	
						</div>
            </div>
        </div>
        <!---- about-grids ---->
        
    </div>
<!------ about ---->
</div>

	</body>
</html>