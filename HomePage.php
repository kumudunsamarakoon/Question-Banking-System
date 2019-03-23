<?php

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
        Home
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/tmpltStyle.css"/>
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>

    

    <script>
        $(function() {
            $('#myCarousel').on('slide.bs.carousel', function () {              
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
                                <li class="active" ><a href="HomePage.php">Home</a></li>
                                <li ><a href="StudentLogin.php">Student</a></li>
                                <li><a href="TeaLogin.php">Teacher</a></li>
                                <li><a href="Help.php">Help</a></li>
                                
                            </ul>
                            
                        </div>

                    </div>

                </nav>

                <div class="row">
                    <div class="col-lg-12" >
                        <div id = "myCarousel" class = "carousel slide" data-ride="carousel">
   
                   <!-- Carousel indicators -->
                           <ol class = "carousel-indicators">
                              <li data-target = "#myCarousel" data-slide-to = "0" class = "active"></li>
                              <li data-target = "#myCarousel" data-slide-to = "1"></li>
                              <li data-target = "#myCarousel" data-slide-to = "2"></li>
                           </ol>   
                           
                           <!-- Carousel items -->
                           <div class = "carousel-inner">
                              <div class = "item active">
                                 <img src = "images\Subjects.png" alt = "First slide" style="height: 400px; width: 1150px;">
                              </div>
                              
                              <div class = "item">
                                 <img src = "images\mcq.jpg" alt = "Second slide" style="height: 400px; width: 1150px;">
                              </div>
                              
                              <div class = "item">
                                 <img src = "images\examPpr1.jpg" alt = "Third slide" style="height: 400px; width: 1150px;">
                              </div>
                           </div>
                           
                           <!-- Carousel nav -->
                           <a class = "carousel-control left" href = "#myCarousel" data-slide = "prev">&lsaquo;</a>
                           <a class = "carousel-control right" href = "#myCarousel" data-slide = "next">&rsaquo;</a>
                            
                        </div> 

                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <a href=StudentLogin.php>
                                <h2 style="text-align: center;">Student</h2>
                            </a>

                            <div class="row">
                                <div class="col-sm-12" style="padding-left: 30px;">
                                    <img src="images\time.jpg" style="height: 110px; width: 110px;">
                                    <br/><br/>
                                    <p> Hi, A/L and O/L students,</p>
                                    <p>We are willing to offer an opportunity to ajust your skil of doing mcq's.Both model papers and past papers are available.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <a href=TeaLogin.php>
                                <h2 style="text-align: center;">Teacher</h2>
                            </a>
                            <div class="row">
                                <div class="col-sm-12" style="padding-left: 30px;">
                                    <img src="images\teacher2.jpg" style="height: 110px; width: 110px;">
                                    <br/><br/>
                                    <p> Hi, Teachers,</p>
                                    <p>You can add new modle question papers to "Q-Hub". We are ready to pay for your added questions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <a href=Help.php>
                                <h2 style="text-align: center;">Help</h2>
                            </a>

                            <div class="row">
                                <div class="col-sm-12" style="padding-left: 30px;">
                                    <img src="images\help1.jpg" style="height: 110px; width: 110px;">
                                    <br/><br/>
                                    <p> Hi, Teachers and students,</p>
                                    <p>Do you have any doubts about "Q-Hub"...??? We are ready to help you. How to login, How to addup questions and so on. </p>
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