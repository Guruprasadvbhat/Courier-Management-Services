<?php 
session_start();
if(isset($_SESSION['username']))
			{
				header('location:customer');
			}
else if(isset($_SESSION['empusername']))
			{
				header('location:employee');
			}	
else
	{
		#	echo '<script type="text/javascript"> alert("All in vain") </script>';
	}			
require 'dbconfig/config.php';
?>


<!DOCTYPE html>




<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">
	<center><h2>LOGIN</h2></center>

<center><div style="width:500px; font-family: Questrial; font-size:20px; border:8px solid #100; padding:80px;" align="center">
<center>
<center>

 <div class="form_cont">
        <form name="login_form" id="login_form" method="post" autocomplete="off" action="index.php" >
            <div class="row1"><select name="user_type" class="required">
                           <option value="">Select Account Type</option>
                           <option value="customer"  >Customer</option>
                           <option value="employee" >Employee</option>
                           </select></div>
            <div class="row1"><input type="text" name="username" placeholder="Type Your username" class="required"/></div>
            <div class="row1"><input type="password" name="password" maxlength="40" value="" class="required" placeholder="Password" /></div>
             <div class="row1"><input type="submit" Value="Login" name="login_submit" /></div>
           
        </form>

     <p> <a href="admin">admin</a></p>
     <a href="register.php">Register</a> 

</center>





 <?php 
                                if(isset($_POST['login_submit']))
                                {
                                #echo '<script type="text/javascript"> alert("Sign Up Button Clicked") </script>';
                                    $username=preg_replace('/[^A-Za-z0-9\-]/', '',$_POST['username']);
                                    
                                    //echo $username;
                                    $password=$_POST['password'];
                                    //preg_replace('/[^A-Za-z0-9\-]/', '', $password);
                                    $user_type=$_POST['user_type'];
                                    if($user_type=="employee")
                                        {
                                            $query="select * from empuserinfo where username='$username' and password='$password'";
                                            $query_run=mysqli_query($con,$query);
                                            if(mysqli_num_rows($query_run)>0)
                                            {
                                                $query2="select * from empuserinfo where username='$username' and password='$password' and vstatus=0";
                                                $query_run2=mysqli_query($con,$query2);
                                                if(mysqli_num_rows($query_run2)>0)  
                                                {
                                                    echo '<script type="text/javascript"> alert("Employee not verified") </script>';
                                                }
                                                else
                                                {
                                                //success login
                                                //$_SESSION = [];
                                                //session_destroy();
                                                //will see the differences
                                                $_SESSION['empusername']=$username;
                                                $tqq="select * from empuserinfo where username='$username' and password='$password'";
                                                $qrq=mysqli_query($con,$tqq);
                                                $rw2=mysqli_fetch_array($qrq);
                                                $_SESSION['empcity']=$rw2['city'];
                                                //echo $rw2['city'];
                                                header('location:employee');
                                                }
                                                //echo '<script type="text/javascript"> alert("found ya") </script>';
                                            }
                                            else
                                            {
                                                //wrong credentials
                                                echo '<script type="text/javascript"> alert("Sorry, Invalid UserName or Password!!!") </script>';
                                            }
                                        }
                                    else
                                        {

                                            $query="select * from userinfo where username='$username' and password='$password'";
                                            $query_run=mysqli_query($con,$query);
                                            if(mysqli_num_rows($query_run)>0)
                                            {
                                                //success login
                                                //$_SESSION = [];
                                                //session_destroy();
                                                //will see the differences
                                                $_SESSION['username']=$username;
                                                header('location:customer');
                                                //echo '<script type="text/javascript"> alert("found ya") </script>';
                                            }
                                            else
                                            {
                                                //wrong credentials
                                                echo '<script type="text/javascript"> alert("Sorry, Invalid UserName or Password!!!") </script>';
                                            }
                                            //echo '<script type="text/javascript"> alert("Only Employee Login right now") </script>';
                                        }
                                }
                            ?>


	
</body>
</html>
