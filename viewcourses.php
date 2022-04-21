<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Know | Courses</title>
<link rel="shortcut icon" href="logo.ico" />
<link rel="stylesheet" type="text/css"
  href="style.css">
</head>

<body>

<div class="top row col-12">
	<a id = "logo" href = "index.php"><img src = "logo.png"></a>
	<ul class = "navbar">
	<a href = "index.php" > <li> Home </li> </a>
	<a href = "viewcourses.php"> <li id = "active"> Courses </li> </a>	
	<!-- LOGGED IN -->
	<?php if (isset($_SESSION['userName'])) : ?>
	
	<a href = "internals/logout.inc.php"> <li> Logout </li> </a>
		
	<!-- LOGGED OUT -->	
	<?php else : ?>	
		<a href = "about.html"> <li> About </li> </a>
		<a href = "pricing.html"> <li> Pricing </li> </a>
	<?php endif; ?> 		

	</ul>
	<form action = "results.php">
	<input class = "search-box" type = "text" placeholder = "Search Courses" />
	<input type="submit" style="position: absolute; left: -9999px"/>
	</form>
</div>

<div class = "main" style="height: auto;"> 
	
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