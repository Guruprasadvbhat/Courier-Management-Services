<?php 
session_start();
if(isset($_SESSION['username']))
			{
				header('location:index.php');
			}
else if(isset($_SESSION['empusername']))
			{
				header('location:index.php');
			}	
else
	{
		
	}	
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
        <title>Register </title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="js/jquery.min.js"></script>-->
<script src="js/jquery-1.8.3.js"></script>
 <!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
 <!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!----webfonts--->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />-->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />
<!---//webfonts--->
<link rel="stylesheet" type="text/css" href="css/validate.css" />
<script type='text/javascript' src="js/jquery.validate.js"></script>
<script src="js/common.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
   $("#register").validate();
});
</script>
    </head>
<body>
    <!---- container ---->
<!---- header ----->
<div class="header  about-head "  >
        <div class="container">
            
<!--- top-nav ----->
<div class="top-nav">
    <span class="menu"> </span>
  
</div>
<div class="clearfix"> </div>
<!--- top-nav ----->
        <!----- script-for-nav ---->
<script>
        $( "span.menu" ).click(function() {
          $( ".top-nav ul" ).slideToggle( "slow", function() {
            // Animation complete.
          });
        });
</script>
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
                <h1>Register</h1>
            </div>
            <div class="breadcrumbs-right">
                <ul>
                    <li><a href="index.php">Home</a> <label>:</label></li>
                    <li>Register</li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--- bradcrumbs ---->
</div>
<div class="about-top-grids">
    <div class="container">
        <div class="contact-grids">
            <div class="contact-right">


                <h2>Registration</h2>
                
               
                <form name="register" id="register" method="post" action="register.php">
                    <div>
                        <span>I Am</span>
                        <select name="user_type" class="required">
                            <option value="">Select Account Type</option>
                            <option value="customer"  >Customer</option>
                            <option value="employee" >Employee</option>
                        </select>
                    </div>
                    <div>
                    	<span>User Name</span>
                        <input type="text" name="username" maxlength="30" value="" class="required" />
                        <br><span>Name</span>
                        <input type="text" name="pname" maxlength="30" value="" class="required" />
                    </div>
                    <div>
                        <span>Mobile</span>
                        <input type="text" name="phone" maxlength="10" minlength="10" value="" class="required digits" />
                    </div>
                    <div>
                        <span>Email</span>
                        <input type="email" name="eml" maxlength="50" value="" class="required" />
                    </div>
                    <div>
                        <span>Password</span>
                        <input type="password" name="password" maxlength="40" minlength="8" value="" class="required" />
                    </div>
                    <div>
                        <span>Confirm Password</span>
                        <input type="password" name="cpassword" maxlength="40" value="" class="required" />
                    </div>
                    <div>
                        <span>Address</span>
                        <textarea name="addr" maxlength="100" cols="5" ></textarea>
                    </div>
                    
                    <div>
                        <span>City</span>
                        <select name="city" id="city" class="input_long required" >
                            <option value="">--Select--</option>
                            <?php 
								$query="select * from city";
										$query_run=mysqli_query($con,$query);
											while($row = mysqli_fetch_array($query_run)){
												if($row['constat']==1)
												echo "<option value='" . $row['cityname'] . "'>" . $row['cityname'] . "</option>";}
							 ?>
							 </select>
                    </div>
                    <input type="submit" Value="Register" name="register_submit" />
                </form>                
									<?php 
										if(isset($_POST['register_submit']))
										{
										#echo '<script type="text/javascript"> alert("Sign Up Button Clicked") </script>';
											$user_type=$_POST['user_type'];
                                            $username=preg_replace('/[^A-Za-z0-9\-]/', '',$_POST['username']);
											$password=$_POST['password'];
											$cpassword=$_POST['cpassword'];
											$phno=$_POST['phone'];
											$pname=$_POST['pname'];
											$eml=$_POST['eml'];
											$addr=$_POST['addr'];
											$city=$_POST['city'];
											//echo $user_type ;
											if($user_type=="employee")
												{
													if($password==$cpassword)
													{
														$query="select * from empuserinfo where username='$username'";
														$query_run=mysqli_query($con,$query);
														if(mysqli_num_rows($query_run)>0)
														{
															//Already a user
															echo '<script type="text/javascript"> alert("User Already Exists... Try another username") </script>';
														}
														else
														{
															//$query="insert into empuserinfo values('$username','$password',0,$pname,$phno,$eml)";
															$query="insert into empuserinfo values('$username','$password',1,'$pname','$phno','$eml','$addr','$city')";
														$query_run=mysqli_query($con,$query);
														if($query_run)
															echo '<script type="text/javascript"> alert("Registration Successful!! Verify from admin, Go to Login Page") </script>';
														else
															echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
														}
														
														
													}
													else
														echo '<script type="text/javascript"> alert("Error Passwords Don\'t Match") </script>';
												}
											else
												{
													if($password==$cpassword)
													{
														$query="select * from userinfo where username='$username'";
														$query_run=mysqli_query($con,$query);
														
														if(mysqli_num_rows($query_run)>0)
														{
															//Already a user
															echo '<script type="text/javascript"> alert("User Already Exists... Try another username") </script>';
														}
														else
														{
															$query="insert into userinfo values('$username','$password','$pname','$phno','$eml','$addr','$city')";
														$query_run=mysqli_query($con,$query);
														if($query_run)
															echo '<script type="text/javascript"> alert("Registration Successful!! Go to Login Page") </script>';
														else
															echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
														}
													}
													else
														echo '<script type="text/javascript"> alert("Error Passwords Don\'t Match") </script>';
												}
										}
									?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<!------ about ---->
</center>
</div>

</div>
    </body>
</html>