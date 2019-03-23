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
                               	<li  class="active" ><a href="AdminStudent.php">Students</a></li>
                                <li ><a href="AdminTeacher.php">Teachers</a></li>
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

                        <div class = "tab-pane fade in active" id = "AddCategory">

                        <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-2 col-md-offset-1">
                                    <div class="row">
                                        <div class="col-lg-6" style="padding-left: 50px;">
                                            <h3>Student Details</h3>
                                        </div>
                                    </div>  

                           

                            		<div class="col-lg-10">
                            		    <table class = "table table-bordered">
                                
                                		    <thead>
                                    		    <tr>
	                                        		<th>Student Id</th>
	                                        		<th>Student Name</th>
	                                        		<th>Student Email</th>
                                                    <th>Current Password</th>
                                                    <th>Insert Date</th>
                                                    <th>Expir Date</th>
	                                        		
                                    		    </tr>
                                		    </thead>
       
                                		    <tbody>
                                		        <?php

                                                

                                                    $Result =  mysql_query("SELECT * FROM student ");
                                                    if(mysql_num_rows($Result) > 0)
							                        {
								                        while ($data = mysql_fetch_assoc($Result))
                                                        {
                                                            $snic=$data['stu_nic'];
                                                           $pResult = mysql_query("SELECT * FROM insert_pincard WHERE inpin_sNic ='$snic'");
									                       $pindata = mysql_fetch_assoc($pResult);
                                                ?>
                                    		    <tr>
                                        		    <td><?php echo $data['stu_nic']; ?></td>
                                        		    <td><?php echo $data['stu_fname']." ".$data['stu_lname'];?></td>
                                        		    <td><?php echo $data['stu_email']; ?></td>
                                        		    <td><?php echo $pindata['inpin_no'];?></td>
                                                    <td><?php echo $pindata['inpin_insertDate'];?></td>
                                                    <td><?php echo $pindata['inpin_expirDate'];?></td>
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