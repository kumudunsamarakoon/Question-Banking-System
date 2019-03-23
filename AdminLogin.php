<?php

session_start();

/*mysql_connect('localhost','root','');
mysql_select_db('qhub_db');*/

include('config.php');
 $LoginErr ='';
if(isset($_POST['sign']))
{
    $user_name = $_POST['inputEmail'];
    $password = $_POST['inputPassword']; 
   

    $query = "SELECT adm_id FROM admin WHERE adm_email = '$user_name' AND adm_pWord = '$password'";

    mysql_select_db('qhub_db');
    $retval = mysql_query( $query,$link);
    $row = mysql_fetch_array($retval, MYSQL_ASSOC);
                                    
    $result = mysql_query($query);
    if(mysql_num_rows($result) == 1)
    {
        
        $_SESSION['user'] = $row['adm_id'];
        header("location: AdminHome.php");

    }
    else
    {
         $LoginErr =' User name or password that you were entered is incorrect, Please check and try again...';
         //header("location: TeaLogin.php");
         //sweetAlert("Oops...","your user name or password is incorrect","error");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        Admin Log in
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/form.css" rel="stylesheet">
    <link href="css/tmpltStyle.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <style>
    	[class*="col-"] {
    	padding-top: 15px;
    	padding-bottom: 15px;
    	background-color: #eee;
    	border: 1px solid #ddd;
    	background-color: rgba(86, 61, 124, .15);
    	border: 1px solid rgba(86, 61, 124, .2);
		}
    </style>

    <script>
        $(document).ready(function () {
            // DOM ready

            // Test data
            /*
             * To test the script you should discomment the function
             * testLocalStorageData and refresh the page. The function
             * will load some test data and the loadProfile
             * will do the changes in the UI
             */
            // testLocalStorageData();
            // Load profile if it exits
            loadProfile();
        });

        /**
         * Function that gets the data of the profile in case
         * thar it has already saved in localstorage. Only the
         * UI will be update in case that all data is available
         *
         * A not existing key in localstorage return null
         *
         */
        function getLocalProfile(callback) {
            var profileImgSrc = localStorage.getItem("PROFILE_IMG_SRC");
            var profileName = localStorage.getItem("PROFILE_NAME");
            var profileReAuthEmail = localStorage.getItem("PROFILE_REAUTH_EMAIL");

            if (profileName !== null && profileReAuthEmail !== null && profileImgSrc !== null) {
                callback(profileImgSrc, profileName, profileReAuthEmail);
            }
        }

        /**
         * Main function that load the profile if exists
         * in localstorage
         */
        function loadProfile() {
            if (!supportsHTML5Storage()) {
                return false;
            }
            // we have to provide to the callback the basic
            // information to set the profile
            getLocalProfile(function (profileImgSrc, profileName, profileReAuthEmail) {
                //changes in the UI
                $("#profile-img").attr("src", profileImgSrc);
                $("#profile-name").html(profileName);
                $("#reauth-email").html(profileReAuthEmail);
                $("#inputEmail").hide();
                $("#remember").hide();
            });
        }

        /**
         * function that checks if the browser supports HTML5
         * local storage
         *
         * @returns {boolean}
         */
        function supportsHTML5Storage() {
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        }

        /**
         * Test data. This data will be safe by the web app
         * in the first successful login of a auth user.
         * To Test the scripts, delete the localstorage data
         * and comment this call.
         *
         * @returns {boolean}
         */
        function testLocalStorageData() {
            if (!supportsHTML5Storage()) {
                return false;
            }
            localStorage.setItem("PROFILE_IMG_SRC", "//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120");
            localStorage.setItem("PROFILE_NAME", "César Izquierdo Tello");
            localStorage.setItem("PROFILE_REAUTH_EMAIL", "oneaccount@gmail.com");
        }
    </script>


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1 class="logo">
                    <a title="q-hub">
                    <img alt="q-hub" src="images\q-hub.jpg" style="height: 50px; width: 200px; display: inline-block; top: 5px;">
                    </a>
                </h1>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav navbar-right" style="margin-right: 30px";>
                    <li >
                        <a href="HomePage.php"><span class="glyphicon glyphicon-home"></span> Home</a>
                    </li>
        
                </ul>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Width Image Header -->


    <!-- Page Content -->
    <div class="container">

        <h1 class="thick-heading">
        Administrator Sign In
      </h1>

        <!-- First Featurette -->
        <div class="featurette" id="about">
            <!------------------------code---------------start---------------->
            <div class="container">
                <div class="card card-container">
                    <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                    <img id="profile-img" class="profile-img-card" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                    <p id="profile-name" class="profile-name-card"></p>
                    <form class="form-signin" role="form" action=""  method="post">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                       <!-- <div id="remember" class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div> -->
                        <button class="btn btn-lg btn-primary btn-block btn-signin" name="sign" id="sign" type="submit">Sign in</button>
                    </form>
                    <!-- /form -->
                   <!-- <a href="#" class="forgot-password">
                	Forgot the password?
            		</a>-->
 <span class = "help-block" style="color: red ; text-align: center;">
                                       <?php echo $LoginErr;?>
                            </span>
                </div>
                <!-- /card-container -->
            </div>
            <!-- /container -->
            <!----Code------end------------------------------------>
        </div>

    </div>
    
        <!-- /.container -->
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    
                    
                        <br/><p>
                            © Copyright 2017. All Rights Reserved.
                        </p>
                    
                </div>
            </div>
        </div>

        
</body>

</html>