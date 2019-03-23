<?php
include('config.php');
session_start();


if(isset($_GET['id']) && $_GET['id'] == 'logout')
{
    $_SESSION['user'] = '';
}

if(!empty($_SESSION['user'])){

    $adminId = $_SESSION['user'];
}

if(isset($_GET['cid'])){
	$cid = $_GET['cid'];
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
       Administrator
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/tmpltStyle.css"/>
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>

    
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
                                
                                <li ><a href="AdminHome.php">Papers</a></li>
                               	<li ><a href="AdminStudent.php">Students</a></li>
                                <li ><a href="AdminTeacher.php">Teachers</a></li>
                                <li  class="active" ><a href="AdminQHcards.php">Q-Hub Cards</a></li>
                                
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right" style="margin-right: 36px";>
                                <li>
                                    <a class="btn btn-default btn-outline btn-circle" id="logout" name="logout"  href="AdminLogin.php" >Sign out</a>
                                </li>
                            </ul>
                           
        
                           
                        </div>

                    </div>

                </nav>
                
                <div class = "panel panel-default">
                    

                    <div id = "myTabContent" class = "tab-content">

                        <div class = "tab-pane fade in active" id = "AddCategory">

                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-1">

                                <?php
                                
                                    if(isset($_POST['addpin'])){

                                        
                                        $pin=$_POST['pin'];
                                      
                                        $errors= "";
                                        
                                                
                                                if($pin!=0){
                                                   
                                                
                                                mysql_select_db('qhub_db');
                                                $sql ="INSERT INTO `qhub_db`.`pin_card_number` (`pin_no`) VALUES ('$pin')";

                                                
                                                $retval = mysql_query($sql,$link);

                                                    if( $retval){
                                                   
                                                
                                ?>
                                          
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Success!</strong> New Pin Number has been successfully added.
                                                </div>

                                <?php
                                                    }else{

                                                        $errors= "This Pin Number is already exist.";

                                                    }

                                            }else{

                                             $errors="Please insert 10 digits pin number. ";

                                ?>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Faild!</strong> <?php print_r($errors); ?> please try again.
                                                </div> 
                                <?php
                                        }

                                      
                                    }
                              
                                ?>

                                    <div class="row">
                                        <div class="col-lg-10" style="padding-left: 50px;">
                                            <h3> Add New Pin Numbers</h3>
                                        </div>
                                    </div>  

                             <br/>
                             <br/>       
                               
                                    <form role="form" method="post" enctype="multipart/form-data">
                                       

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Pin Card Number</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <input type="text" name="pin" id="pin" class="form-control input-lg" placeholder="Pin Number"  tabindex="1">    
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
                                                    <button type = "submit" class = "btn btn-success btn-block btn-md" name="addpin" id="addpin">
                                                    Ok
                                                    </button> 
                                                </div>
                                            </div>
                                        </div>   
                                          
                                        
                                    </form>
                                </div>
                          
                                <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-2 col-md-offset-1">
                                    <div class="row">
                                        <div class="col-lg-6" style="padding-left: 50px;">
                                            <h3>Q-Hub Pin Card Numbers</h3>
                                        </div>
                                    </div>  

                           

                            		<div class="col-lg-8">
                            		    <table class = "table table-bordered">
                                
                                		    <thead>
                                    		    <tr>
	                                        		<th>Pin Number</th>
	                                        		<th>Current State</th>
	                                        		<th>Student Name</th>
	                                        		<th>Enserted Date</th>
                                                    <th>Expire Date</th>
	                                        		
                                    		    </tr>
                                		    </thead>
       
                                		    <tbody>
                                		        <?php
                                                    $today = date("Y-m-d");
                                                    $td = strtotime($today);
                                                    

                                                    $pinResult =  mysql_query("SELECT * FROM pin_card_number ");
                                                    if(mysql_num_rows($pinResult) > 0)
							                        {
								                        while ($data = mysql_fetch_assoc($pinResult))
                                                        {
                                                           $ex="";
                                                           $pin = $data['pin_no'];
                                                           $pResult = mysql_query("SELECT * FROM insert_pincard WHERE inpin_no ='$pin'");
                                                           $pindata = mysql_fetch_assoc($pResult);
                                                           if(mysql_num_rows($pResult)>0){
                                                                $state = "Used";
                                                                $expireDate = $pindata['inpin_expirDate'];
                                                                $exd = strtotime($expireDate);
                                                                if($exd<$td){
                                                                    $ex="(EXPIRED)";
                                                                }
                                                           }else{
                                                                $state = "Not Used";
                                                           }
                                                          

									
                                                ?>
                                    		    <tr>
                                        		    <td><?php echo $data['pin_no']; ?></td>
                                        		    <td><?php echo $state; ?></td>
                                        		    <td><?php echo $pindata['inpin_sNic']; ?></td>
                                        		    <td><?php echo $pindata['inpin_insertDate']; ?></td>
                                        		    <td><?php echo $pindata['inpin_expirDate']." ".$ex; ?></td>
                                    		    </tr>

                                                <?php
                                                            
                        		                        }

                                                        

                    		                        }

                                                ?>
                                		    </tbody>
                            		    </table>
                            		</div>

                                </div>
                        
                            </div> 
                
                        </div>


                    </div>
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