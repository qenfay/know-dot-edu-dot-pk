<?php

include_once("../config/config.php"); //configure database connection under variable $mysqli

/* Ensure the user comes in from the sign up form using isset() */
if(isset($_POST['signup-button'])) {
    echo 'signup code';

    /* Collect the POSTed values from the signup form */
    $fullName = $_POST['fullName'];
    $userName = $_POST['userName'];
    $pw = $_POST['pw'];
    $cpw = $_POST['cpw'];
    $accountType = $_POST['accountType'];
    $phone = $_POST['countryC'] . " " . $_POST['startDig'] . " " . $_POST['phN'];


    /* Check if the username already exists (using prepared statements to prevent SQL Injection) 
    before adding to database */
    $userNameCheckSQL = "SELECT userName FROM endUser WHERE userName = ?";
    $result = mysqli_stmt_init($mysqli);

    if (!mysqli_stmt_prepare($result, $userNameCheckSQL)) {
        header("Location : ../signup.php?error=sql&fullName=$fullName&userName=$userName&accountType=$accountType");
    } else {
        mysqli_stmt_bind_param($result, "s", $userName); //place parameter in statement
        mysqli_stmt_execute($result); //execute statement
        mysqli_stmt_store_result($result); //store statement
        $matchQuantity = mysqli_stmt_num_rows($result); //retrieve number of rows

        if ($matchQuantity > 0) {
            /* Username has already been taken */
            header("Location: ../signup.php?error=invalidUsername&fullName=$fullName&userName=$userName&accountType=$accountType");
            exit();
        } else {
            /* Username is available */
            
            /* determining ID */
            if ($accountType == 'Student') {
                $newNumberSQL = "SELECT substring(userID, 2,4) FROM enduser WHERE userID LIKE 'S____' ORDER BY userID DESC LIMIT 1";
                $prefix = 'S';
            } else if ($accountType == 'Teacher') {
                $newNumberSQL = "SELECT substring(userID, 2,4) FROM enduser WHERE userID LIKE 'T____' ORDER BY userID DESC LIMIT 1";
                $prefix = 'T';
            }
            
            $query = mysqli_query($mysqli, $newNumberSQL);
            $result = mysqli_fetch_assoc($query);

            $newID = implode($result);
            $newID++;
            $newID = sprintf("%04d", $newID); //pad 0s
            $newID = $prefix . $newID;

            /* Add User to Database */
            $userNameAddSQL = "INSERT INTO enduser VALUES (?, ?, ?, ?, ?, ?)";
            $result = mysqli_stmt_init($mysqli);
            if (!mysqli_stmt_prepare($result, $userNameAddSQL)) {
                header("Location : ../signup.php?error=sql&fullName=$fullName&userName=$userName&accountType=$accountType");
            } else {
                /* encrypt password into a 60 character string*/
                $pwHash = password_hash($pw, PASSWORD_BCRYPT);

                mysqli_stmt_bind_param($result, "ssssss", $newID, $accountType, $userName, $pwHash, $fullName, $phone); //place parameters in statement
                mysqli_stmt_execute($result); //execute statement

                /* return success */
                header("Location: ../signup.php?error=none");
                exit();
            }

            

        }

        
    }

    mysqli_stmt_close($result);
    
}
else {
    /* Redirect user to sign up page */
    header("Location: ../signup.php");
    exit();
}

mysqli_close($mysqli);


?>