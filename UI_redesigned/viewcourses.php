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
	<a href = "viewcourses.php"> <li id = "active"> Courses </li> </a>	
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

<div class = "main" style="height: auto;"> 
<?php 
	include_once("./config/config.php");
    $result = mysqli_query($mysqli, "SELECT * FROM course");
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

	echo '<table class="course-table">';
	while($res = mysqli_fetch_array($result)) {
		echo '<tr>';
		echo "<td>".$res['title']."</td>";
		echo "<td>".$res['field']."</td>";
		echo "<td><a href=\"coursepage.php#!/".$res['courseID']."\"><button>View course</button></a></td>";
		echo "</tr>";
	}
	echo "</table>"; 

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