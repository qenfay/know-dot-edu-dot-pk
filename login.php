<?php
session_start();
?>

<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Know | Log In</title>
<link rel="shortcut icon" href="logo.ico" />
<link rel="stylesheet" type="text/css"
  href="style.css">
  
<style>

/* Full-width inputs */
.container input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}



/* Add padding to containers */
.container {
  padding: 16px;
}


</style>

<script>

function validate() {
	var success = true;
	var errormessage = "You have the following errors: \n";

	var userName = document.getElementById('userName').value;
	var pw = document.getElementById('pw').value;

	if (userName === ""  || userName === NULL) {
		alert("here");
		errormessage += "- Username Field is empty \n";
		success = false;
	} 

	if (pw === "" || pw === NULL ) {
		alert("here2");
		errormessage += "- Password Field is empty \n";
		success = false;
	}

	if (!success) {
		alert(errormessage);
		return false;
	} else {
		return true;
	}
}

</script>
  
</head>

<body>
	<!-- Nav bar :: PHP -->
	<div class="top row col-12">
	<a id = "logo" href = "index.php"><img src = "logo.png"></a>
	<ul class = "navbar"> 
		<a href = "index.php" > <li> Home </li> </a>
		<?php 
			/* change navbar based on whether you are logged in or not */
			if (isset($_SESSION['userName'])) {
				echo '<a href = "internals/logout.inc.php"> <li> Logout </li> </a>';
			} else {
				echo '
					<a href = "about.html"> <li> About </li> </a>
					<a href = "pricing.html"> <li> Pricing </li> </a>
				';
			}
		?>
	</ul>
	<form action = "results.php">
	<input class = "search-box" type = "text" placeholder = "Search Courses" />
	<input type="submit" style="position: absolute; left: -9999px"/>
	</form>
	</div>
	

<div class = "main" style="height:auto;"> 


<br>
<br>
<br>
<br>
<div class="container">
	<?php
	
		/* decide whether to show the form or not based on whether the user is logged in or not*/
		if (isset($_SESSION['userName'])) {
			echo '<p> You are already logged in as <b>'. $_SESSION['userName'] . '</b>  </p> <br><br><br>';

		} else {
			/* Login Form  */

			if(isset($_GET['error'])) {
				if ($_GET['error'] == 'invalidUsername' ||$_GET['error'] == 'invalidPassword' ) {
					/* Display an error message if the username entered has already been taken */
					echo '<h1 class="error">Sorry, incorrect password/username!</h1>'; 
					
				}
			}

			echo '
			<form onsubmit = "return validate()" action = "internals/login.inc.php" method="POST" style="margin: auto">
    			<input type="text" placeholder="Username" name="userName" id = "userName">
				<input type="password" placeholder="Password" name = "pw" id = "pw">
		
				<button class = "button-big" type="submit" name="login-button">Login</button>
			</form>

			<form action="signup.php">
				<button class="button-big" type="submit" name="login-button">No account yet? Sign up to register now!</button>
			</form>';
		}
	?>
	
</div>


</div>

<hr>

<div class = "bottom" style="text-align: center;">
	<div class="row">
		<div class="col-6 left col-s-12">
			<h4>Social Media</h4>
			<div class="row">
				<a href="https://twitter.com>"><img src="https://cdn4.iconfinder.com/data/icons/social-media-icons-the-circle-set/48/twitter_circle-512.png" width="10%" height="10%"></a>
				<a href="https://facebook.com"><img src="fblogo.png" width="10%" height="10%"></a>
				<a href="https://instagram.com"><img src="iglogo.png" width="10%" height="10%"></a>
				<a href="https://youtube.com"><img src="https://images.vexels.com/media/users/3/137425/isolated/preview/f2ea1ded4d037633f687ee389a571086-youtube-icon-logo-by-vexels.png" width="10%" height="10%"></a>
			</div>
		</div>

		<div class="col-6 left col-s-12">
			<ul style="list-style-type:none;">
				<li><h4>More</h4></li>
				<li><a href="terms.html">Terms</a></li>
				<li><a href="privacy.html">Privacy</a></li>
				<li><a href="#">Forums</a></li>
				<li><a href="support.html">Support</a></li>
			</ul>
		</div>
	</div>
</div>



</body>

</html>