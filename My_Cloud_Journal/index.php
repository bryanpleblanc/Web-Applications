<?php include("login.php"); ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Cloud Journal</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  	
	
   <style>
   
   		.navbar-brand{
   			font-size:1.8em;
   			
   		}
   		
   		#topContainer{
   			background-image:url("images/sunflower.jpg");
   			height:400px;
   			width:100%;
   			background-size:cover;	
   		}
   		
   		#topRow {
   			margin-top:100px;
   			text-align:center;	
   		}
   
   		#topRow h1{
   			font-size:300%;
   
   		}
   		
   		.bold{
   			font-weight:bold;
   		}
   
   		.marginTop{
   			margin-top:30px;
   		
   		}
   		
   		.center{
   			text-align:center;
   		
   		}
   		
   		.title {
   			margin-top:100px;
   			font-size:300%;
   			
   		}
   		
   		#footer{
   			background-color: #B0D1FB;
   			padding-top:70px;
   			width:100%;
   		}
   		
   		,marginBottom{
   			margin-bottom:30px;
   			
   		}
   		
   		.appstoreImage{
   			width:250px;
   		
   		}
   </style>
    
  </head>

<!--Header Begin -->
<body data-spy="scroll" data-target=".navbar-collapse">
  <div class="navbar navbar-default navbar-fixed-top">
  	<div class="container">
  		<div class="navbar-header">
  			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  			</button>
  			
  			<a class="navbar-brand">My Cloud Journal</a>
  			
  		</div>
  		
  		<div class="collapse navbar-collapse">
  		
  			<form class="navbar-form navbar-right" method="post"> 
  				<div class="form-group">
  					<input type="email" name="loginemail" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginemail']); ?>" />																		   
  				</div>
  				<div class="form-group">
  					<input type="password" name="loginpassword" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['loginpassword']); ?>" />																					
  				</div>
  				<input type="submit" name= "submit" class="btn btn-success" value="Log In">
  			</form>
  			
  		</div>
  	</div>	
  </div>
<!--Header End -->
  
<!--Sign up Begin-->
 <div class="container contentContainer" id="topContainer">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3" id="topRow">
 			 <h1 class="marginTop">My Cloud Journal</h1>
 			 <p class="lead">Your own private journal, with you whenever or wherever you go.</p>
 			 
 			 
 			 
 			 <!-- PHP Alerts if an error occured during login or sign up and displays below sign up button/ form -->
 			 <?php
 			 	if ($error) {
 			 		echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
 			 	}
 			 	
 			 	if ($message) {
 			 		echo '<div class="alert alert-success">'.addslashes($message).'</div>';
 			 	}
 			 ?>
 			 
 			 
 			 <p class="bold marginTop">Interested? Sign Up Below!</p>
 			 
 			 <form class="marginTop" method="post"> 
 			 	<div class="form-group">
  					<label for="email">Email Address</label>
  					<input type="email" name="email" class="form-control" placeholder="Your Email" value="<? echo addslashes($_POST['email']); ?>" />																	   
				</div>
				
				<div class="form-group">
  					<label for="password">Password</label>
  					<input type="password" name="password" class="form-control" placeholder="Password" value="<? echo addslashes($_POST['password']); ?>" />																		  
				</div>

 			 	<input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg marginTop"/> 
			</form>
			
 			 </div>
		</div>	
  </div>
<!--Sign up End--> 
	

    <script>
    	/* Sets the height of the background image in relation to window size */ 
		$(".contentContainer").css("min-height",$(window).height());
    </script>
    
  </body>
</html>