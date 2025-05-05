<?php
    session_start();

    include_once("./config/config.php");
    $result = mysqli_query($mysqli, "SELECT userID, userName, fullName, phone FROM enduser WHERE accountType = 'Teacher'");
?>

<html>
    <head>
        <title>See Teachers</title>
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
        </style>
    </head>

    <body>
        <h1 class="header"><u>Admin View</u></h1>

        <div class="sidenav">
            <a href="admin.html" >Home</a>
            <a href="viewteachers.php" id="active">See Teachers</a>
            <a href="viewUsers.php">Delete Users</a>
            <a href="searchenrollments.php">Search Enrollments</a>
            <a href="addcourse.html">Add a course</a>
            <a href="internals/logout.inc.php">Log Out</a>
        </div>


        <div class="main">
            <table width=80% border=0>
                <tr bgcolor="#CCCCCC">
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Phone No.</th>
                    <th>Edit</th>
                </tr>
                <?php
                    while($res = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$res['userID']."</td>";
                        echo "<td>".$res['userName']."</td>";
                        echo "<td>".$res['fullName']."</td>";
                        echo "<td>".$res['phone']."</td>";
                        echo "<td> <a href=\"editteachers.php?id=$res[userID]\">Edit</a>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>