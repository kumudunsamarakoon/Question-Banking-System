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
                                <li class="active"><a href="AdminHome.php">Papers</a></li>
                                <li ><a href="AdminStudent.php">Students</a></li>
                                <li ><a href="AdminTeacher.php">Teachers</a></li>
                                <li ><a href="AdminPinCard.php">Q-Hub Cards</a></li>
                                
                                
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
                            <li class = "previous"><a href = "AdminHome.php">&larr; Category Page</a></li>
                                
                        </ul>

                        <div class = "tab-pane fade in active" id = "AddPaper">

                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-1">

                                <?php
                                
                                    if(isset($_POST['addppr'])){

                                        
                                        $ptitle=$_POST['title'];
                                        $pfolder=$_POST['folder'];
                                        
                                        

                                       
                                        //header("location: TeaLogin.php");
                                        
                                            $errors= "";
                                             
                                        $query = "SELECT ppr_id FROM paper WHERE ppr_title = '$ptitle' AND ppr_catId = '$cid'";

                                        mysql_select_db('qhub_db');
                                        $retval = mysql_query( $query,$link);
                                        $row = mysql_fetch_array($retval, MYSQL_ASSOC);
                                            
                                        $result = mysql_query($query);
                                        if(mysql_num_rows($result) == 0)
                                        {
                                               
                                            
                                                mysql_select_db('qhub_db');

                                                $sql ="INSERT INTO `qhub_db`.`paper` (`ppr_id`, `ppr_title`, `p_folder`, `ppr_admId`,`ppr_catId`) VALUES (NULL, '$ptitle', '$pfolder', '$adminId','$cid')";

                                                
                                                $retval = mysql_query($sql,$link);

                                                if(! $retval){
                                                   die('Could not enter data: ' . mysql_error());
                                                }
                                ?>
                                          
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Success!</strong> Paper has been successfully added.
                                                </div>

                                <?php
                                        }else{
                                                $errors= "This Paper is already exist.";

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

                                    <div class="row">
                                        <div class="col-lg-10" style="padding-left: 50px;">
                                            <h3> Add New Paper</h3>
                                        </div>
                                    </div>  

                             <br/>
                             <br/>       
                               
                                   <form role="form" method="post" enctype="multipart/form-data">
                                       

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Paper Title</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <input type="text" name="title" id="title" class="form-control input-lg" placeholder="Title of the Paper"  tabindex="2">    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Folder Name</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <input type="text" name="folder" id="folder" class="form-control input-lg" placeholder="Question Folder Name"  tabindex="2">    
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
                                                    <button type = "submit" class = "btn btn-success btn-block btn-md" name="addppr" id="addppr">
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
                                            <h3>Papers</h3>
                                        </div>
                                    </div>  

                           

                                    <div class="col-lg-8">
                                        <table class = "table table-bordered">
                                
                                            <thead>
                                                <tr>
                                                    <th>Paper Id</th>
                                                    <th>Title</th>
                                                    <th>Question Folder</th>
                                                    <th>Admin</th>
                                                    <th>CAtegory Id</th>
                                                    <th>Action</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
       
                                            <tbody>
                                                <?php

                                                    $pprResult =  mysql_query("SELECT * FROM paper ");
                                                    if(mysql_num_rows($pprResult) > 0)
                                                    {
                                                        while ($data = mysql_fetch_assoc($pprResult))
                                                        {
                                                           
                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['ppr_id']; ?></td>
                                                    <td><?php echo $data['ppr_title']; ?></td>
                                                    <td><?php echo $data['p_folder']; ?></td>
                                                    <td><?php echo $data['ppr_admId']; ?></td>
                                                     <td><?php echo $data['ppr_catId']; ?></td>
                                                    <td> <a href="AdminAddQuestions.php?pid=<?php echo $data['ppr_id'] ?>&qfolder=<?php echo $data['p_folder'] ?>" class = 'btn btn-prime'  >Go to Questions</a> </td>
                                                    <td> <a href="AdminDeletePaper.php?pid=<?php echo $data['ppr_id'] ?>" class = 'btn btn-danger'  >Delete Paper</a> </td>
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