<?php
    echo 'enroll code';
    include_once("../config/config.php");
    session_start();
    echo $_SESSION['userID'];

    function resultToArray($x) {
        $rows = array();
        while($row = $x->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    function updateEnrollments() {
        $enrollmentSQL = 'SELECT courseID FROM studentcourse WHERE studentID ="' . $_SESSION['userID'] . '";';
        $result2 = mysqli_query($mysqli, $enrollmentSQL);
        if ($result2) {
            $result2 = resultToArray($result2);
        }

        $_SESSION['courses'] = $result2;
    }


    if (isset($_SESSION['userName'])) {
    
    /* ensure the page was access from an enroll button by a studen*/
    if(isset($_POST['enroll-button'])) {
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
                header("Location: ../coursepage.php#!/$courseID?error=none");
                exit();
            } else {
                /* Student is already enrolled */
                header("Location: ../coursepage.php#!/$courseID?error=alreadyenrolled");
                exit();
            } 
            
        } 
        else {       
            header("Location: ../coursepage.php");
            exit();
        }


    } else {
        header("Location: ../coursepage.php");
        exit();
    }
}


?>