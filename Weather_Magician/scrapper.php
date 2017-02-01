
<!-- PHP Start -->
<?php


	/* 
	* Gets the city and removes spaces 
	*/
	$city=$_GET['city']; 
	$city = str_replace(" ", "", $city); 


	/* 
	* Inserts city name into URL
	* Searches source (using Regex) and looks between startText and endText for content
	* Saves content in matches[1] array
	*/
	$contents = @file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");	

	$startText = '3 Day Weather Forecast Summary:<\/b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">'; //needed to include \ in front of /b>
 	
 	
 	$endText = '<'; 
 	
	preg_match("/$startText(.*?)$endText/s", $contents, $matches); 
 
 	echo @$matches[1];
 	
 	// note adding @ suppresses warnings 
?>


