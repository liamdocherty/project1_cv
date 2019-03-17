<?php
   //PHP method to use cache memory to store details
   session_start();
   //Makes the "config.php" file available to be executed from this page
   require_once('dbconfig/config.php');
   ?>
    <!DOCTYPE html>
    <html>

    <head>
        <!-- Site title, CSS external file and font awesome -->
        <title>Login Page - Created by Liam Docherty</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
        <link rel="stylesheet" type="text/css" href="login_script.css">
    </head>

    <body>
        <!-- Nav Bar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom animated bounceInDown">
            <div class="container">
                <a class="navbar-brand text-uppercase" href="https://www.linkedin.com/in/liam-docherty/">handcrafted BY Liam Docherty <i class="far fa-copyright"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="http://webbrowserinfo.96.lt">Go back to Homepage <i class="fa fa-home"></i>
                <span class="sr-only">(current)</span>
              </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Structure / Titles -->
        <div class="container">
            <div class="row animated bounceInDown">
                <div class="col text-center">
                    <h2>Login Form - Created by Liam Docherty</h2>
                    <img src="img/icon-person-512.png" class="mx-auto d-block" style="width:15%">
                </div>
            </div>

            <!-- THE FORM -->
            <!-- action="index.php" -- This shows where the PHP script that does the processing is located -->
            <!-- method="post" -- This aspect  identifies the action that will be performed with the data of the form. For example POST data to the "users" database -->
            <form action="index.php" method="post">
                <!-- Form/animation -->
                <div class="inner_container text-center animated bounceInDown">
                    <!-- Username section -->
                    <label><b>Username:</b></label>
                    <input type="text" placeholder="Enter Username:" name="username" required>
                    <!-- Password section -->
                    <label><b>Password:</b></label>
                    <input type="password" placeholder="Enter Password:" name="password" required>
                    <input type="hidden" name="login" value="true">
                    <!-- The Login button -->
                    <button class="login_button" type="submit">Login <i class="fas fa-sign-in-alt"></i></button>
                    <!-- The button that is linked to the "register.php" page -->
                    <a href="register.php">
                        <button type="button" class="register_btn">Register <i class="fas fa-user-plus"></i></button>
                    </a>
                    <hr>
                    <!-- Help -->
                    <a href="https://marketinginsidergroup.com/content-marketing/10-types-online-forms-use/">
                        <button type="button" class="register_btn">Help <i class="fas fa-question-circle"></i></button>
                    </a>
                </div>
            </form>
            <?php
            //Condition, checking the Login button is pressed
            if(isset($_POST['login']))
            {
                //The data from the Form (username & password) is stored into the @$username & @$passwordVariables
                //You use @ before a VARIABLE in PHP when you do not want to initialise the VARIABLE before using it
                @$username=$_POST['username'];
                @$password=$_POST['password'];

                //Statement that will SELECT the data from the "login" table, WHERE the Usename and Password typed match the typed ones
                //Once the database is checked, if login details match than it stores the data in the "$query" VARIABLE
                $query = "SELECT * FROM login WHERE username='$username' and password='$password' ";
                //echo $query;

                //This statement performs both the connection to the database using the values in the "$con" VARIABLE and
                //The SELECT statement stored in the "$query" VARIABLE
                $query_run = mysqli_query($con,$query);
                //echo mysql_num_rows($query_run);

                //IF the "$query_run" is run successfully, then
                if($query_run)
                {
                    //Check if the Username and Password exist in the database, if they exist
                    if(mysqli_num_rows($query_run)>0)
                    {
                    $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);

                    $_SESSION['username'] = $username; //Username handle aspect
                    $_SESSION['password'] = $password; //Password handle aspect

                    //Sent the user to the "homepage.php" page
                    header( "Location: homepage.php");
                    }
                    else
                    {
                        //IF NOT, Display the message below
                        echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
                    }
                }

                //IF the "$query_run" is NOT successful, then
                else
                {
                    //Display this message
                    echo '<script type="text/javascript">alert("Database Error")</script>';
                }
            }
            else
            {
            }
            ?>
    </body>

    </html>
