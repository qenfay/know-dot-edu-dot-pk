<?php
    session_start();

    /*if(!(isset($_SESSION["favcolor"]) && ($_SESSION["favcolor"] == "green"))){
        echo "<font color='red'>Session is either NOT set or favcolor is not green.<br/>";
        echo '<a href="setsession.php">Click here</a> to set session. </font>';
        return;
    }*/

    include_once("./config/config.php");

    $res_course = mysqli_query($mysqli, "SELECT courseID, title, field FROM course");
    $res_courseContent = mysqli_query($mysqli, "SELECT contentID, courseID, position, contentType, filePath FROM coursecontent");
    $res_endUser = mysqli_query($mysqli, "SELECT userID, accountType, userName, pw, fullName, phone FROM enduser");
?>

<html>
    <head>
        <title>View Database</title>
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
        </style>
    </head>

    <body>
        <h1 class="header"><u>Admin View</u></h1>
        <div class="sidenav">
            <a href="admin.html">Home</a>
            <a href="viewteachers.php">See Teachers</a>
            <a href="viewusers.php">Delete Users</a>
            <a href="#">Search Enrollments</a>
            <a href="#">Add a course</a>
            <a href="#">Analytics</a>
            <a href="internals/logout.inc.php">Log Out</a>
        </div>
        
        <div class="main">
            <h1>Courses Table</h1>
            <table width=80% border=0>
                <tr bgcolor="#CCCCCC">
                    <th>Course ID</th>
                    <th>Course Title</th>
                    <th>Field</th>
                </tr>
                <?php
                    while($res1 = mysqli_fetch_array($res_course)) {
                        echo "<tr>";
                        echo "<td>".$res1['courseID']."</td>";
                        echo "<td>".$res1['title']."</td>";
                        echo "<td>".$res1['field']."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>

            <br><br><br><br>
            <h1>Course Content Table</h1>
            <table width=80% border=0>
                <tr bgcolor="#CCCCCC">
                    <th>Content ID</th>
                    <th>Course ID</th>
                    <th>Position</th>
                    <th>Content Type</th>
                    <th>File Path</th>
                </tr>
                <?php
                    while($res2 = mysqli_fetch_array($res_courseContent)) {
                        echo "<tr>";
                        echo "<td>".$res2['contentID']."</td>";
                        echo "<td>".$res2['courseID']."</td>";
                        echo "<td>".$res2['position']."</td>";
                        echo "<td>".$res2['contentType']."</td>";
                        echo "<td>".$res2['filePath']."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>

            <br><br><br><br>
            <h1>End User Table</h1>
            <table width=80% border=0>
                <tr bgcolor="#CCCCCC">
                    <th>User ID</th>
                    <th>Account Type</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Phone No.</th>
                </tr>
                <?php
                    while($res3 = mysqli_fetch_array($res_endUser)) {
                        echo "<tr>";
                        echo "<td>".$res3['userID']."</td>";
                        echo "<td>".$res3['accountType']."</td>";
                        echo "<td>".$res3['userName']."</td>";
                        echo "<td>".$res3['fullName']."</td>";
                        echo "<td>".$res3['phone']."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>