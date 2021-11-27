<?php
session_start();
include('config/config.php');
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Know | Search Enrollments</title>
        <style>
            body {
                font-family: "Lato", sans-serif;
            }

            .header {
                color: white;
                background-color: darkslategray;
                text-align: center;
                margin-left: auto;
                margin-top: 10px;
                margin-bottom: 10px;
                padding: 20px;
            }

            .sidenav {
                height: 100%;
                width: 250px; 
                position: fixed; 
                z-index: 1; 
                top: 10px; 
                left: auto;
                background-color: darkslategray; 
                overflow-x: hidden; 
                padding-top: 20px;
            }

            .sidenav a {
                padding: 6px 8px 6px 16px;
                text-decoration: none;
                font-size: 25px;
                color: white;
                display: block;
            }

            .sidenav a:hover {
                text-decoration: underline;
            }

            .main {
                margin-left: 250px;
                padding: 0px 10px;
            }

            .centre {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
            }

            p {
                font-size: large;
            }

            .button {
	            background-color: darkslategray; 
	            border: none;
	            color: white;
	            padding: 15px 40px;
	            text-align: center;
	            text-decoration: none;
	            display: inline-block;
                font-size: 20px;
                margin-left: auto;
                margin-right: auto;
            }

            button:hover {
                opacity: 80%;
	            transition: 500ms;
            }

            #active {
                text-decoration: underline;
            }

            .main input[type=text] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
        </style> 
    </head>
    <body>
        <h1 class="header"><u>Admin View</u></h1>
        <div class="sidenav">
            <a href="admin.html" >Home</a>
            <a href="viewteachers.php">See Teachers</a>
            <a href="viewUsers.php">Delete Users</a>
            <a href="searchenrollments.php" id="active">Search Enrollments</a>
            <a href="addcourse.html">Add a course</a>
            <a href="internals/logout.inc.php">Log Out</a>
        </div>

            <div class="main">
                <form action="" method="post" style="text-align:center;">
			        <input type = "text" name="search" id="search" placeholder = "Search by ID"/>
                    <button type="submit" class="button" name="submit">Search Enrollments</button>
                </form>
                <?php
				    $search = isset($_POST['search']) ? $_POST['search'] : '';

				    $sql="SELECT studentID, fullName FROM studentcourse JOIN enduser ON studentcourse.studentID = enduser.userID WHERE courseID = $search";
				    $result = $mysqli->query($sql);

				
				    while ($row=$result->fetch_assoc()) {
                        echo '<span class="result" style="font-size:large; margin-left:10px;">Student Name: ' . $row['studentID'] . "</span><br>";
					    echo '<span class="result" style="font-size:large; margin-left:10px;">Student Name: ' . $row['fullName'] . "</span><br><br>";
				    }
			    ?>
            </div>
    </body>
</html>