<?php

include_once("../config/config.php"); //configure database connection under variable $mysqli

function resultToArray($x) {
    $rows = array();
    while($row = $x->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

/* Ensure the user comes in from the log in form using isset() */
if(isset($_POST['login-button'])) {
    echo 'login code';

    /* retrieve POSTed username and password */
    $userName = $_POST['userName'];
    $pw = $_POST['pw'];

    /* search for login details in database */
    $loginDataSQL = "SELECT * FROM enduser WHERE userName = '$userName'";
    $result = mysqli_query($mysqli, $loginDataSQL);
    $result = mysqli_fetch_assoc($result);


    if(!$result) {
        header("Location: ../login.php?error=invalidUsername");
        exit();
    } else {
       $verifyPW = password_verify($pw, $result['pw']); //checks password against hashed value

       //return login or failure
       if (!$verifyPW) {
        /* The password match fails and is incorrect */   
        header("Location: ../login.php?error=invalidPassword&userName=$userName");
        exit();
       } else {
        /* the password match succeeds and is correct */

        /* seek enrollment info */
        if ($result['accountType'] == 'Student') {
            $enrollmentSQL = 'SELECT courseID FROM studentcourse WHERE studentID ="' . $result['userID'] . '";';
        } else if ($result['accountType'] == 'Teacher') {
            $enrollmentSQL = 'SELECT courseID FROM teachercourse WHERE teacherID ="' . $result['userID'] . '";';
        }
        
        $result2 = mysqli_query($mysqli, $enrollmentSQL);
        if ($result2) {
            $result2 = resultToArray($result2);
        }

        /* set session variables */
        session_start();
        $_SESSION['userID'] = $result['userID'];
        $_SESSION['accountType'] = $result['accountType'];
        $_SESSION['userName'] = $result['userName'];
        $_SESSION['fullName'] = $result['fullName'];
        $_SESSION['phone'] = $result['phone'];
        $_SESSION['courses'] = $result2;

        /* return to login page with success message */
        if ($_SESSION['accountType'] != 'Admin') {
            header("Location: ../login.php?error=none");
            exit();
        } else if ($_SESSION['accountType'] == 'Admin'){
            header("Location: ../admin.html");
        }
        
       }
    }
        


   

            

        

        
    

    
    //mysqli_stmt_close($result);
}
else {
    /* Redirect user to login page */
    header("Location: ../login.php");
    exit();
}

mysqli_close($mysqli);

?>