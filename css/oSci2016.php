<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        Science
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
                                <li ><a href="TeaLogin.php">Teacher</a></li>
                                <li><a href="Help.php">Help</a></li>
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right" style="margin-right: 36px";>
                                <li>
                                    <a class="btn btn-default btn-outline btn-circle" data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign out</a>
                                </li>
                            </ul>
                           
        
                            </ul>
                        </div>

                    </div>

                </nav>
                
                    <div class="row">
                        <div class="col-lg-12">
                
                        <ol class = "breadcrumb">
                            <li ><a href="stuHome.php">Student</a></li>
                            <li class="active">Science-2016(O/L)</li>

                        </ol>    
                        <h2 style="color: darkblue;">Science-2016(O/L)</h2>
                        <h3 style="color: darkblue";>Full Paper</h3><br/>
                        
                        <div class="col-lg-12" style="background-color: white">
                        	Time Remaining<br/><br/>
                        	<div class = "progress" >
   								<div class = "progress-bar progress-bar-danger" role = "progressbar" 
      									aria-valuenow = "60" aria-valuemin = "0" aria-valuemax = "100" style = "width: 10%;">
      
      								<span class = "sr-only">10% Complete (danger)</span>
   								</div>
							</div>

                        	<form name="question">
                        		Go to question <input type="text" name="qNo" style="width: 50px">
                        	</form>
                        	<br/>
                        	<a title="q-hub">
                    			<img alt="q-hub" src="images\2012oLScience 7.jpg" style="height: 400px; width: 800px; display: inline-block; top: 100px;">
                    		</a>

                    		<div class="row">

                    		<div class="col-lg-12" >

                    		<label for = "name">Select Your Answer </label>

							<div>
   								<label class = "checkbox-inline">
      							<input type = "checkbox" id = "inlineCheckbox1" value = "option1">  1
   								</label>
   
   								<label class = "checkbox-inline">
      							<input type = "checkbox" id = "inlineCheckbox2" value = "option2">  2
   								</label>
   
   								<label class = "checkbox-inline">
      							<input type = "checkbox" id = "inlineCheckbox3" value = "option3">  3
   								</label>
   
   								<label class = "checkbox-inline">
      							<input type = "checkbox" id = "inlineCheckbox4" value = "option4">  4
   								</label>
   
   								<label class = "checkbox-inline">
      							<input type = "checkbox" id = "inlineCheckbox5" value = "option5">  5
   								</label>
							</div>

							<br/>
                    		<div class="col-lg-12" >

   								<a href = "#" class = "btn btn-success btn disabled" role = "button">Previous Question</a>
   								<div class = "pull-right">
   									<a href = "#" class = "btn btn-success " role = "button">Next Question</a>
   								</div>
                    		</div>
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