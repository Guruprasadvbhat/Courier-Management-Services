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
                <!--- logo ----->
                <div class="logo">
                    <img src="../images/logo45.png" alt="Logo"  /> <a href="../index.php"><span></span>TYC</a>
                </div>
                <!--- logo ----->
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



<div class="about-top-grids">
    <div class="container">
        <div class="contact-grids">
            <div class="contact-right">
                <h2>Edit Your Details</h2>
                <form name="register" id="register" method="post" action="editprof.php">
                            <div>
                            <span>Name</span>
                            <input type="text" name="pname" maxlength="30" value=<?php 
                            $un=$_SESSION['empusername'];
                            $query="select * from empuserinfo where username='$un'";
                            $query_run=mysqli_query($con,$query);
                            $row = mysqli_fetch_array($query_run);
                            echo '"'.$row['pname'].'"';
                            ?> class="required" />
                            </div>
                            <div>
                            <span>Mobile</span>
                            <input type="text" name="phone" maxlength="10" minlength="10" value=<?php 
                            $un=$_SESSION['empusername'];
                            $query="select * from empuserinfo where username='$un'";
                            $query_run=mysqli_query($con,$query);
                            $row = mysqli_fetch_array($query_run);
                            echo '"'.$row['phno'].'"';
                            ?> class="required digits" />
                            </div>
                            <div>
                          <span>Email</span>
                            <input type="email" name="eml" maxlength="50" value=<?php 
                            $un=$_SESSION['empusername'];
                            $query="select * from empuserinfo where username='$un'";
                            $query_run=mysqli_query($con,$query);
                            $row = mysqli_fetch_array($query_run);
                            echo '"'.$row['eml'].'"';
                            ?> class="required" />
                                            </div>
                                            <div>
                                                <span>Password</span>
                                                <input type="password" name="password" maxlength="40" value=<?php 
                            $un=$_SESSION['empusername'];
                            $query="select * from empuserinfo where username='$un'";
                            $query_run=mysqli_query($con,$query);
                            $row = mysqli_fetch_array($query_run);
                            echo '"'.$row['password'].'"';
                            ?> class="required" />
                                            </div>
                                            <div>
                                                <span>Confirm Password</span>
                                                <input type="password" name="cpassword" maxlength="40" value=<?php 
                            $un=$_SESSION['empusername'];
                            $query="select * from empuserinfo where username='$un'";
                            $query_run=mysqli_query($con,$query);
                            $row = mysqli_fetch_array($query_run);
                            echo '"'.$row['password'].'"';
                            ?> class="required" />
                                            </div>
                                            <div>
                                                <span>Address</span>
                                                <textarea name="addr" maxlength="100" cols="5" placeholder=<?php 
                            $un=$_SESSION['empusername'];
                            $query="select * from empuserinfo where username='$un'";
                            $query_run=mysqli_query($con,$query);
                            $row = mysqli_fetch_array($query_run);
                            echo '"'.$row['address'].'"';
                            ?>></textarea>
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
                                            <input type="submit" Value="Save" name="save_submit" />








                                                             </form>                
                                    <?php 
                                        if(isset($_POST['save_submit']))
                                        {
                                        #echo '<script type="text/javascript"> alert("Sign Up Button Clicked") </script>';
                                            $username=$_SESSION['empusername'];
                                            $password=$_POST['password'];
                                            $cpassword=$_POST['cpassword'];
                                            $phno=$_POST['phone'];
                                            $pname=$_POST['pname'];
                                            $eml=$_POST['eml'];
                                            $addr=$_POST['addr'];
                                            $city=$_POST['city'];
                                            //echo $user_type ;
                                                    if($password==$cpassword)
                                                    {
                                                        $query="select * from empuserinfo where username='$username'";
                                                        $query_run=mysqli_query($con,$query);
                                                        
                                                        if(mysqli_num_rows($query_run)>0)
                                                        {
                                                            //Already a user
                                                            $query2="DELETE FROM empuserinfo WHERE username='".$username."'";
                                                            $query_run2=mysqli_query($con,$query2);
                                                            $query2="insert into empuserinfo values('$username','$password',1,'$pname','$phno','$eml','$addr','$city')";
                                                        $query_run2=mysqli_query($con,$query2);
                                                        if($query_run2)
                                                           { echo '<script type="text/javascript"> alert("Update Successful!! Reload To See Changes!! Awaits Admin Confirmation ") </script>';
                                                             }
                                                        else
                                                            echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
                                                        }
                                                        else
                                                        {
                                                        }
                                                    }
                                                    else
                                                        echo '<script type="text/javascript"> alert("Error Passwords Don\'t Match") </script>';
                                                
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