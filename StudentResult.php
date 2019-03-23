<?php
include('config.php');
session_start();


if(isset($_GET['id']) && $_GET['id'] == 'logout')
{
    $_SESSION['user'] = '';
}

if(!empty($_SESSION['user'])){

    $stuId = $_SESSION['user'];
    $sqlst = "SELECT * FROM student WHERE stu_nic = '$stuId'";
    mysql_select_db('qhub_db');
    $retvalst = mysql_query( $sqlst,$link);
    $rowst = mysql_fetch_array($retvalst, MYSQL_ASSOC);
    $stu_fname= $rowst['stu_fname'];
    $stu_lname= $rowst['stu_lname'];

}

/*if(isset($_GET['pid'])){
    $ppr_id=$_GET['pid'];

    $sqlres = "SELECT * FROM paper WHERE ppr_id = '$ppr_id'";
    mysql_select_db('qhub_db');
    $retvalres = mysql_query( $sqlres,$link);
    $rowres = mysql_fetch_array($retvalres, MYSQL_ASSOC);
    $ppr_name= $rowres['p_folder'];
}
*/

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
      Result
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

             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="margin-right: 36px;">
                                
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
                </div>
                <ul class="nav navbar-nav navbar-right" style="margin-right: 30px";>
                    <li >
                        <a href="AdminLogin.php"><span class="glyphicon glyphicon-user"></span> Administrator</a>
                    </li>
        
                </ul>
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
                                <li ><a href="HomePage.php">Home</a></li>
                                <li class="active"><a href="stuHome.php">Student</a></li>
                                <li ><a href="TeacherLogin.php">Teacher</a></li>
                                <li><a href="Help.php">Help</a></li>
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right" style="margin-right: 36px";>
                                <li>
                                    <a class="btn btn-default btn-outline btn-circle" id="logout" name="logout"  href="StudentLogin.php" >Sign out</a>
                                </li>
                            </ul>
                           
        
                            </ul>
                        </div>

                    </div>

                </nav>

                
                <div class = "panel panel-default">
                    

                    <div id = "myTabContent" class = "tab-content">

                         <ul class = "pager">
                            <li class = "previous"><a href = "StuHome.php">&larr; Welcome Page</a></li>
                                
                        </ul>



                        <div class = "tab-pane fade in active" >

                        <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-2 col-md-offset-1">

                                    <div class="row">
                                        <div class="col-lg-6" style="padding-left: 50px;">
                                            <h2><?php echo "$stu_fname $stu_lname"; ?> </h2>
                                            <h3>Previous Results </h3>
                                        </div>
                                    </div>  

                           

                            		<div class="col-lg-10">
                            		    <table class = "table table-bordered">
                                
                                		    <thead>
                                    		    <tr>
                                                    <th>Date</th>
	                                        		<th>Paper</th>
	                                        		<th>Marks</th>
                                                    
                                    		    </tr>
                                		    </thead>
       
                                		    <tbody>
                                		        <?php

                                                    $Result =  mysql_query("SELECT * FROM Result WHERE res_stuNic ='$stuId'");
                                                  
                                                    if(mysql_num_rows($Result) > 0)
							                        {
                                                       
								                        while ($data = mysql_fetch_assoc($Result))
                                                        {
                                                            $pidR = $data['res_pprId'];
                                                            $sqlres = "SELECT * FROM paper WHERE ppr_id = '$pidR'";
                                                            mysql_select_db('qhub_db');
                                                            $retvalres = mysql_query( $sqlres,$link);
                                                            $rowres = mysql_fetch_array($retvalres, MYSQL_ASSOC);
                                                            $ppr_name= $rowres['p_folder'];

                                                ?>
                                    		    <tr>
                                                    <td><?php echo $data['res_date'];?></td>
                                        		    <td><?php echo $ppr_name; ?></td>
                                        		    <td><?php echo $data['res_marks'];?></td>
                                        		    
                                                    
                                                    
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