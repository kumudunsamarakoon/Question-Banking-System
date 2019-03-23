<?php
include('config.php');
session_start();


if(isset($_GET['id']) && $_GET['id'] == 'logout')
{
    $_SESSION['user'] = '';
}

if(!empty($_SESSION['user'])){

    $teaId = $_SESSION['user'];
    $sql = "SELECT * FROM teacher WHERE tea_nic= '$teaId'";
    mysql_select_db('qhub_db');
    $retval = mysql_query( $sql,$link);
    $row = mysql_fetch_array($retval, MYSQL_ASSOC);

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
        Teacher Home
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/tmpltStyle.css"/>
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>

    
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
              <!--  <ul class="nav navbar-nav navbar-right" style="margin-right: 36px;">
                                
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
                            <ul class="nav navbar-nav navbar-right" style="margin-right: 36px">
                                <li>
                                    <a class="btn btn-default btn-outline btn-circle" id="logout"  href="TeaLogin.php" >Sign out</a>
                                </li>
                            </ul>
                            
                            
                        </div>

                    </div>

                </nav>
                <div class = "panel panel-default">
                    <ul id = "myTab" class = "nav nav-tabs">
                        <li class = "active">
                            <a href = "#uploadPapers" data-toggle = "tab">
                                Upload Papers
                            </a>
                        </li>
   
                        <li><a href = "#update" data-toggle = "tab">Personal Details</a></li>
                        <li><a href = "#payment" data-toggle = "tab">Payments</a></li>
    
                    </ul>

                    <div id = "myTabContent" class = "tab-content">

                        <div class = "tab-pane fade in active" id = "uploadPapers">

                            <div class="row">
                                <div class="col-lg-6" style="padding-left: 50px;">
                                    <h2>Upload new Papers</h2>
                                </div>
                            </div>  

                           
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-1">

                                <?php
                                
                                    if(isset($_POST['submitppr'])){

                                         $pTeaNic=$_SESSION['user'];
                                        $pTittle=$_POST['tittle'];
                                        $pSubject=$_POST['subject'];
                                        $pMedium=$_POST['medium'];
                                        $pLevel=$_POST['level'];
                                        $pUploadDate = date("Y-m-d");
                                        

                                       
                                        //header("location: TeaLogin.php");
                                        if(isset($_FILES['inputfile'])){
                                            $errors= "";
                                              $file_name = $_FILES['inputfile']['name'];
                                              $file_size =$_FILES['inputfile']['size'];
                                              $file_tmp =$_FILES['inputfile']['tmp_name'];
                                              $file_type=$_FILES['inputfile']['type'];
                                           //   $file_ext=strtolower(end(explode('.',$_FILES['inputfile']['name'])));
                                              
                                             // $expensions= array("jpeg","jpg","png","pdf");
                                              
                                             /* if(in_array($file_ext,$expensions)=== false){
                                                 $errors[]="extension not allowed, please choose a JPEG , PNG  or PDF file.";
                                              }*/

                                              $sqlpprttl= "SELECT unppr_id FROM unprepared_paper WHERE unppr_title ='$pTittle'";
                                              $rstpprttl=mysql_query($sqlpprttl);
                                              if(mysql_num_rows($rstpprttl) > 0){
                                                $errors ="Sorry, This titled Paper is already exists.";
                                              }

                                              $sqlppr= "SELECT unppr_id FROM unprepared_paper WHERE unppr_name ='$file_name'";
                                              $rstppr=mysql_query($sqlppr);
                                              if(mysql_num_rows($rstppr) > 0){
                                                $errors ="Sorry, file already exists.";
                                              }
                                              if(!$file_tmp){
                                                $errors ="No file selected. Please upload again.";
                                              }

                                              if (file_exists($file_name)) {
                                                $errors ="Sorry, file already exists.";
                                                
                                              }
                                              
                                              if($file_size > 2097152){
                                                 $errors='File size must be excately 2 MB';
                                              }
                                              
                                              if(empty($errors)==true){
                                                 move_uploaded_file($file_tmp,"TeacherUploadPapers/".$file_name);


                                                mysql_select_db('qhub_db');

                                                $sql ="INSERT INTO `qhub_db`.`unprepared_paper` (`unppr_id`,`unppr_uploadDate`,`unppr_level`,`unppr_subject`,`unppr_medium`,`unppr_title`,`unppr_name`,`unppr_teaNic`) VALUES (NULL ,'$pUploadDate','$pLevel','$pSubject','$pMedium','$pTittle','$file_name','$pTeaNic')";

                                                
                                                $retval = mysql_query($sql,$link);

                                                if(! $retval){
                                                   die('Could not enter data: ' . mysql_error());
                                                }
                                        ?>
                                          
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Success!</strong> Your Paper has been successfully uploaded.
                                                </div>

                                        <?php
                                              }else{

                                        ?>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Faild!</strong> <?php print_r($errors); ?> please try again.
                                                </div> 
                                <?php
                                              }

                                        }
                                    }
                              
                                ?>

                                    
                               
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Tittle of the Paper</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <input type="text" name="tittle" id="tittle" class="form-control input-lg" placeholder="Tittle of the Paper" tabindex="2">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Level of Paper</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                   <select class = "form-control" name="level" id="level">
                                                        <option>O/L</option>
                                                        <option>A/L</option>
                                                    </select>     
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Medium</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                   <select class = "form-control" id="medium" name="medium">
                                                        <option>Sinhala</option>
                                                        <option>English</option>
                                                        <option>Tamil</option>
                                                    </select>     
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Subject</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <input type="text" name="subject" id="subject" class="form-control input-lg" placeholder="Subject"  tabindex="2">    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Browse Paper</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <input type = "file" id = "inputfile" name="inputfile" class="form-control input-lg"  tabindex="2">    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                           
                                               <div class="form-group">
                                                    <button type = "submit" class = "btn btn-danger btn-block btn-md" data-dismiss = "form" name="cancel" id="cancel">
                                                    Cancel
                                                    </button>
                                                </div>
                                            </div>    
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group">
                                                    <button type = "submit" class = "btn btn-success btn-block btn-md" name="submitppr" id="submitppr">
                                                    Ok
                                                    </button> 
                                                </div>
                                            </div>
                                        </div>   
                                          
                                        
                                    </form>
                                </div>
                            </div>
                        
                        </div> <!-- upload Papers -->

                        <div class = "tab-pane fade" id = "payment">

                            <div class="row">
                                <div class="col-lg-6" style="padding-left: 50px;">
                                    <h2>Payment Details</h2>
                                    <h4><?php echo $row['tea_fName']. " ".$row['tea_lName']?></h4>
                                </div>
                            </div>

                            <div class="row">
                            <div class=" col-lg-8" style="padding-left: 50px;">

                            <table class = "table table-bordered">
                                
       
                                <thead>
                                    <tr>
                                        <th>Upload Date</th>
                                        <th>Paper</th>
                                        <th>Payement Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
       
                                <tbody>

                                <?php

                                        $Result =  mysql_query("SELECT * FROM unprepared_paper WHERE unppr_teaNic = '$teaId'");
                                        if(mysql_num_rows($Result) > 0)
                                        {
                                            while ($data = mysql_fetch_assoc($Result))
                                            {
                                         
                                                $upid= $data['unppr_id'];
                                                $sqlres = mysql_query("SELECT * FROM payment WHERE pay_upprId = '$upid'");
                                                $rowres = mysql_fetch_assoc($sqlres);

                                ?>
                                    <tr>
                                        <td><?php echo $data['unppr_uploadDate']; ?></td>
                                        <td><?php echo $data['unppr_title']; ?></td>
                                        <td><?php echo $rowres['pay_date'];?></td>
                                        <td><?php echo $rowres['pay_amount'];?></td>
                                    </tr>
          <?php

      }

  }


          ?>
                                    
                                </tbody>
        
                            </table>

                            </div>
                            </div>  

                        <!--    <ul class = "pager">
                                <li class = "previous"><a href = "#">&larr; Older</a></li>
                                <li class = "next"><a href = "#">Newer &rarr;</a></li>
                            </ul>  -->
                    
                        </div> <!--payment -->
   
                        <div class = "tab-pane fade" id = "update">
                                      

                             <?php
                                 include('config.php');
                                if(!empty($_SESSION['user'])){

                                    $tea_user = $_SESSION['user'];
                                  
                                    if(! $link ) {
                                       die('Could not connect: ' . mysql_error());
                                    }
                            
                                    $sql = "SELECT tea_nic, tea_fName, tea_lName, tea_bank, tea_accNo, tea_email, tea_telephone FROM teacher WHERE tea_nic= '$tea_user'";
                                    mysql_select_db('qhub_db');
                                    $retval = mysql_query( $sql,$link);
                                    $row = mysql_fetch_array($retval, MYSQL_ASSOC);
                                  
                                    mysql_close($link);
                                   
                                   /*if(isset($_POST['update'])){

                                        if(! $link ) {
                                        die('Could not connect: ' . mysql_error());
                                        }

                                        $ufname=$_POST['ufname'];
                                        $ulname=$_POST['ulname'];
                                        $uemail=$_POST['uemail'];
                                        $utele=$_POST['utele'];
                                        $ubank=$_POST['ubank'];
                                        $uacc=$_POST['uacc'];

                                        $sqlUp ="UPDATE `qhub_db`.`teacher` SET `tea_fName` = '$ufname', `tea_lName`= '$ulname' , `tea_email` = '$uemail', `tea_telephone` = '$utele', `tea_bank` = '$ubank', `tea_accNo` = '$uacc' WHERE `teacher`.`tea_nic` = '$tea_user'";
                                     
                                        $retval2 = mysql_query( $sqlUp,$link);

                                        if(! $retval2){
                                            die('Could not update data: ' . mysql_error());
                                        }
                                        //header("location: TeacherHome.php");
                                         //$_SESSION['user'] = '';
                                         //header("location: TeaLogin.php");
                                        mysql_close($link);
                                    }*/

                                }

                            ?>

                             <!-- <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Success!</strong> Your Personal information has been updated.
                                </div>

                                <?php
                                    //}else{

                                ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Faild!</strong> Error updating data. please try again.
                                </div> -->
                                <?php
                                      /*  }

                                    }

                                }*/
                                ?>

                                

                            <div class="row">
                                <div class="col-lg-6" style="padding-left: 50px;">
                                    <h2> Peronal information </h2>
                                   
                               

                                  <!--  <form role="form">
                                        <div class="form-group">
                                            <label for="InputName" style="font-size: medium;" >Password</label><br/>
                                            <a href="#" data-toggle="modal" data-target="#signInModal">Change Password</a>
                                        </div>



                                        <div class = "modal fade" id = "signInModal" tabindex = "-1" role = "dialog" 
                                            aria-labelledby = "myModalLabel" aria-hidden = "true">
               
                                            <div class = "modal-dialog">
                                                <div class = "modal-content">
                     
                                                    <div class = "modal-header">
                                                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                                                        &times;
                                                        </button>
                        
                                                        <h4 class = "modal-title" id = "myModalLabel">
                                                        Sign In Your Account
                                                        </h4>
                                                    </div>
                     
                                                    <div class = "modal-body">
                                                        Please enter your email address here.
                                                        <br/><br/>
                                                        <div class="form-group">
                                                            <input type="text" name="email" id="email" class="form-control input-lg" placeholder="E-mail" tabindex="3">
                                                        </div>
                                                        Please enter your password here.
                                                        <br/><br/>
                                                        <div class="form-group">
                                                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
                                                        </div>
                                                    </div>
                     
                                                    <div class = "modal-footer">
                                                        <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                                                        Cancel
                                                        </button>
                        
                                                        <button type = "button" class = "btn btn-primary" data-toggle = "modal" data-target = "#changePWord">
                                                        Next
                                                        </button>
                                                    </div>
                     
                                                </div>
                                            </div>
              
                                        </div> 

                                        <div class = "modal fade" id = "changePWord" tabindex = "-1" role = "dialog" 
                                            aria-labelledby = "myModalLabel" aria-hidden = "true">
               
                                            <div class = "modal-dialog">
                                                <div class = "modal-content">
                     
                                                    <div class = "modal-header">
                                                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                                                        &times;
                                                        </button>
                        
                                                        <h4 class = "modal-title" id = "myModalLabel">
                                                        Change Password
                                                        </h4>
                                                    </div>
                     
                                                    <div class = "modal-body">
                                                        New password
                                                        <br/><br/>
                                                        <div class="form-group">
                                                            <input type="password" name="nwPassword" id="nwPassword" class="form-control input-lg" placeholder="New Password" tabindex="3">
                                                        </div>
                                                        Confirm new password.
                                                        <br/><br/>
                                                        <div class="form-group">
                                                            <input type="password" name="cNwPassword" id="cNwPassword" class="form-control input-lg" placeholder="Confirm Password" tabindex="3">
                                                        </div>
                                                    </div>
                     
                                                    <div class = "modal-footer">
                                                        <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                                                        Cancel
                                                        </button>
                        
                                                        <button type = "button" class = "btn btn-primary" name="nwPwSub">
                                                        OK
                                                        </button>
                                                    </div>
                     
                                                </div>
                                            </div>
              
                                        </div> 
                               
                                    </form>-->

                               </div>
                            </div>

                                  
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-1">

                    
                              
                                    <form role="form" method="post">

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                                   
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Name </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                   <label style="font-size: medium;"><?php  echo $row['tea_fName']." ".$row['tea_lName'] ; ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                                   
                                                <div class="form-group">
                                                    <label style="font-size: medium;">NIC </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                   <label style="font-size: medium;"><?php  echo $row['tea_nic'] ; ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                                   
                                                <div class="form-group">
                                                    <label style="font-size: medium;">E-mail Address </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                   <label style="font-size: medium;"><?php  echo $row['tea_email'] ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                                   
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Telephone Number </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <label style="font-size: medium;"><?php  echo $row['tea_telephone'] ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                                   
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Bank </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                  <label style="font-size: medium;"><?php  echo $row['tea_bank'] ?></label>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                                   
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Bank Account Number </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                   <label style="font-size: medium;"><?php  echo $row['tea_accNo'] ?></label>
                                            </div>
                                        </div>

                                         <!--<div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                                 <div class="form-group">
                                                    <input name = "update" type = "submit" id = "update" value = "Update" class="btn-primary btn-lg">
                                                </div>  
                                                
                                            </div>
                                           
                                        </div>-->
                                    </form>

                                   </div>
                                    
                                </div>
                            </div>
      
                        </div> <!--update -->
                   
                    </div>


                </div> <!--panel panel-default -->
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