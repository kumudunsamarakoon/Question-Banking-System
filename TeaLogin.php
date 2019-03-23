<?php

session_start();

/*mysql_connect('localhost','root','');
mysql_select_db('qhub_db');*/

include('config.php');
 $LoginErr ='';
if(isset($_POST['sub']))
{
    $user_name = $_POST['Email'];
    $password = $_POST['Password']; 
   

    $query = "SELECT tea_nic FROM teacher WHERE tea_email = '$user_name' AND tea_pWord = '$password'";

    mysql_select_db('qhub_db');
    $retval = mysql_query( $query,$link);
    $row = mysql_fetch_array($retval, MYSQL_ASSOC);
                                    
    $result = mysql_query($query);
    if(mysql_num_rows($result) == 1)
    {
        
        $_SESSION['user'] = $row['tea_nic'];
        header("location: TeacherHome.php");

    }
    else
    {
         $LoginErr =' User name or password that you were entered is incorrect, Please check and try again...';
         //header("location: TeaLogin.php");
         //sweetAlert("Oops...","your user name or password is incorrect","error");
    }
}

/*if(isset($_GET['id']) && $_GET['id'] == 'logout')
{
    $_SESSION['user'] = '';
}*/

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
        TeacherLogin
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/tmpltStyle.css"/>
    <!--<link type="text/css" rel="stylesheet" href="css/sweetalert2.css"/> -->
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
   <!-- <script src="js/sweetalert2.js"></script> -->

    <style>
        .colorgraph {
            height: 5px;
            border-top: 0;
            background: #c4e17f;
            border-radius: 5px;
            background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        }

        [class*="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"] {
    padding-top: 15px;
    padding-bottom: 15px;
    background-color: #eee;
    border: 1px solid #ddd;
    background-color: rgba(86, 61, 124, .15);
    border: 1px solid rgba(86, 61, 124, .2);
}

        
    </style>
    <script>
        $(function () {
            $('.button-checkbox').each(function () {

                // Settings
                var $widget = $(this),
                    $button = $widget.find('button'),
                    $checkbox = $widget.find('input:checkbox'),
                    color = $button.data('color'),
                    settings = {
                        on: {
                            icon: 'glyphicon glyphicon-check'
                        },
                        off: {
                            icon: 'glyphicon glyphicon-unchecked'
                        }
                    };

                // Event Handlers
                $button.on('click', function () {
                    $checkbox.prop('checked', !$checkbox.is(':checked'));
                    $checkbox.triggerHandler('change');
                    updateDisplay();
                });
                $checkbox.on('change', function () {
                    updateDisplay();
                });

                // Actions
                function updateDisplay() {
                    var isChecked = $checkbox.is(':checked');

                    // Set the button's state
                    $button.data('state', (isChecked) ? "on" : "off");

                    // Set the button's icon
                    $button.find('.state-icon')
                        .removeClass()
                        .addClass('state-icon ' + settings[$button.data('state')].icon);

                    // Update the button's color
                    if (isChecked) {
                        $button
                            .removeClass('btn-default')
                            .addClass('btn-' + color + ' active');
                    } else {
                        $button
                            .removeClass('btn-' + color + ' active')
                            .addClass('btn-default');
                    }
                }

                // Initialization
                function init() {

                    updateDisplay();

                    // Inject the icon if applicable
                    if ($button.find('.state-icon').length == 0) {
                        $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
                    }
                }
                init();
            });
        });

         
   $(function () {
      $('#myTab li:eq(1) a').tab('show');
   });

    </script>

</head>

<body>


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
               <!-- <ul class="nav navbar-nav navbar-right" style="margin-right: 36px;">
                                
                    <li>
                        <a class="btn btn-default btn-outline btn-circle" data-toggle="collapse" href="#nav-collapse1" aria-expanded="false" aria-controls="nav-collapse1">Search</a>
                    </li>
                </ul>
                <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse1">
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" />
                        </div>
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </form>
                </div> -->
                <ul class="nav navbar-nav navbar-right" style="margin-right: 30px";>
                    <li >
                        <a href="AdminLogin.php"><span class="glyphicon glyphicon-user"></span> Administrator</a>
                    </li>
        
                </ul>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container -->
    </nav>


    <!-- Full Width Image Header -->


    <!-- Page Content -->
    <div class="container">

        

        <!-- First Featurette -->
        <div class="featurette" id="about">
            <!------------------------code---------------start---------------->
            <div class="container-fluid">

                <nav class="navbar navbar-inverse">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbar-collapse-2">
                            <ul class="nav navbar-nav">
                                <li ><a href="HomePage.php">Home</a></li>
                                <li ><a href="StudentLogin.php">Student</a></li>
                                <li class="active"><a href="TeaLogin.php">Teacher</a></li>
                                <li><a href="Help.php">Help</a></li>
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right" style="margin-right: 36px";>
                                <li>
                                    <a class="btn btn-default btn-outline btn-circle" data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign in</a>
                                </li>
                            </ul>
                            <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse2">
                                <form name="teaLog_form" class="navbar-form navbar-right form-inline" role="form" action="" method="post">
                                    <div class="form-group">
                                        <label class="sr-only" for="Email">Email</label>
                                        <input type="email" class="form-control" name="Email" id="Email" placeholder="Email" autofocus required />
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="Password">Password</label>
                                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required />
                                    </div>
                                    <button type="submit" class="btn btn-success" name="sub">Sign in</button>

                                   
                                </form>

                            </div>
        
                            <span class = "help-block" style="color: red ; text-align: center;">
                                       <?php echo $LoginErr;?>
                            </span>
                        </div>

                    </div>

                </nav>


                <?php
                

                if(isset($_POST['reg'])){

                    if(! $link ) {
                       die('Could not connect: ' . mysql_error());
                    }
            

                    if(! get_magic_quotes_gpc() ) {
                        $tea_fname = addslashes ($_POST['first_name']);
                        $tea_lname = addslashes ($_POST['last_name']);
                    }else {
                       $tea_fname = $_POST['first_name'];
                       $tea_lname = $_POST['last_name'];
                    }
                    $tea_nic = $_POST['tnic'];
                    $tea_bank = $_POST['bank'];
                    $tea_accNo = $_POST['AccNo'];
                    $tea_email = $_POST['email'];
                    $tea_telephone = $_POST['tele'];
                    $tea_password = $_POST['password'];
                    $tea_passConf = $_POST['password_confirmation'];

                    if($tea_password == $tea_passConf){
                        $tea_pword=$tea_password;
                    }else{
                        echo "confirmation is wrong";
                    }

                   
                    mysql_select_db('qhub_db');

                    $sql ="INSERT INTO `qhub_db`.`teacher` (`tea_nic`, `tea_fName`, `tea_lName`, `tea_accNo`, `tea_bank`, `tea_email`, `tea_telephone`, `tea_pWord`) VALUES ('$tea_nic', '$tea_fname', '$tea_lname', '$tea_accNo', '$tea_bank', '$tea_email', '$tea_telephone', '$tea_pword')";

                    
                    $retval = mysql_query($sql,$link);

                    if(! $retval){
                       die('Could not enter data: ' . mysql_error());
                    }
                   header("location: TeaLogin.php");

                    mysql_close($link);
                
                }else{

                ?>
                <div class = "panel panel-default"> 

                
                    <h1 class="thick-heading">
                        Register new Teacher<br/><br/>
                    </h1>

                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                            <form role="form" method="post" action="<?php $_PHP_SELF ?>">
                                <h2>Please Sign Up <small>It's free and always will be.</small></h2>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tnic" id="tnic" class="form-control input-lg" placeholder="NIC" tabindex="3">
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <select class = "form-control" name="bank" id="bank">
                                                <option  value="People's Bank" >People's Bank</option>
                                                <option value ="BOC">BOC</option>
                                                <option  value="Commercial bank">Commercial Bank</option>
                                                <option value="Sampath bank" >Sampath Bank</option>
                                                <option value="NSB" >NSB</option>
                                            </select>     
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="AccNo" id="AccNo" class="form-control input-lg" placeholder="Account No" tabindex="4">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="5">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tele" id="tele" class="form-control input-lg" placeholder="Telephone" tabindex="6">
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="7">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" onclick="myFunction()">Show Password
                                        </div>
                                    </div>
                                    <script>
                                        function myFunction() {
                                            var x = document.getElementById("password");
                                            if (x.type === "password") {
                                                x.type = "text";
                                            } else {
                                                x.type = "password";
                                            }
                                        }
                                    </script>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="8">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <input type="checkbox" onclick="myFunction1()">Show Password
                                        </div>
                                    </div>
                                    <script>
                                        function myFunction1() {
                                            var y = document.getElementById("password_confirmation");
                                            if (y.type === "password") {
                                                y.type = "text";
                                            } else {
                                                y.type = "password";
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                        <span class="button-checkbox">
                                            <button type="button" class="btn" data-color="info" tabindex="9">I Agree</button>
                                            <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
                                        </span>
                                    </div>
                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                        By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
                                    </div>
                                </div>

                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <input type="submit" name="reg" id="reg" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7">
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                        <!-- Modal -->
                    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
                                </div>
                            </div>
                                <!-- /.modal-content -->
                        </div>
                            <!-- /.modal-dialog -->
                    </div>
                        <!-- /.modal -->
                </div>

                <?php
            }


            ?>
            </div>

        </div>
       

            <!----Code------end------------------------------------>
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