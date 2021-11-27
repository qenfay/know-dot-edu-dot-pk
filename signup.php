<?php session_start() ?>

<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Know | Sign Up</title>
<link rel="shortcut icon" href="logo.ico" />
<link rel="stylesheet" type="text/css"
  href="style.css">
  <style>

/* Full-width inputs */
.container input[type=text], input[type=password], select {
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
	fullName = document.getElementById('fullName');
	userName = document.getElementById('userName');
	countryC = document.getElementById('countryC');
	startDig = document.getElementById('startDig');
	phN = document.getElementById('phN');
	pw = document.getElementById('pw');
	cpw = document.getElementById('cpw');
	account = document.getElementById('account');

	var countryFormat = /^[+]+\d{1,3}$/;
    var sDigFormat = /^\d{3}$/;
	var phoneFormat = /^\d{7}$/;
	var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	if (fullName.value == "" || userName.value == "" || countryC.value == "" || startDig.value == "" || phN.value == "" || pw.value == "" || cpw.value == "" || account.value == "") {
		alert("No empty fields allowed!");
		return false;
	}

	if (pw.value != cpw.value) {
		alert("Confirmed password doesn't match.");
		return false;
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
	<!-- Sign Up Form -->
	<!-- uses POST to be secure -->
	<?php 

		$fullName = "";
		$userName = "";
		$accountType = "";

		if(isset($_GET['error'])) {
			if ($_GET['error'] == 'invalidUsername') {
				/* set the returned GET values so that the form will automatically be filled, 
				instead of the user typing them again just because of an error */
				$fullName = $_GET['fullName'];
				$userName = $_GET['userName'];
				$accountType = $_GET['accountType'];

				/* Display an error message if the username entered has already been taken */
				echo '<h1 class="error">Sorry, this username has already been taken!</h1>'; 
				
			} else if ($_GET['error'] == 'none') {
				echo '<h1>Sign up is successful! <a href="login.php">Log in.</a> </h1>';
			}
			
		}
	?>
	<form onsubmit = "return validate()" action="internals/signup.inc.php" method="POST">
		<input type="text" placeholder="Your Name" name="fullName" id="fullName" value = "<?php echo $fullName ?>">
		<input type="text" placeholder="Username" name="userName" id ="userName" value = "<?php echo $userName ?>">
		<input id="countryC" name="countryC" id="countryC" type="text" placeholder="Country Code" style="width: 20%; margin-right: 10px;">
        <input id="startDig" name="startDig" id="startDig" type="text" placeholder="Starting Digits" style="width: 20%; margin-right: 10px;">
        <input id="phN" name="phN" id="phN" type="text" placeholder="Phone No." style="width: 55%; margin-right: 10px;">
    	<input type="password" placeholder="Password" name="pw" id = "pw">
		<input type="password" placeholder="Confirm Password" name="cpw" id = "cpw">
		<select id="account" name="accountType">
			<option value="" <?php if (!isset($_GET['error'])) { echo 'selected'; } ?> hidden>Account Type</option>
			<option value="Teacher" <?php if ($accountType == 'Teacher') { echo 'selected'; } ?>>Teacher</option>
			<option value="Student" <?php if ($accountType == 'Student') { echo 'selected'; } ?>>Student</option>
		</select>
		<button class = "button-big" type="submit" name="signup-button">Sign Up</button>
	</form>

	<form action="login.php">
		<button class = "button-big" type="submit">Already have an account? Login here!</button>
	</form>
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