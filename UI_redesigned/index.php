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
 <head>
    <title>exported project</title>
    <meta property="twitter:card" content="summary_large_image" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    <style>
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6 {  margin: 0;  padding: 0;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}
    </style>
    <style>
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    />
    <link rel="stylesheet" href="./style.css" />
  </head>

  <!-- 
<head> 


	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<title>Know | Home</title>
<link rel="shortcut icon" href="logo.ico" />
<link rel="stylesheet" type="text/css"
  href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>
-->
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


		
		
	</div>

	<!-- VISITOR VIEW -->		
	

	

	
	
	<?php endif; ?>









</body>

</html>