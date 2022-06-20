<?php
    include_once("./config/config.php");
    if(isset($_POST['update'])){	

        $id = mysqli_real_escape_string($mysqli, $_POST['userID']);
        $uname = mysqli_real_escape_string($mysqli, $_POST['userName']);
        $fname = mysqli_real_escape_string($mysqli, $_POST['fullName']);
        $phn = mysqli_real_escape_string($mysqli, $_POST['phone']);
        
        // checking empty fields
        if(empty($id) || empty($uname) || empty($fname) || empty($phn)) {	
            $_GET['id'] = $id;
            
            if(empty($uname)) {
                echo "<font color='red'>Username field is empty.</font><br/>";
            }
            
            if(empty($fname)) {
                echo "<font color='red'>Full name field is empty.</font><br/>";
            }
            
            if(empty($phn)) {
                echo "<font color='red'>Phone number field is empty.</font><br/>";
            }
        } 
        
        else {	
            //updating the table
            $result = mysqli_query($mysqli, "UPDATE enduser SET userName='$uname', fullName='$fname', phone='$phn' WHERE userID='$id'");
            
            $mysqli->close();
            //redirectig to the display page
            header("Location: viewteachers.php");
        }
    }
?>

<?php
    //getting id from url
    $id = $_GET['id'];

    //selecting data associated with this particular id
    $result = mysqli_query($mysqli, "SELECT * FROM enduser WHERE userID = '$id'");

    while($res = mysqli_fetch_array($result)) {
	    $uname = $res['userName'];
	    $fname = $res['fullName'];
	    $phn = $res['phone'];
    }
    $mysqli->close();
?>

<html>
    <head>
        <title>Edit Teacher</title>

        <style>
            .container input[type="text"] {
                width = 25%;
                padding = 12px 20px;
                margin: 8px 0px;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
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
        <div class="container">
            <form name="form1" method="post" action="editteachers.php">
                <table border=0>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="userName" value="<?php echo $uname;?>"></td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td><input type="text" name="fullName" value="<?php echo $fname;?>"></td>
                    </tr>
                    <tr>
                        <td>Phone No.</td>
                        <td><input type="text" name="phone" value="<?php echo $phn;?>"></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="userID" value=<?php echo $_GET['id'];?>></td>
				        <td><input type="submit" name="update" value="Update"></td>
			        </tr>
                </table>
            </form>
        </div>
    </body>
</html>