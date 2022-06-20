<?php
    include_once("./config/config.php");

    //getting id of the data from url
    $id = $_GET['id'];
    //echo $id;

    //deleting the row from table
    $query ="DELETE FROM enduser WHERE userID = '$id'";

    $result = mysqli_query($mysqli, $query);

    /*if ($result) {
        echo "<font color='green'>User deleted successfully!</font>";
    }

    else {
        echo "<font color='red'>Could not delete user!" . mysqli_error($mysqli) ." </font>" ;
    }*/

    $mysqli->close();

    header("Location:viewUsers.php");
?>