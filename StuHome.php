
<?php
include('config.php');
session_start();


if(isset($_GET['id']) && $_GET['id'] == 'logout')
{
    $_SESSION['user'] = '';
}
/* //sr kyla dunna

if(isset($_GET))
{
    if(isset($_GET['subject']))
        $subject = $_GET['subject'];
}*/


if(!empty($_SESSION['user'])){

    $stuId = $_SESSION['user'];
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
        StudentHome
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
                </div>  -->
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
                    <div class="col-lg-8">
                        
                      
                       
                        <div  id="home" class="home">
                             <div class = "panel panel-default">

                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="images\time.jpg" style="height: 200px; width: 200px;">
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="images\welcome1.png" style="height: 200px; width: 300px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class= col-lg-8 style="padding-left: 50px;">
                                        <h4>Welcome to the "Question Banking System (Q-Hub)"</h4><br/>

                                        <p>We are willing to offer an opportunity to ajust your skil of doing mcq's.</p><br/>

                                        <p>When you have done a full paper, you will get the answer script and marks .</p>
                                    
                                        <!--<p>If you are willing do a "one by one question" then, you will get the answer instantly.</p><br/> -->

                                        <p>Both model papers and past papers are available.</p>
                                    </div>

                                    <div class= col-lg-8 style="padding-left: 50px;"">
                                        <a href="StudentResult.php?sid=<?php echo $stuId ?>"  style ="font-size: x-large;">My Previous Results</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class = "panel panel-primary">
                            <div class = "panel-heading">
                                <h3 class = "panel-title">O/L Subjects</h3>
                            </div>
                            <div class = "panel-body">
                                <ul id="oLSub">
                                    <li id="oScienceL"><a href="Subject.php?subject=Science&level=O/L" >Science</a></li> 
                                    <li id="oSinhalaL"><a href="Subject.php?subject=Sinhala&level=O/L" >Sinhala</a></li>
                                    <li id="oHistoryL"><a href="Subject.php?subject=History&level=O/L">History</a></li>
                                          
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class = "panel panel-primary">
                            <div class = "panel-heading">
                                <h3 class = "panel-title">A/L Subjects</h3>
                            </div>
                            <div class = "panel-body">
                                <label>Science Stream</label>
                                <ul id="aSci">
                                    <li id="aBiologyL"><a href="Subject.php?subject=Biology&level=A/L">Biology</a></li>
                                    <li id="aChemistryL"><a href="Subject.php?subject=Chemistry&level=A/L">Chemistry</a></li>
                                    <li id="aPhysicsL"><a href="Subject.php?subject=Physics&level=A/L">Physics</a></li>
                                        
                                </ul>
                                <label>Art Stream</label>
                                <ul id = "aArt">
                                    <li id="aLogicL"><a href="#">Logic</a></li>
                                    <li id="aGeographyL"><a href="#">Geography</a></li>
                                    <li id="aMediaL"><a href="#">Media</a></li>
                                    
                                </ul>
                                <label>Commerce Stream</label>
                                <ul id= "aCom">
                                    <li id="aEconL"><a href="#">Economics</a></li>
                                    <li id="aBusinessL"><a href="#">Business Study</a></li>
                                    <li id="aAccountsL"><a href="#">Accounts</a></li>
                                    
                                </ul>
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