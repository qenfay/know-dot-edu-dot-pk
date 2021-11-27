<?php 

include_once("../config/config.php");

function resultToArray($x) {
    $rows = array();
    while($row = $x->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

/* SQL to collect details needed for the particular course */
$courseDetailsSQL = "SELECT * FROM course JOIN teachercourse USING (courseID) JOIN enduser ON teachercourse.teacherID = enduser.userID ORDER BY courseID ASC;";
$result = mysqli_query($mysqli, $courseDetailsSQL);
if ($result) {
    $result = resultToArray($result);
}


/* SQL to add course contents as a sub array */
for($i = 1; $i <= count($result); $i++) {
    $courseContentsSQL = "SELECT * FROM coursecontent WHERE courseID = $i ORDER BY position ASC;";
    $result2 = mysqli_query($mysqli, $courseContentsSQL);
    if ($result2) {
        $result2 = resultToArray($result2);
    }
    $result[$i-1]["content"] = $result2;
}


/* encode and output everything into a JSON file */
$json_data = json_encode($result);
file_put_contents('coursedetails.js', "var coursedetails = '$json_data'");


?>