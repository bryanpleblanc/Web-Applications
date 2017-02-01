<?php
	session_start();
	
	/* Handles User Logout */
	if ($_GET["logout"]==1 AND $_SESSION['id']) { session_destroy();
		$message="You have been logged out. Have a nice day!";
	}
		
	include("connection.php"); 																							// for connecting to the database 
		
  	
  	/* Sign Up */
  	if ($_POST['submit']=="Sign Up") {
		if (!$_POST['email']) {																							// if email input is blank/ empty 
			$error.="<br />Please enter your email";																	// add to error variable 
		}
		
		if (!$_POST['password']) {																						// if password input is blank/ empty 
 			$error.="<br />Please enter your password";																	// add to error variable 
 		} else { 																										// if a password has been entered check password string 
 			if (strlen($_POST['password'])<8) {																			// check password length for less than 8 characters 
 				$error.="<br />Please enter at least 8 characters"; 													// add to error variable 
 			}
 			if(!preg_match('/[A-Z]/', $_POST['password'])) { 															// use regex to check if there is at least one captital letter
 				$error.= "<br />Please include min 1 capital letter";													// add to error variable 
 			}
 		}
 		
		if ($error) {																									// If there are ANY errors then print them
			$error = "There were error(s) in your sign up details:".$error;
			
		} else { 																										// check if email all ready exists 
			$query= "SELECT * FROM `users` WHERE email ='".mysqli_real_escape_string($link, $_POST['email'])."'";		// must be careful here.. you can't just say = "SELECT * FROM Users WHERE `Email`= '.$_POST['email'].'" --- this is easy to hack using "SQL Injection"
			$result = mysqli_query($link, $query);																		// gets result from above line
			$results = mysqli_num_rows($result);																		// gets the number of emails that were returned 
			
			if ($results) { 																							// if there are emails that match in the database already throw error
				$error = "That email is already registered. Do you want to log in?";									// add to error variable 
				
			} else {																									// if no emails matched in database then add user   
				$query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";
   				mysqli_query($link, $query);
				$success="You've been signed up!";
				
				$_SESSION['id']= mysqli_insert_id($link); 																// We want the user to remain logged in while browser is active this will retunr the id of the user most recently logged in 
 				
 				header("Location:mainpage.php"); 																		// Redirect to main page post sign up 
 			}
		}	
	}

	/* Sign In */
	if ($_POST['submit'] == "Log In") {	
	
		$query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['loginemail'])."'AND 
		password='" .md5(md5($_POST['loginemail']) .$_POST['loginpassword']). "'LIMIT 1"; 								// check if the users email and password matches database 

		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result); 																			// result is now in an array
		
		if($row) { 																										// true if an array was returned 
			$_SESSION['id']=$row['id'];																					//sets the session to user ID - for user to remain logged in 
			header("Location:mainpage.php");																			// Redirect to log in page 
		} else {
			$error = "We could not find a user with that email and password. Please try again.";
		}
	}
	
	
?>