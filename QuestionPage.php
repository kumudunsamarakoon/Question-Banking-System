<?php
include('config.php');
session_start();


if(isset($_GET['id']) && $_GET['id'] == 'logout')
{
    $_SESSION['user'] = '';
}


if(isset($_GET['subject'])){
    $subject = $_GET['subject'];
        
}
if( isset($_GET['ppr_id'])){
    $ppr_id = $_GET['ppr_id'];

   $p_query = "SELECT p_folder FROM paper WHERE ppr_id='$ppr_id'";
  // $q_folder = mysql_query($p_query);
   $retval = mysql_query( $p_query,$link);
    $row = mysql_fetch_array($retval, MYSQL_ASSOC);
    $q_folder = $row['p_folder'];
}

if( isset($_GET['ppr_title'])){
    $title = $_GET['ppr_title'];
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
        Question
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/tmpltStyle.css"/>
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--<script src="js/subjectAjax.js"></script> -->
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
                    <img alt="q-hub" src="images\q-hub.jpg" style="height: 50px; width: 200px; display: inline-block; top: 5px; border-color: #000033">
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

                <div class="row">
                    <div class="col-lg-9 col-md-6"  >
                        <div class="col-lg-12 col-md-6" >
                
                            <ol class = "breadcrumb">
                                <li ><a href="stuHome.php">Student</a></li>
                                <li class="active"><?php echo "$subject"; ?></a></li>   

                            </ol>    
                            <h2 style="color: darkblue;"><?php echo "$subject-$title"?></h2>
                       
                            <div class = "panel panel-default">

                                   <!-- Time Remaining<br/><br/>
                                <div class = "progress" >
                                    <div class = "progress-bar progress-bar-danger" role = "progressbar" 
                                        aria-valuenow = "60" aria-valuemin = "0" aria-valuemax = "100" style = "width: 10%;">
      
                                        <span class = "sr-only">10% Complete (danger)</span>
                                    </div>
                                </div> -->
                            <br/>
                            

                            <?php


                                if(isset($_GET['q_id'])){

                                    $q_id=$_GET['q_id'];

                                    $count=0;

                                    $qq_query = "SELECT * FROM question WHERE q_pprId='$ppr_id'";
                                    $result = mysql_query("SELECT * FROM question WHERE q_pprId='$ppr_id'");
                                    $row_count = mysql_num_rows($result);
                                   

                                    while ($data = mysql_fetch_array($result)) {
                                       
                                       $imageID = $data['q_id'];
                                       $image_NAME = $data['q_name'];
                                       $image_No = $data['q_no'];

                                       if($imageID == $q_id){

                                            if(isset($_POST['confirm'])){

                                                $answer = $_POST['answer'];
                                                $sql="INSERT INTO `qhub_db`.`answertemp` (`anT_id`, `anT_qno`, `anT_qanswer`, `anT_qId`) VALUES (NULL, '$image_No', '$answer', '$q_id')";
                                                $retval = mysql_query($sql,$link);

                                                if(! $retval){
                                                     die('Could not enter data: ' . mysql_error());
                                                }
                                            }

                            ?>

                                        <div>
                                            <label>Question No  :</label> 
                                            <label><?php echo "$image_No"; ?></label>
                                        </div>
                                        <br/>
                            <?php

                                             echo '<img src="prepared papers/'.$q_folder.'/'.$image_NAME.'" style="height: 300px; width: 700px; display: inline-block; top: 100px;"/>';

                                            

                                             if($count != 0){

                                                $row_id_for_previous = $count - 1;
                                                $previous_img_id = mysql_result($result, $row_id_for_previous, 'q_id');

                            ?>
                                                <div class="row">
                                                    <div class="col-lg-8" >
                                                        <div class="col-lg-8" >
                                                            <label for = "name">Select Your Answer and Confirm it. </label>
                                                            <form role="form" action="" method="post">
                                                                <div class="form-group">
                                                                    <label class = "checkbox-inline">
                                                                        <input type = "radio" id = "answer" name="answer" value = "1">  1
                                                                    </label>
                        
                                                                    <label class = "checkbox-inline">
                                                                        <input type = "radio" id = "answer" name="answer" value = "2">  2
                                                                    </label>
                       
                                                                    <label class = "checkbox-inline">
                                                                        <input type = "radio" id = "answer" name="answer" value = "3">  3
                                                                    </label>
                       
                                                                    <label class = "checkbox-inline">
                                                                        <input type = "radio" id = "answer" name="answer" value = "4">  4
                                                                    </label>
                       
                                                                    <label class = "checkbox-inline">
                                                                        <input type = "radio" id = "answer" name="answer" value = "5">  5
                                                                    </label>
                                                                </div>
                                                <br/>
                                                                <div class="form-group">
                                                                    <input name = "confirm" type = "submit" id = "confirm" value = "Confirm" class="btn-primary btn-lg ">
                                                                </div> 

                                                            </form>
                                                        </div>
                                                <br/>

                                                        <div class="col-lg-12" >
                                                       

                            <?php

                                                            echo '<a href ="QuestionPage.php?ppr_id='.$ppr_id.'&q_id='.$previous_img_id.'&subject='.$subject.'&ppr_title='.$title.'" class = "btn btn-success "  type = "submit" id = "answerSub" name = "answerSub" >Previous Question</a>';



                            ?>
                                                        
                            <?php

                                              
                                             }

                                             if($count <$row_count - 1){

                                                $row_id_for_next = $count + 1;
                                                $next_img_id = mysql_result($result, $row_id_for_next,'q_id');

                            ?>

                                                            <div class = "pull-right">
                                                            
                            <?php
                                                                 echo '<a href ="QuestionPage.php?ppr_id='.$ppr_id.'&q_id='.$next_img_id.'&subject='.$subject.'&ppr_title='.$title.'" class = "btn btn-success "  type = "submit" id = "answerSub name" = "answerSub" >Next Question</a>';


                                                ?>
                                                            
                                                            </div><!-- pull right next-->
                                                        
                                                

                                                <?php

                                                header( "refresh:180;url=QuestionPage.php?ppr_id=$ppr_id&q_id=$next_img_id&subject=$subject&ppr_title=$title" );

                                             }


                                             break;

                                             ?>
</div>

                                             <?php
                                       }
                                       $count++;
                                    }
                                   
                                   
                                }
                                else{


                                    $q_query = "SELECT * FROM question WHERE q_pprId='$ppr_id'";
                                    $initial_result = mysql_query($q_query);
                                    $initial_img_name = mysql_result($initial_result, 0, 'q_name');
                                    $next_img_id = mysql_result($initial_result, 1,'q_id');

                                    echo '<img src="prepared papers/'.$q_folder.'/'.$initial_img_name.'" style="height: 300px; width: 700px; display: inline-block; top: 100px;"/>';

                                    ?>
                                    <div class="col-lg-8" >
                                    <div class="col-lg-12" >    
                                        <div class = "pull-right">

                                    <?php
                                    echo '<a href ="QuestionPage.php?ppr_id='.$ppr_id.'&q_id='.$next_img_id.'&subject='.$subject.'&ppr_title='.$title.'" class = "btn btn-success " role = "button">Next Question</a>';

                                    ?>

                                        </div>
                                    </div>
                                    </div>
                                    <?php

                                   
                                   
                                }

                            ?>

                           
<br/>
<br/>
                            

                            </div>
                            </div>
                    
                        
                                </div>
                            
                            </div> 
</div>
</div>
                   
                    <div class="col-lg-3 ">
                        <div class = "panel panel-primary">
                            <div class = "panel-heading">
                                <h3 class = "panel-title">Your Answers</h3>
                            </div>
                            <div class = "panel-body">
                                <div class="col-lg-10">
                                        <table class = "table table-bordered">
                                
                                            <thead>
                                                <tr>
                                                    <th>Question Number</th>
                                                    <th>Answer</th>

                                                   
                                                </tr>
                                            </thead>
       
                                            <tbody>
                                                <?php

                                                    $Resulttem =  mysql_query("SELECT * FROM answertemp ");
                                                    if(mysql_num_rows($Resulttem) > 0)
                                                    {
                                                        while ($datatem = mysql_fetch_assoc($Resulttem))
                                                        {
                                                          
                                                ?>
                                                <tr>
                                                    <td><?php echo $datatem['anT_qno']; ?></td>
                                                    <td><?php echo $datatem['anT_qanswer']?></td>
                                                    
                                                </tr>

                                                <?php
                                                             
                                                        }

                                                    }

                                                ?>
                                            </tbody>
                                        </table>

                                        <div class="col-lg-8" >
                                            <div class = "pull-right">

                                                <a href = "Result.php?pid=<?php echo "$ppr_id"; ?>"  class = "btn-danger btn-lg " role = "button" type="submit" name="result" id="result">Result</a> 
                               
                                            </div>

                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div><!--answer table -->
                    
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