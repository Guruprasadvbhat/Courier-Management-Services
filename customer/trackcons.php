<?php 
session_start();
	if(isset($_SESSION['username']))
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
        <title>Welcome <?php echo $_SESSION['username']; ?></title>
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
<!---//webfonts--->
    </head>
<body>
    <!---- container ---->
<!---- header ----->
<div class="header  about-head "  >
        <div class="container">
             
<!--- top-nav ----->

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
                <h1>Welcome, <?php 
                            $un=$_SESSION['username'];
                            $query="select * from userinfo where username='$un'";
                            $query_run=mysqli_query($con,$query);
                            $row = mysqli_fetch_array($query_run);
                            echo $row['pname'];
                            ?></h1>
            </div>
            <div class="breadcrumbs-right">
                <ul>
                    <li><a href="index.php">Customer</a> <label>:</label></li>
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
							<center><h2>Track Item</h2></center>
							<center><img class="avatar" src="../images/avatar.jpg"></center>
							<form class="myform" action="trackcons.php" method="post">
								<br>
								<div align="center"><input type="text" name="cid" placeholder="Enter Item ID"></div>
                                <br>
                                <input type="submit" name="trackc" id="register-button" value="Track" />
								<br>
									</form>
								<?php
								if(isset($_POST['trackc']))
								{ 
									$cid=$_POST['cid'];
									$query="select * from consig where id=".$cid." and ord_by='".$_SESSION['username']."'";
									$query_run=mysqli_query($con,$query);
									if($rows=mysqli_fetch_array($query_run))
									{
										$q2="select * from vcons where id=".$cid;
										$qr=mysqli_query($con,$q2);
										$r2=mysqli_fetch_array($qr);

										        if($rows['status']==-1)  
                                                  echo '<script type="text/javascript"> alert("Item Not Picked Up Yet") </script>';
												if($rows['status']==0)
												echo '<script type="text/javascript"> alert("Item has been picked up by:'.$r2['vby'].'") </script>';
												else if($rows['status']==1)
												echo '<script type="text/javascript"> alert("Last Verified Location \n of your item:'.$rows['cc'].'\nDelivery on or before='.$r2['etd'].'") </script>';
												else if($rows['status']==2)
													echo '<script type="text/javascript"> alert("Your Item Has Been Successfully Delivered") </script>';
									}
									else
									{
											echo '<script type="text/javascript"> alert("Sorry you enterd wrong id of your item") </script>';			
									}
								}
								?>	
						</div>
            </div>
        </div>
        <!---- about-grids ---->
        
    </div>
<!------ about ---->

	</body>
</html>