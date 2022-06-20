<?php
session_start();

include_once("config/config.php");

function resultToArray($x) {
    $rows = array();
    while($row = $x->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

/* SQL to collect details needed for the particular course */
$courseDetailsSQL = "SELECT * FROM course JOIN teachercourse USING (courseID) JOIN enduser ON teachercourse.teacherID = enduser.userID ORDER BY courseID ASC;";
$result = mysqli_query($mysqli, $courseDetailsSQL);
if ($result) {
    $result = resultToArray($result);
}


/* SQL to add course contents as a sub array */
for($i = 1; $i <= count($result); $i++) {
    $courseContentsSQL = "SELECT * FROM coursecontent WHERE courseID = $i ORDER BY position ASC;";
    $result2 = mysqli_query($mysqli, $courseContentsSQL);
    if ($result2) {
        $result2 = resultToArray($result2);
    }
    $result[$i-1]["content"] = $result2;
}


/* encode and output everything into a file */
$json_data = json_encode($result);
file_put_contents('internals/coursedetails.js', "var coursedetails = '$json_data'");
file_put_contents('internals/coursedetails.json', $json_data);

?>

<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<title>Know | Course</title>
<link rel="shortcut icon" href="logo.ico" />
<link rel="stylesheet" type="text/css"
  href="style.css">

<!-- FORM STYLE -->  
<style>

/* Full-width inputs */
.container input[type=text], input[type=password], select {
  width: 100%;
  float: left;
  padding: 12px 20px;
  margin: 8px 0px;
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

.input:focus {
    outline: none !important;
    border:1px solid red;
    box-shadow: 0 0 10px #719ECE;
}

/* Add padding to containers */
.container {
  padding: 16px;
}
  </style>

<!-- Import AngularJS Library -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>

<!-- Import Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Import JSON string -->
<script src="internals/coursedetails.js"></script>
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
				echo '<a href = "viewcourses.php"> <li id ="active"> Courses </li> </a>
				<a href = "internals/logout.inc.php"> <li> Logout </li> </a>';
				
			} else {
				echo '<a href = "viewcourses.php"> <li id ="active"> Courses </li> </a>
					<a href = "about.html"> <li> About </li> </a>
					<a href = "pricing.html"> <li> Pricing </li> </a>';
			}
		?>
	</ul>
	<form action = "results.php">
	<input class = "search-box" type = "text" placeholder = "Search Courses" />
	<input type="submit" style="position: absolute; left: -9999px"/>
	</form>
	</div>

<div class = "main" style = "height: auto"> 
	<div class = "row">
		<div class="col-12" ng-app="CourseApp">
			<div ng-view> </div>	
		</div>
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

<script> 


/* PARSE JSON TEXT */
$(document).ready(function() {
	coursedetails = JSON.parse(coursedetails);
});

/* APP */
var app = angular.module('CourseApp', ["ngRoute"]);

/* ROUTE CONFIGURATION */
app.config(function($routeProvider) {

  $routeProvider

  /* Course Home*/
  .when("/", {
    templateUrl : "maincourse.html"
  })

  /* Individual Course Pages, Addressable by ID */
  .when("/:id", {
    templateUrl : "course.php",
	controller: 'CourseController'
  });


});

/* CONTROLLER */
app.controller('CourseController', function($scope, $routeParams) {
	/* Store details from JSON into $scope variables */
	$scope.courseID = $routeParams.id;
	$scope.title = coursedetails[$routeParams.id - 1].title;
	$scope.field = coursedetails[$routeParams.id - 1].field;
	$scope.teacher = coursedetails[$routeParams.id - 1].fullName;
	$scope.teacherID = coursedetails[$routeParams.id - 1].teacherID;
	$scope.phone = coursedetails[$routeParams.id - 1].phone;
	$scope.userName = coursedetails[$routeParams.id - 1].userName;
	$scope.content = coursedetails[$routeParams.id - 1].content;
	

	/* find course description */
	$scope.description = "This course has no description";
	for (var i = 0; i < $scope.content.length; i++) {
		if($scope.content[i].contentType == "Description") {
			$scope.descPath = $scope.content[i].filePath; 
		}
	}

	/* make a short synchronous request using AJAX */
	if ($scope.descPath) {
		$.ajaxSetup({async:false});
		$.get($scope.descPath, function(data) {
			$scope.description = data;
		});
		$.ajaxSetup({async:true});
	}

	<?php 
	$object = "[";
		foreach ($_SESSION['courses'] as $x) {
			$object .= $x['courseID'] . ",";
		}
		$object .= " 0]";
		echo "var courselist = $object;"
	?>

	$scope.enroll = "Enroll";
	for (var l = 0; l < courselist.length; l++) {
		if (courselist[i] == $scope.courseID) {
			$scope.enroll = "Already Enrolled";
			return;
		}
	}

	


})

</script>


</body>

</html>