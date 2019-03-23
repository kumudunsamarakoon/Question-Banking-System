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

if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
}

if(isset($_GET['qfolder'])){
    $q_folder = $_GET['qfolder'];
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
                            <li class = "previous"><a href = "AdminAddPapers.php">&larr; Papers Page</a></li>
                                
                        </ul>

                        <div class = "tab-pane fade in active" id = "AddQuestion">

                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-1">

                                    <div class="row">
                                        <div class="col-md-6" style="padding-left: 50px;">
                                            <h3> Add New Questions</h3>
                                        </div>
                                    
                                    
                                        <div class="col-md-6" style="padding-left: 50px;">
                                            
                                            <h2> <?php echo $q_folder; ?></h2>
                                        </div>
                                    </div>  


                                <?php
                               
                                    if(isset($_POST['addQ'])){

                                        
                                        $qno=$_POST['qno'];
                                        $qanswer=$_POST['qanswer'];
                                        $qcat=$_POST['qcat'];
                                        

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

                                            $sqlqn= "SELECT q_id FROM question WHERE q_no ='$qno' AND q_pprId = '$pid'";
                                            $rstqn=mysql_query($sqlqn);
                                            if(mysql_num_rows($rstqn) > 0){
                                                $errors ="Sorry, This question number  already exists.";
                                            }

                                            $sqlq= "SELECT q_id FROM question WHERE q_name ='$file_name'";
                                            $rstq=mysql_query($sqlq);
                                            if(mysql_num_rows($rstq) > 0){
                                                $errors ="Sorry, This Question already exists.";
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
                                                 move_uploaded_file($file_tmp,"prepared papers/".$q_folder."/".$file_name);

                                               
                                            
                                                mysql_select_db('qhub_db');

                                                $sql ="INSERT INTO `qhub_db`.`question` (`q_id`, `q_no`, `q_name`, `q_answer`,`q_category`,`q_pprId`) VALUES (NULL, '$qno', '$file_name', '$qanswer','$qcat','$pid')";

                                                
                                                $retval = mysql_query($sql,$link);

                                                if(! $retval){
                                                   die('Could not enter data: ' . mysql_error());
                                                }
                                ?>
                                          
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Success!</strong> Question has been successfully added.
                                                </div>

                                <?php
                                            }else{
                                                //$errors= "This Question is already exist."

                                ?>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Faild!</strong> <?php print_r($errors); ?> please try again.
                                                </div> 
                                <?php
                                            }

                                       }
                                    }





                                    //delete
                                  /*  if(isset($_POST['delete'])){
                                        $qno=$_POST['qno'];

                                    $deletequery = "DELETE FROM `qhub_db`.`question` WHERE `question`.`q_no` ='$qno' " ;

                                    $retval1 = mysql_query($deletequery,$link);

                                        if( $retval1){
                                           // die('Could not enter data: ' . mysql_error());
                                        
                                    
                                                
                                                
                                ?>
                                          
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>DELETED!</strong> Question has been successfully deleted.
                                                </div>

                                <?php
                                        }else{
                                                $errors= "This Question can not be deleted."

                                ?>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Faild!</strong> <?php print_r($errors); ?> please try again.
                                                </div> 
                                <?php
                                            }

                                       
                                    }
                              */
                              
                                ?>

                                    
                             <br/>
                             <br/>       
                               
                                   <form role="form" method="post" enctype="multipart/form-data">
                                       

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Question No</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <input type="text" name="qno" id="qno" class="form-control input-lg" placeholder="Question Number"  tabindex="1">    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Answer</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <input type="text" name="qanswer" id="qanswer" class="form-control input-lg" placeholder="The Answer"  tabindex="2">    
                                                </div>
                                            </div>
                                        </div>
                                       
                                       <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Question Category</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                                <div class="form-group">
                                                    <input type="text" name="qcat" id="qcat" class="form-control input-lg" placeholder="Question Category"  tabindex="3">    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-3 col-md-3">
                                           
                                                <div class="form-group">
                                                    <label style="font-size: medium;">Browse Question</label>
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
                                                    CANCEL
                                                    </button>
                                                </div>
                                            </div>    
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group">
                                                    <button type = "submit" class = "btn btn-success btn-block btn-md" name="addQ" id="addQ">
                                                    ADD
                                                    </button> 
                                                </div>
                                            </div>
                                        </div>   
                                          
                                        
                                    </form>
                                </div>
                          
                                <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-2 col-md-offset-1">
                                    <div class="row">
                                        <div class="col-lg-6" style="padding-left: 50px;">
                                            <h3>Questions</h3>
                                        </div>
                                    </div>  

                           

                                    <div class="col-lg-8">
                                        <table class = "table table-bordered">
                                
                                            <thead>
                                                <tr>
                                                    <th>Question Id</th>
                                                    <th>Question No</th>
                                                    <th>Question Name</th>
                                                    <th>The Answer</th>
                                                    <th>Qestion Category</th>
                                                    <th>Paper Id</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
       
                                            <tbody>
                                                <?php

                                                    $Result =  mysql_query("SELECT * FROM question WHERE q_pprId = '$pid' ");
                                                    if(mysql_num_rows($Result) > 0)
                                                    {
                                                        while ($data = mysql_fetch_assoc($Result))
                                                        {
                                                           
                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['q_id']; ?></td>
                                                    <td><?php echo $data['q_no']; ?></td>
                                                    <td><?php echo $data['q_name']; ?></td>
                                                    <td><?php echo $data['q_answer']; ?></td>
                                                     <td><?php echo $data['q_category']; ?></td>
                                                    <td><?php echo $data['q_pprId']; ?></td>
                                                    <td> <a href="AdminDeleteQuestion.php?qid=<?php echo $data['q_id'] ?>" class = 'btn btn-danger'  >Delete Question</a> </td>
                                                    
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