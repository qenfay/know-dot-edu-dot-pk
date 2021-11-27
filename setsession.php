 <?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>
		
<?php

include('Config.php');

// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
echo "<p> Default values: ";
print_r($_SESSION);

?>

</body>
</html> 