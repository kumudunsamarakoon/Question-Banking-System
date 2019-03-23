<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        Help
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
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!--<ul class="nav navbar-nav navbar-right" style="margin-right: 36px;">
                                
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
                </div>-->
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
                                <li ><a href="TeaLogin.php">Teacher</a></li>
                                <li class="active"><a href="Help.php">Help</a></li>
                                
                            </ul>
                            
        
                           
                        </div>

                    </div>

                </nav>
                <div class = "panel panel-default">
                    <div class="row">
                    	<div class="col-lg-12" style="padding-left: 40px;">
                    		<img src="images\help1.jpg" style="height: 200px; width: 200px; display: inline-block; top: 5px;">
                    		<h4 style="color: blue;">Welcome to the "Q-Hub (Question Banking System)".</h4>
                    		<p style="font-size: medium; color: darkgreen; "> This website has been amiliorated to improve the ability of doing mcqs with best timing for O/L & A/L students.  </p>
                    		<p style="font-size: medium; color: darkgreen; "> Teachers can be added up allocated model papers corresponding to each subjects & a payments will be received from Q-Hub.</p>
                    		<br/><br/>
                    		<ul>
                                <li><a href="#LoginIn">Login to Q-Hub</a>
                                	<ul>
                                		<li><a href="#stuLog">Student Login</a></li>
                                		<li><a href="#teaLog">Teacher Login</a></li>
                                	</ul>
                                </li>
                                <li><a href="#AddQ ">How to addup papers</a></li>
                                  
                            </ul>

                            <div data-spy = "scroll" data-target = "#navbar-example" data-offset = "0" 
							   style = "height:200px; overflow:auto; position: relative;">
							   <h3 id = "LoginIn">Login to Q-Hub</h3>
							   <h4 id = "stuLog">Student Login</h4>

							   <p> Each student have had a personal account in Q-Hub. A new student must register with a new account for the login.</p>
						
							   <p> Username - Enter the e-mail address.</p>
							   <p> Password -  Q-Hub card pin number use as password. This Q-Hub card which can be bought from any communication or supper market  are valid for one year.</p>
							   
							   <h4 id = "teaLog">Teacher Login</h4>
							   <p> Each teacher have had a personal account in Q-Hub. A new teacher must register with a new account for the login.</p>
						
							   <p> Username - Enter the e-mail address.</p>
							   <p> Password - You can enter any password an you details any time.</p>

							    <h3 id = "AddQ">How to addUp papers</h3>
							    <p> Registerd teachers can be upload papers with answers.</p>
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