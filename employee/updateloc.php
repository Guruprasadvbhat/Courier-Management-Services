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

           
                </div>
                

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
							<center><h2>Update Arrival, Enter Item ID</h2></center>
							

							<form class="myform" action="updateloc.php" method="post">
                                <br>
                                <div align="center"><input type="text" name="cid" placeholder="Enter Item ID"></div>
                                <br>
                                <input type="submit" name="udcc" id="register-button" value="Update" />
                                <br>
                                    </form>
								
                                <?php
                                if(isset($_POST['udcc']))
                                { 
                                    $cid=$_POST['cid'];
                                    $query="select * from consig where id=".$cid." and dc='".$_SESSION['empcity']."'";
                                    $query_run=mysqli_query($con,$query);
                                    if($rows=mysqli_fetch_array($query_run))
                                    {
                                        //$q2="select * from vcons where id=".$cid;
                                        //$qr=mysqli_query($con,$q2);
                                                if($rows['status']==-1)  
                                                  echo '<script type="text/javascript"> alert("Item Not Picked Up Yet") </script>';
                                                else if($rows['status']==0)
                                                    {
                                                        $query2="update consig set status=1, cc=dc where id=".$cid;
                                                        $query_run2=mysqli_query($con,$query2);
                                                        if($query_run2)
                                                            echo '<script type="text/javascript"> alert("Location Update Successfully") </script>';        

                                                    }
                                                    else if($rows['status']==1)
                                                    {
                                                        echo '<script type="text/javascript"> alert("Location already updated") </script>';    
                                                    }
                                                else if($rows['status']==2)
                                                    echo '<script type="text/javascript"> alert("This Item Has Been Successfully Delivered") </script>';
                                    }
                                    else
                                    {
                                            echo '<script type="text/javascript"> alert("Sorry item not destined to your city.") </script>';           
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