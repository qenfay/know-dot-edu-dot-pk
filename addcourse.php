<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
</head>

<body>
    <?php 
        include('config/config.php');

        if(isset($_POST['Submit'])) {
            $cid = mysqli_real_escape_string($mysqli, $_POST['cid']);
            $title = mysqli_real_escape_string($mysqli, $_POST['title']);
            $field = mysqli_real_escape_string($mysqli, $_POST['field']);

            if(empty($cid) || empty($title) || empty($field)) {
                if(empty($cid)) {
                    echo "<font color='red'>Course ID is required!</font><br/>";
                }
                
                if(empty($title)) {
                    echo "<font color='red'>Course title is required!</font><br/>";
                }
                
                if(empty($field)) {
                    echo "<font color='red'>Field is required!</font><br/>";
                }

                echo "<br><a href='addcourse.html'>Back to add course page</a>";
            }

            else {
                $query = "INSERT INTO course (courseID, title, field) VALUES ($cid, '$title', '$field')";

                if(mysqli_query($mysqli, $query)){
                
                    echo "<font color='green'>Course added successfully!</font>";
                } 
    
                else{
                    echo "<font color='red'>Could not add course! " . mysqli_error($mysqli) ." </font>" ;
                }

                echo "<br/><a href='database.php'>Back to database page</a>";
            }
        }
    ?>
</body>
</html>
