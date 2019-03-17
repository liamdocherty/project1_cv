<?php
   //See "index.php" for comment for this section
   session_start();
   require_once('dbconfig/config.php');
   //phpinfo();
   ?>
<!DOCTYPE html>
<html>
   <head>
      <!-- Site title AND CSS external file -->
      <title>Sign Up Page - Created by Liam Docherty</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
  <link rel="stylesheet" type="text/css" href="login_script.css">
   </head>
   <body>
     <div class="container">
          <div class="row animated bounceInDown">
              <div class="col text-center">
                <h2>Sign Up Form - Created by Liam Docherty</h2>
                <img src="imgs/icon-person-512.png" alt="Avatar" style="width:15%" class="avatar">
              </div>
          </div>


         <!-- FORM -->
         <form action="register.php" method="post">
       <div class="inner_container text-center animated bounceInDown">
            <!-- user/password section -->
               <label><b>Username:</b></label>
               <input type="text" placeholder="Enter Username:" name="username" required>
               <label><b>Password:</b></label>
               <input type="password" placeholder="Enter Password:" name="password" required>
               <label><b>Same password as previously chosen:</b></label>
               <input type="password" placeholder="Enter the password that you chose the first time:" name="cpassword" required>
               <button name="register" class="sign_up_btn" type="submit">Sign Up</button>
                                 <hr>

               <a href="index.php"><button type="button" class="back_btn">Back to Login page. <i class="fa fa-arrow-left" aria-hidden="true"></i>
</button></a>
            </div>
         </form>
                   </div>

                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom animated bounceInDown">
    <div class="container">
        <a class="navbar-brand" href="#">SCRIPT MADE BY LIAM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Sign up page <i class="fas fa-sign-in-alt"></i></i>
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      </nav>

         <?php
            //Condition, checking the Register button is pressed
            if(isset($_POST['register']))
            {
            	//The data from the Form (username, password and cpassword) is stored into the @$username, @$password and @$cpassword Variables
            	//You use @ before a VARIABLE in PHP when you do not want to initialise the VARIABLE before using it
            	@$username=$_POST['username'];
            	@$password=$_POST['password'];
            	@$cpassword=$_POST['cpassword'];

            	// Check if the password is the same as the confirm password field
            	if($password==$cpassword)
            	{

            		////See "index.php" for comment for this section
            		$query = "SELECT * FROM login WHERE username='$username'";
            		//echo $query;

            	$query_run = mysqli_query($con,$query);
            	//echo mysql_num_rows($query_run);

            	if($query_run)
            		{
            			if(mysqli_num_rows($query_run)>0)
            			{
            				echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
            			}
            			else
            			{
            				$query = "INSERT INTO login values('$username','$password')";
            				$query_run = mysqli_query($con,$query);


            				if($query_run)
            				{
            					echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
            					$_SESSION['username'] = $username;
            					$_SESSION['password'] = $password;
            					header( "Location: homepage.php");
            				}
            				else
            				{
            					echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
            				}
            			}
            		}
            		else
            		{
            			echo '<script type="text/javascript">alert("DB error")</script>';
            		}
            	}
            	else
            	{
            		echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
            	}

            }
            else
            {
            }
            ?>
      </div>
   </body>
</html>
