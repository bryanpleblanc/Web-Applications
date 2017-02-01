<? 

	session_start();
	
	include("connection.php");
	
	/* For saving text after a refresh or new login session */
	$query="SELECT diary FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";
	$result = mysqli_query($link,$query);
	$row = mysqli_fetch_array($result);
	$diary=$row['diary'];   // stores the text from user into an get variable to be used in html below

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cloud Journal</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  	
    
   <style>
   
   		.navbar-brand{
   			font-size:1.8em;
   			
   		}
   		
   		#topContainer{
   			background-image:url("sunflower.jpg");
   			height:400px;
   			width:100%;
   			background-size:cover;	
   		}
   		
   		#topRow {
   			margin-top:80px;
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
   		
   		 p {
  			font-size:90%;
  		}
  		
   </style>
    
  </head>
  
<!--Header Begin -->
<body data-spy="scroll" data-target=".navbar-collapse">

  <div class="navbar navbar-default navbar-fixed-top">
  	<div class="container">
  		<div class="navbar-header pull-left">
  			<a class="navbar-brand">My Cloud Journal</a>
  		</div>
  		
  		<div class="pull-right">
  			<ul class= "navbar-nav nav">
  				<!-- If logout is clicked takes back to index.php and get variable logout is set to 1, there is a function on index.php/ login.php that will handle this variable -->
  				<li><a href="index.php?logout=1">Log Out</a></li>
  			</ul>
  		</div>
  		
  	</div>	
  </div>
  <!--Header End --> 
  
  
  
  <!-- Textarea Box Begin-->
 <div class="container contentContainer" id="topContainer">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3" id="topRow">
  				
  				<p> Autosave activated. </p>
  				<!-- the get variable from php code from top of page is inserted here to be displayed in the textarea-->
 				<textarea class="form-control"><?php echo $diary; ?></textarea>
 			 </div>
		</div>
  </div>
    <!-- Textarea Box End-->

    <script>
    
    	/* Sets the height of the background image in relation to window size */ 
		$(".contentContainer").css("min-height",$(window).height());
    
    	/* Sets the height of the textarea in relation to window size */
    	$("textarea").css("height",$(window).height()-300);
    	
    	/* Waits for user to enter text in textarea to automatically save text to database */
    	$("textarea").keyup(function() {
    		$.post("updatediary.php", {diary:$("textarea").val()} );
    	});

    </script>
    
  </body>
</html>