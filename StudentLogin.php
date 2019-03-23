<?php
//error_reporting(E_ERROR);

session_start();

/*mysql_connect('localhost','root','');
mysql_select_db('qhub_db');*/

include('config.php');
 $LoginErr ='';
if(isset($_POST['sub']))
{

    $user_name = $_POST['Email'];
    $password = $_POST['Password']; 
    $today = date("Y-m-d");
    $td = strtotime($today);

   
    $query = "SELECT * FROM insert_pincard WHERE inpin_sNic = (SELECT stu_nic FROM student WHERE stu_email = '$user_name') AND inpin_no = $password";

    //$query = "SELECT inpin_sNic FROM insert_pincard WHERE inpin_sNic = (SELECT stu_nic FROM student WHERE stu_email = '$user_name') AND inpin_id = (SELECT pin_id FROM pin_card_number WHERE pin_no = '$password') ";

    mysql_select_db('qhub_db');
    $retval = mysql_query( $query,$link);
    $row = mysql_fetch_array($retval, MYSQL_ASSOC);

                                    
    $result = mysql_query($query);
    if(mysql_num_rows($result) == 1)
    {
        $expireDate = $row['inpin_expirDate'];
        $exd = strtotime($expireDate);
        if($exd>$td){
            $_SESSION['user'] = $row['inpin_sNic'];
            header("location: StuHome.php");
        }
       
        $LoginErr = 'Your Q-Hub card was expired. Please buy a new one.';
    }
    else
    {
         $LoginErr =' User name or password incorrect, Please check and try again...';
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
        StudentLogin
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/tmpltStyle.css"/>
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>

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
                                <li class="active"><a href="StudentLogin.php">Student</a></li>
                                <li ><a href="TeaLogin.php">Teacher</a></li>
                                <li><a href="Help.php">Help</a></li>
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right" style="margin-right: 36px";>
                                <li>
                                    <a class="btn btn-default btn-outline btn-circle" data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign in</a>
                                </li>
                            </ul>
                            <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse2">
                                <form name="stuLog_form" class="navbar-form navbar-right form-inline" role="form" action="" method="post">
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

                 <div class = "panel panel-default">
                    
                        <h1 class="thick-heading">
                        Register new Student<br/><br/>
                        </h1>


               
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                                <form role="form"  method="post" action="">
                                    <h2>Please Sign Up </h2>
                                    <hr class="colorgraph">
                                    
                 <?php
                

                if(isset($_POST['reg'])){

                    if(! $link ) {
                       die('Could not connect: ' . mysql_error());
                    }
            

                    if(! get_magic_quotes_gpc() ) {
                        $stu_fname = addslashes ($_POST['first_name']);
                        $stu_lname = addslashes ($_POST['last_name']);
                    }else {
                       $stu_fname = $_POST['first_name'];
                       $stu_lname = $_POST['last_name'];
                    }
                    $stu_nic = $_POST['snic'];
                    $stu_email = $_POST['email'];
                    $pin = $_POST['pin'];
                   
                    $errors= "";

                    mysql_select_db('qhub_db');

                    $sqlex = "SELECT inpin_no FROM insert_pincard WHERE inpin_no ='$pin'";
                    $resultex = mysql_query($sqlex);
                    if(mysql_num_rows($resultex) == 0)
                    {


                        $sql1 = "SELECT pin_no FROM pin_card_number WHERE pin_no = '$pin'";

                        $retval1 = mysql_query( $sql1,$link);
                        $row = mysql_fetch_array($retval1, MYSQL_ASSOC);
                        $pno=$row['pin_no'];
                        $result = mysql_query($sql1);
                        if(mysql_num_rows($result) == 1)
                        {

                           
                            $sqlSt = "SELECT stu_nic FROM student WHERE stu_nic = '$stu_nic'";
                            $resultSt = mysql_query($sqlSt);
                            if(mysql_num_rows($resultSt) == 0)
                            {   

                                $sql ="INSERT INTO `qhub_db`.`student` (`stu_nic`, `stu_fName`, `stu_lName`, `stu_email`) VALUES ('$stu_nic', '$stu_fname', '$stu_lname', '$stu_email')";

                                $retval = mysql_query($sql,$link);

                                if(! $retval){
                                    $errors=" You can not be registered.";
                                    die('Could not enter data: ' . mysql_error());
                                }
                                else{

                                    ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> You have been successfully registered.
                                    </div>

                                    <?php
                                }

                            }

                            $errors="You are already Q-HUB student.";

                            $pin_instD = date("Y-m-d");
                            $offset = strtotime("+1 years");
                            $pin_expD = date("Y-m-d",$offset);

                            $sql2 = "INSERT INTO `qhub_db`.`insert_pincard` (`inpin_no`, `inpin_sNic`, `inpin_insertDate`,`inpin_expirDate`) VALUES ('$pno','$stu_nic', '$pin_instD', '$pin_expD')";
                
                            $retval2 = mysql_query($sql2,$link);

                            if(! $retval2){
                                die('Could not enter data to insert_pincard: ' . mysql_error());
                            }


                            ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> Your account has been successfully recharged.
                                    </div>

                            <?php




                        }else{
                            $errors="Q-Hub card number is invalid. Please try again.";
                        }

                        //header("location: StudentLogin.php");

                            


                    }//expin
                    else{
                        $errors = "This Q-Hub card was already used. Please try again.";
                    }
?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                <strong> Registrion Faild!</strong> <?php print_r($errors); ?>
                        </div> 

<?php
                    //}

                    mysql_close($link);

                }





                ?>
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
                                        <input type="text" name="snic" id="snic" class="form-control input-lg" placeholder="NIC" tabindex="3">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                            
                                    </div>
                                    <div class="form-group">
                                            <input type="password" name="pin" id="pin" class="form-control input-lg" placeholder="Pin Card Number" tabindex="7">
                                    </div>  
                                   
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-3 col-md-3">
                                            <span class="button-checkbox">
                                                <button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
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
                                            
                                        </div>
                                         <div class="col-xs-12 col-md-6">
                                            <input type="submit" value="Register" name="reg" id="reg" class="btn btn-primary btn-block btn-lg" tabindex="7">
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