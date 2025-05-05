<?php
session_start();
?>
<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Know | Courses</title>
<link rel="shortcut icon" href="logo.ico" />
<link rel="stylesheet" type="text/css"
  href="style.css">
</head>

<body>

<div class="top row col-12">
	<a id = "logo" href = "landing/index.php"><img src = "logo.png"></a>
	<ul class = "navbar">
	<a href = "landing/index.php" > <li> Home </li> </a>
	<a href = "viewcourses/index.php"> <li id = "active"> Courses </li> </a>	
	<!-- LOGGED IN -->
	<?php if (isset($_SESSION['userName'])) : ?>
	
	<a href = "internals/logout.inc.php"> <li> Logout </li> </a>
		
	<!-- LOGGED OUT -->	
	<?php else : ?>	
		<a href = "about us/index.html"> <li> About </li> </a>
		<a href = "pricing/index.html"> <li> Pricing </li> </a>
	<?php endif; ?> 		

	</ul>
	<form action = "results.php">
	<input class = "search-box" type = "text" placeholder = "Search Courses" />
	<input type="submit" style="position: absolute; left: -9999px"/>
	</form>
</div>

<div class="main" style="min-height:400px"> 

<?php 
	include_once("./config/config.php");
	$query = "SELECT course.courseID, course.title, course.field, coursecontent.contentType, coursecontent.filePath FROM course JOIN coursecontent USING (courseID)";

	$result = mysqli_query($mysqli, $query);

	$course_ids = array();
	$course_images = array();
	$course_descriptions = array();
	$course_fields = array();
	$course_titles = array();

	if ($result){
		// Fetch each row and store in respective array
		while($res = mysqli_fetch_array($result)){
			if (in_array($res['courseID'], $course_ids) == false){
				array_push($course_ids, $res['courseID']);
				array_push($course_fields, $res['field']);
				array_push($course_titles, $res['title']);
			}


			if ($res['contentType'] == 'Photo'){
				array_push($course_images, $res['filePath']);
			}
			else{
				array_push($course_descriptions, file_get_contents($res['filePath']));
			}						
		}
		
		// Add course cards based on the number of courses
		for ($i = 0; $i < count($course_ids); $i++){
			$margin = "";

			// Checks to distribute space

			// Second card of row, should have top margin of 2%, right and left margins of 6.25%
			if ((($i + 2) % 3) == 0){
				$margin = "margin-top:2%;margin-left:6.25%;margin-right:6.25%";
			}

			// Last card of row, should have top margin of 2% only
			else if((($i + 1) % 3) == 0){
				$margin = "margin-top:2%;";
			}

			// First card of row, should have top margin of 2% and left margin of 6.25%
			else{
				$margin = "margin-left:6.25%;margin-top:2%;";
			}

			echo 
			'<div class="col-3" style="border-radius: 3%;height:400px;background-color:rgba(128, 0, 128, 0.8);border:1px solid #000;'.$margin.'">
				<img style="border-radius: 3%;height:200px;width:100%" src='.$course_images[$i].'>
				<br>
				<h3 style="color:#fff">'.$course_titles[$i].'</h3>
				<h5 style="color:#fff">'.$course_descriptions[$i].'</h5>
			</div>';

			

		}

		// var_dump($course_descriptions[0]);
	}
	// echo '<table class="course-table">';
	// while($res = mysqli_fetch_array($result)) {
	// 	echo '<tr>';
	// 	echo "<td>".$res['title']."</td>";
	// 	echo "<td>".$res['field']."</td>";
	// 	echo "<td><button>Enroll</button></td>";
	// 	echo '<td><input type="hidden" value='.$res['courseID'].'></td>';
	// 	echo "</tr>";
	// }
	// echo "</table>"; 




?>
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
