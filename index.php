<?php
session_start();

/* if admin is logged in, redirect to admin home page */
if (isset($_SESSION['accountType'])) {
	if ($_SESSION['accountType'] == 'Admin'){
		header("Location: admin.html");
	}
}
?>


<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<title>Know | Home</title>
<link rel="shortcut icon" href="logo.ico" />
<link rel="stylesheet" type="text/css"
  href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>

<body>

	<!-- Nav bar :: PHP -->
	<div class="top row col-12">
	<a id = "logo" href = "index.php"><img src = "logo.png"></a>
	<ul class = "navbar"> 
		<a href = "index.php" > <li id = "active"> Home </li> </a>
		<a href = "viewcourses.php"> <li> Courses </li> </a>
		<!-- change navbar based on whether you are logged in or not -->

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

<div class = "main"> 

	<?php if (isset($_SESSION['userName'])) : ?>
	<!-- USER VIEW -->

		<?php if ($_SESSION['accountType'] == 'Student') : ?>
		<!-- STUDENT VIEW -->	

		<div class = "row">
		<div class = "col-12 col-s-12">
		<h1 style = "margin: 10px">Welcome, <?php echo $_SESSION['userName']; ?>! </h1>
		</div>
		</div>
		<div class = "row">
		<div class = "col-6 col-s-12">
		<a href = "bookindex.html"><button class = "button-big left" style = "width: 90%"> ISBN Book Search </button></a>
		</div>
		<div class = "col-6 col-s-12">
		<button class = "button-big left" style = "width: 90%" onclick = "randomcourse()"> Random Course </button>
		</div>
		
		
		</div>
		<hr>
		<h1 style = "margin: 10px"> Enrolled Courses </h1>
		<!-- Enrolled Course Listed Here Dynamically -->
		<div class = "course"> </div>
		</div>
		
		
	
		<?php elseif($_SESSION['accountType'] == 'Teacher') : ?> 
			<!-- TEACHER VIEW -->
			<div class = "row">
			<div class = "col-12 col-s-12">
			<h1 style = "margin: 10px">Welcome, <?php echo $_SESSION['userName']; ?>! How will you teach today? </h1>
			</div>
			</div>
			<div class = "row">
			<div class = "col-6 col-s-12">
			<a href = "teacherform.php"><button class = "button-big left" style = "width: 90%"> Start Course </button></a>
			</div>
			<div class = "col-6 col-s-12">
			<button class = "button-big left" onclick = "randomcourse()" style = "width: 90%"> Random Course </button>
			</div>
			<hr>

		
		
		</div>
	
		<?php endif; ?>	
	<?php else : ?>
		<!-- VISITOR VIEW -->		
	<div class = "row" style="width:auto;">
		<div class = "col-12" style = "background-image: url(https://www.houseofbots.com/images/news/3523/cover.png); height: 450px; width: 100%; background-repeat: no-repeat; background-size: cover;"> 
			<h1><br><br><br> Know.edu.pk: <br>The Largest Collection of MOOCs<br> in the country </h1> 
			<form action = "login.php"> 
			<button type = "submit" class="button-big">Log In</button>
			</form>
		</div>

		<!--<div class="col-12">
			<div class="slideshow-container">
				<div class="mySlides fade">
					<div class="numbertext">1 / 3</div>
					<img class="img" src="https://cdn.pixabay.com/photo/2017/08/30/01/05/milky-way-2695569_1280.jpg" style="width:100%; height:450px;">
					<div class="text">Caption Text</div>
				</div>
				 
				<div class="mySlides fade">
					<div class="numbertext">2 / 3</div>
					<img class="img" src="https://cdn.pixabay.com/photo/2017/08/30/01/05/milky-way-2695569_1280.jpg" style="width:100%; height:450px;">
					<div class="text">Caption Text</div>
				</div>

				<div class="mySlides fade">
					<div class="numbertext">3 / 3</div>
					<img class="img" src="https://cdn.pixabay.com/photo/2017/08/30/01/05/milky-way-2695569_1280.jpg" style="width:100%; height:450px;">
					<div class="text">Caption Text</div>
				</div>

				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>

			<br>

			<div style="text-align:center">
  				<span class="dot" onclick="currentSlide(1)"></span> 
  				<span class="dot" onclick="currentSlide(2)"></span> 
  				<span class="dot" onclick="currentSlide(3)"></span> 
			</div>
		</div>-->
	</div>

	<div class="row"><br><br><br><br><br><br></div>

	<div class = "row" style="text-align: center; width: auto;">
		<h1 style="text-align: center;">Know more to get to your goals</h1>
		<div class="col-12">
			<div class="col-3 left col-s-12">
				<img class = "hoversize" src="https://www.psionline.com/wp-content/uploads/skill-innovation.png" width="80px" height="60px">
				<h3>Learn in-demand skills</h3>
				<p>like contemporary programming languages, business analytics etc.</p>
			</div>
			<div class="col-3 left col-s-12">
				<img class = "hoversize" src="https://i.ya-webdesign.com/images/growth-clipart-career-progression-14.png" width="80px" height="60px">
				<h3>Prepare yourself for a career</h3>
				<p>in fields like IT, data analysis and AI. There are ample opportunities available, and your chance to seize them.</p>
			</div>
			<div class="col-3 left col-s-12">
				<img class = "hoversize" src="https://cdn3.iconfinder.com/data/icons/higher-education-icon-set/256/diploma.png" width="80px" height="60px">
				<h3>Earn certificates</h3>
				<p>for completing courses from certified professors. Certifications we offer are accepted worldwide.</p>
			</div>
			<div class="col-3 left col-s-12">
				<img class = "hoversize" src="https://img.icons8.com/cotton/2x/plus--v3.png" width="80px" height="60px">
				<h3>Add credits to your degree</h3>
				<p>by taking extra courses or re-taking courses. These courses are all certified and accepted by most universities.</p>
			</div>
		</div>
	</div>

	<div class="row"><br><br><br><br><br><br></div>

	<div class = "row" style="background-color:	#ADD8E6; width: auto;">
		<div class="col-12">
			<p class="p"><img class = "hoverrotate" src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/front-page-story/achieve-your-goals/promoStat.png?auto=format%2Ccompress&dpr=1&w=&h=250" style="float: left; margin-left: auto; max-width: 100%; height: auto;">
			<br><br><br>It was reported in a survey in 2019 that over <strong>92%</strong> of students benefitted from MOOCs and reported <strong>career benefits</strong>
			to taking such courses. Furthermore, there is a <strong>steep rise</strong> in MOOCs used in Pakistan.</p>
		</div>
	</div>

	<div class="row"><br><br><br><br><br><br></div>

	<div class="row" style="background-color: lightgreen; width: auto">
		<div class="col-12">
			<p class="p"><img class = "hoverrotate" src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://s3.amazonaws.com/coursera_assets/front-page-story/secondary-consumer-cta/secondary-consumer-hero-img.png?auto=format%2Ccompress&dpr=1&w=&h=250" style="float: left; margin-left: auto; max-width: 100%; height: auto;">
			<br><br><br><h1>Take the next step towards your goals!</h1>Join now for the latest updates on courses offered</p>
			<form action = "signup.php"> 
				<button type = "submit" style="margin-left: 75px; margin-top: 50px;" class="button">Sign Up</button>
			</form>
		</div>
	</div>
	<?php endif; ?>
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

<!--Script for the slideshow-->
<script src="internals/coursedetails.js"> </script>
<script>

	<?php 
		$object = "[";
		foreach ($_SESSION['courses'] as $x) {
			$object .= $x['courseID'] . ",";
		}
		$object .= " 0]";
		echo "var courses = $object;"
	?>

	console.log(courses);

	$('document').ready(function() {
		coursedetails = JSON.parse(coursedetails);
		$('.course').append('<div class = "row" >');
		for(var i = 0; i < courses.length; i++) {
			if ((i % 2) == 0 && i != 0) {
				console.log(i);
				$('.course').append('</div> <div class = "row" >');
			}
			$('.course').append('<div class = "course-card col-5 col-s-12"> <h2 class = "left"> <a href="coursepage.php#!/' + courses[i] + '">' + coursedetails[courses[i]-1].title + '</a></h2> <br> <p>  This is a course you are enrolled in! Click on the link above to visit the course page! You will recieve updates and information, as well as see what you might learn in the course! </p> </div>');
		}

		/*for(var m = 0; m < courses.length; m++) {
			$('.teach').append('<h2><a href="coursepage.php#!/' + courses[i] + '">' + coursedetails[courses[i]-1].title + '</a></h2> <br>');
		}*/

	});

	function randomcourse() {
		window.location.href = "coursepage.php#!/" + (Math.floor(Math.random() * (coursedetails.length - 1 + 1)) + 1);
	}
</script>



</body>

</html>