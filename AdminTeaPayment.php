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

if(isset($_GET['tid'])){
	$tid = $_GET['tid'];

    $sql = "SELECT * FROM teacher WHERE tea_nic= '$tid'";
    mysql_select_db('qhub_db');
    $retval = mysql_query( $sql,$link);
    $row = mysql_fetch_array($retval, MYSQL_ASSOC);
}
if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $sqlp = "SELECT * FROM unprepared_paper WHERE unppr_id= '$pid'";
    mysql_select_db('qhub_db');
    $retvalp = mysql_query( $sqlp,$link);
    $rowp = mysql_fetch_array($retvalp, MYSQL_ASSOC);
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
                                
                                <li><a href="AdminHome.php">Papers</a></li>
                               	<li ><a href="AdminStudent.php">Students</a></li>
                                <li  class="active"><a href="AdminTeacher.php">Teachers</a></li>
                                <li ><a href="AdminQHcards.php">Q-Hub Cards</a></li>
                                
                                
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

                        <ul class = "pager">
                            <li class = "previous"><a href = "AdminTeaUploadPapers.php?tid=<?php echo "$tid"; ?>">&larr; Papers Page</a></li>
                                
                        </ul>

                        <div class = "tab-pane fade in active">

                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-1">

                            <div class="row">
                                        <div class="col-lg-10" style="padding-left: 50px;">
                                            <h3> Payment</h3>
                                            <br/>

                                            <label style="font-size: larger;"><?php  echo $row['tea_nic']; ?></label><br/>
                                            <label style="font-size: large;"><?php  echo $row['tea_fName']." ".$row['tea_lName'] ; ?></label>
                                               
                                        </div>
                                        
                                    </div>  

                                    <br/>
                             <br/>       
                               
                                    
                                       <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                                  
                                                <label style="font-size: large;">Paper</label>
                                               
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                
                                                <label style="font-size: medium;"><?php  echo $rowp['unppr_title']; ?></label>
                                                
                                            </div>
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                                   
                                                <label style="font-size: large;">Bank Account </label>
                                                
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                
                                                <label style="font-size: medium;"><?php  echo $row['tea_bank']." - ".$row['tea_accNo'] ; ?></label>
                                               
                                            </div>
                                        </div>

                                <?php
                                
                                    if(isset($_POST['payment'])){

                                        $date = date("Y-m-d");
                                        $amount = $_POST['amount'];

                                        $query = "SELECT pay_id FROM payment WHERE pay_teaNic = '$tid' AND pay_upprId = '$pid'";

                                        mysql_select_db('qhub_db');
                                        $retval = mysql_query( $query,$link);
                                        $row = mysql_fetch_array($retval, MYSQL_ASSOC);
                                            
                                        $result = mysql_query($query);
                                        if(mysql_num_rows($result) == 0)
                                        {
                                        $errors= "";
                                        
                                               
                                            
                                                mysql_select_db('qhub_db');

                                                $sql ="INSERT INTO `qhub_db`.`payment` (`pay_id`, `pay_date`, `pay_teaNic`, `pay_amount`,`pay_upprId`,`pay_admId`) VALUES (NULL, '$date', '$tid', '$amount','$pid','$adminId')";

                                                
                                                $retval = mysql_query($sql,$link);

                                                if(! $retval){
                                                   die('Could not enter data: ' . mysql_error());
                                                }
                                ?>
                                          
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Successfuly Paid!</strong>
                                                </div>

                                <?php
                                        }else{
                                                $errors= "Already Paidd."

                                ?>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Faild!</strong> <?php print_r($errors); ?> please try again.
                                                </div> 
                                <?php
                                        }

                                       // }
                                    }
                              
                                ?>

                                    

                             
                                        <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label style="font-size: large;">Amount </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <input type="text" name="amount" id="amount" class="form-control input-lg" placeholder="Amount(Rs)"  tabindex="2">    
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
                                                    <button type = "submit" class = "btn btn-success btn-block btn-md" name="payment" id="payment">
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
                                            <h3>Previous Payments</h3>
                                        </div>
                                    </div>  

                           

                            		<div class="col-lg-8">
                            		    <table class = "table table-bordered">
                                
                                		    <thead>
                                    		    <tr>
	                                        		<th>Date</th>
	                                        		<th>Teacher NIC</th>
                                                    <th>Teacher Name</th>
	                                        		<th>Paper Name</th>
	                                        		<th>Amount</th>
                                    		    </tr>
                                		    </thead>
       
                                		    <tbody>
                                		        <?php

                                                    $catResult =  mysql_query("SELECT * FROM payment");
                                                    if(mysql_num_rows($catResult) > 0)
							                        {
								                        while ($data = mysql_fetch_assoc($catResult))
                                                        {
                                                            $pidR = $data['pay_upprId'];
                                                            $sqlres = "SELECT * FROM unprepared_paper WHERE unppr_id = '$pidR'";
                                                            mysql_select_db('qhub_db');
                                                            $retvalres = mysql_query( $sqlres,$link);
                                                            $rowres = mysql_fetch_array($retvalres, MYSQL_ASSOC);
                                                            $ppr_name= $rowres['unppr_title'];

                                                            $tnic = $data['pay_teaNic'];
                                                            $sqlrest = "SELECT * FROM teacher WHERE tea_nic = '$tnic'";
                                                            mysql_select_db('qhub_db');
                                                            $retvalrest = mysql_query( $sqlrest,$link);
                                                            $rowrest = mysql_fetch_array($retvalrest, MYSQL_ASSOC);
                                                            $tea_namef= $rowrest['tea_fName'];
                                                            $tea_namel= $rowrest['tea_lName'];
                                                           
									
                                                ?>
                                    		    <tr>
                                                    <td><?php echo $data['pay_date']; ?></td>
                                        		    <td><?php echo $data['pay_teaNic']; ?></td>
                                                    <td><?php echo $tea_namef." " .$tea_namel; ?></td>
                                        		    <td><?php echo  $ppr_name ?></td>
                                        		    <td><?php echo $data['pay_amount']; ?></td>
                                        		    
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