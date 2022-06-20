<?php
    include_once("config/config.php");
    session_start();
    echo $_SESSION['userID'];

    if (isset($_SESSION['userName'])) {
    
    /* ensure the page was access from an enroll button by a studen*/
    if(isset($_POST['enroll-btn'])) {
        if ($_SESSION['accountType'] == 'Student') {
            /* retrieve courseID from POST and studentID from current session variable */
            $courseID = $_POST['courseID'];
            $studentID = $_SESSION['userID'];
            
            $checkEnrollmentSQL = "SELECT * FROM studentcourse WHERE studentID = '$studentID' and courseID = $courseID;";
            $result = mysqli_query($mysqli, $checkEnrollmentSQL);
            $result = mysqli_fetch_assoc($result);

            if(!$result) {
                /* Enroll student */
                $enrollStudentSQL = "INSERT INTO studentcourse VALUES ('$studentID', $courseID);";
                $result2 = mysqli_query($mysqli, $enrollStudentSQL);
                header("Location: coursepage.php#!/$courseID?error=none");
                exit();
            } else {
                /* Student is already enrolled */
                header("Location: coursepage.php#!/$courseID?error=alreadyenrolled");
                exit();
            } 
            
        } 
        else {       
            header("Location: coursepage.php");
            exit();
        }


    } else {
        header("Location: ../coursepage.php");
        exit();
    }
}


?>