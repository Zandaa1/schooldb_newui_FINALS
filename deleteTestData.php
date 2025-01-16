<?php 

include('session.php');
require_once "config.php";

// Disable foreign key checks
mysqli_query($link, "SET FOREIGN_KEY_CHECKS = 0");

// Delete all data inside the tables
$sql1 = "TRUNCATE TABLE answered_tests";
$sql2 = "TRUNCATE TABLE tests";
$sql3 = "TRUNCATE TABLE test_questions";
$sql4 = "TRUNCATE TABLE student_answers";

mysqli_query($link, $sql1);
mysqli_query($link, $sql2);
mysqli_query($link, $sql3);
mysqli_query($link, $sql4);

// Re-enable foreign key checks
mysqli_query($link, "SET FOREIGN_KEY_CHECKS = 1");

echo "All test data has been deleted.";
echo "<br><a href='ui-classroom-v2.php'>Back to Classroom</a>";

?>