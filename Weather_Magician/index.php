<!doctype html>
<html>
<head>
    <title>Weather Magician</title> <!--Changes tab title-->

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- BootStrap Links -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
	<!-- jQuery Links -->
	<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
	<!-- Javascript Links -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<!-- CSS Start -->
<style>

	html, body {           						/* When I first inserted picture only small portion at top displayed */
		height:100%;							/* I needed to set height to 100% ie full browser window */
	}
	.container {
		background-image:url("images/Desert_Lightning.jpg");
		width:100%;
		height:100%;
		background-size:cover; 					/* makes the image fit screen without the unusual scaling */
		background-position:center;				/* centers the image no matter how wide screen is */
		padding-top: 100px;
	}
	
	.center {
		text-align:center;
	}
	
	.circle, .circle:before{ 
  		position:absolute;
  		border-radius:210px;  
	}
	.circle {  
  		width:420px;
  		height:420px;
  		z-index:0;
  		margin:11%;  							/* moves circle closer to center of page */
  		padding:40px;
  		background: hsla(0, 100%, 100%, 0.6);   /* Controls color and transparency of white circle  */
	}
	
	.circle:before {
  		content:'';
  		z-index:-1;  
  		width:440px;
  		height:440px;
  		border: 6px solid hsla(10, 100%, 100%, 0.6); /* Controls color and transparency of white circle  */
  		top:-10px;
  		left:-10px; 
	}
	
	h1 {
		margin-top:75px;
		margin-bottom:40px;
	}
	
	.lead {
		font-size:120%;
	}
	
	.alert {
		margin-top:200px;
		max-width:800px;
		display:none; /* Don't want a display until city weather found */
	}
	

</style>


</head>
<body>

<!-- HTML Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 center">
				<div class="circle">
					<h1 class="center">Weather Magician</h1>
					<p class="lead center">Enter your city below to receive a forecast.</p>
					<form>
						<div class="form-group">
							<input type="text" name="city" class="form-control" id="city" placeholder="Eg. London, Paris, New York..."/>
						</div>
						<button id="getForecast" class="btn btn-success btn-lg">Get Forecast</button>
						
					</form>
					<div class="alert alert-success" id="success"></div>
					<div class="alert alert-danger" id="fail">Could not find weather data for that city. Please try again.</div>
					<div class="alert alert-danger" id="noCity">Please enter a city.</div>
				</div>
				
			</div>
		
		</div>
		
	</div>
	
	






<!-- JS / jQuery Start -->
<script>
	/*
	* Using Ajax to call php script and get results
	*/
	$("#getForecast").click(function(event) {
		event.preventDefault(); // this stops it from submitting the form and run our code instead 
		if ($("#city").val() != "") { // tests if city input is blank
			$.get("scrapper.php?city="+$("#city").val(), function( data ) { // heart of the code... gets the city from user and puts into php and returns  weather result
				
				if (data.length < 23) {
					$("#success").hide();
					$("#noCity").hide();
					$("#fail").fadeIn();
				} else {
					$("#fail").hide();
					$("#noCity").hide();
					$("#success").html(data).fadeIn();
				}
		 });
		 } else {
		 	$("#fail").hide();
		 	$("#success").hide();
		 	$("#noCity").fadeIn();
 		}

 	});
	

</script>
		


</body>
</html>