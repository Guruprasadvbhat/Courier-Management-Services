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
                            if(isset($_SESSION['sct']))
                            {}
                        	else
                        		{$_SESSION['sct']=$row['city'];}
                            
                            if(isset($_SESSION['emml']))
                            {}
                        	else
                        		{$_SESSION['emml']=$row['eml'];}
                            ?>
                            </h1>
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
	<center><h2>Request Transit</h2></center>

	<center><img class="avatar" src="../images/avatar.jpg"></center>
	<form class="myform" action="addcons.php" method="post">
		<span>Full Address of Desitination</span>
		<br>
                        <textarea name="addr" maxlength="100" cols="5" style="width: 100%;"></textarea>
                    <br>

		 <span>Destination</span>
		<select name="dc" class="ipvalues2" required>
		<option value="">Select Destination City</option>
		<?php 
			$query="select * from city";
					$query_run=mysqli_query($con,$query);
						while($row = mysqli_fetch_array($query_run)){
							echo "<option value='" . $row['cityname'] . "'>" . $row['cityname'] . "</option>";}
		 ?>
		 </select>
		 <span>Delivery Speed</span>
		<select name="ds" class="ipvalues2" required>
		<option value="">Select medium/fast/turbo</option>
		<option value="1">Medium</option>
		<option value="2">Fast</option>
		<option value="3">Turbo</option>
		<?php 
		//	$query="select * from city";
		//			$query_run=mysqli_query($con,$query);
		//				while($row = mysqli_fetch_array($query_run)){
		//					echo "<option value='" . $row['cityname'] . "'>" . $row['cityname'] . "</option>";}
		//
		 ?>
		 </select>
		 <input type="submit" name="submit_button" id="register-button" value="Schedule Pick Up" />
		 <a href="index.php"><input type="button" id="back-button" value="<<Back to Home" /></a>
		 </form>
		 </div>

		 <?php 
										if(isset($_POST['submit_button']))
										{
										
											$un=$_SESSION['username'];
											$addr=$_POST['addr'];
											$city=$_POST['dc'];
											$ds=$_POST['ds'];
											$sc=$_SESSION['sct'];
											//echo $user_type ;
											
													$query="insert into consig(ord_by,sc,dc,cc,serv_type) values('".$un."','".$sc."','".$city."','".$sc."',".$ds.")";
													$query_run=mysqli_query($con,$query);
														if($query_run)
															{
															$query2="select max(id) from consig where ord_by='$un'";
															$query_run2=mysqli_query($con,$query2);
															if($val=mysqli_fetch_array($query_run2))
																$to=$_SESSION['emml'];
																$sub='PicK Up Request';
																$msg="Hi ".$_SESSION['username'].", your item pickup request has been added successfully.\n ID:".$val[0].". Kindly keep it for future reference";
																$hed='from: no-reply';
																$sent=1;
																if($sent)
																	{
																		echo '<script type="text/javascript"> alert("Request added successfully,check your mail") </script>';				
																	}
																else
																{
																	echo '<script type="text/javascript"> alert("Request added successfully,error:mail not sent") </script>';
																}



															}
														else
															echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
														
													}
												
												?>

            </div>
        </div>
        <!---- about-grids ---->
        
    </div>
	</body>
</html>