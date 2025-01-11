<?php
include('session.php');
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $testName = $_POST['testName'];
    $dueDate = $_POST['dueDate'];
    $description = $_POST['description']; // Retrieve description from form
    $classCode = "BSIT 244"; // Add a class code field in the form if needed

    // Insert test data into the 'tests' table
    $sql = "INSERT INTO tests (testName, dueDate, description, classCode) VALUES (?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $testName, $dueDate, $description, $classCode);
        if (mysqli_stmt_execute($stmt)) {
            $testId = mysqli_insert_id($link);

            // Insert questions into the 'test_questions' table
            for ($i = 1; $i <= 5; $i++) {
                $question = $_POST['question' . $i];
                $answer1 = $_POST['option' . $i . '_1'];
                $answer2 = $_POST['option' . $i . '_2'];
                $answer3 = $_POST['option' . $i . '_3'];
                $answer4 = $_POST['option' . $i . '_4'];
                $answer5 = $_POST['option' . $i . '_5']; // Ensure option 5 is handled
                $correctAnswer = $_POST["correctAnswer$i"];

                $sql = "INSERT INTO test_questions (testId, question, answer1, answer2, answer3, answer4, answer5, correctAnswer) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                if ($stmt = mysqli_prepare($link, $sql)) {
                    mysqli_stmt_bind_param($stmt, "isssssss", $testId, $question, $answer1, $answer2, $answer3, $answer4, $answer5, $correctAnswer);
                    mysqli_stmt_execute($stmt);
                }
            }
            header("location: ui-studentClass.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>
