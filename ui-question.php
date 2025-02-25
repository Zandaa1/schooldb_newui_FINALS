<?php
include('session.php');
require_once "config.php";

$testId = $_GET['id'];
$studentId = $_SESSION['id'];

// Check if the test is already answered by the student
$sql = "SELECT totalCorrectAnswers FROM answered_tests WHERE studentId = $studentId AND testId = $testId";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $totalCorrectAnswers = $row['totalCorrectAnswers'];
    echo "<div class='alert alert-info'>You have already answered this test. Your score is: $totalCorrectAnswers</div>";
    mysqli_free_result($result);
    mysqli_close($link);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answers = $_POST['answers'];
    $correctAnswers = 0;

    // Insert into answered_tests table
    $sql = "INSERT INTO answered_tests (studentId, testId) VALUES ($studentId, $testId)";
    mysqli_query($link, $sql);
    $answeredTestId = mysqli_insert_id($link);

    foreach ($answers as $questionId => $answer) {
        // Check if the answer is correct
        $sql = "SELECT correctAnswer FROM test_questions WHERE id = $questionId AND testId = $testId";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $isCorrect = ($row['correctAnswer'] === 'option' . $answer) ? 1 : 0;
        if ($isCorrect) {
            $correctAnswers++;
        }

        // Insert into student_answers table
        $sql = "INSERT INTO student_answers (studentId, questionId, answer, isCorrect) VALUES ($studentId, $questionId, 'option$answer', $isCorrect)";
        mysqli_query($link, $sql);
    }

    // Save the total correct answers to the database
    $sql = "UPDATE answered_tests SET totalCorrectAnswers = $correctAnswers WHERE id = $answeredTestId";
    mysqli_query($link, $sql);

    header("Location: ui-classroom-v2.php?correctAnswers=$correctAnswers");
    exit();
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>Answer Test</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/journal/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .wrapper {
            display: flex;
            height: 100%;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            padding: 15px;
            border-right: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            color: white;
        }

        .content {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
        }

        .nav-link {
            color: white;
        }

        .nav-link:hover {
            color: #adb5bd;
        }

        .answer-format {
            background-color: #d3d3d3;
            padding: 20px;
        }

        .answer-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>
</head>

<body>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <!-- Sidebar -->

    <?php require_once('ui-sidebar.php'); ?>

    <!-- Content -->
    <div class="content">

        <div class="container-fluid p-3">
        
        <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" fill="red">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    The order of the test has been randomized.
                </div> 

            <a class="btn btn-primary" href="ui-studentClass.php">Go Back</a>

            <?php
            $sql = "SELECT * FROM tests WHERE id = $testId";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    $test = mysqli_fetch_array($result);
                    $dueDate = new DateTime($test['dueDate']);
                    $currentDate = new DateTime();
                    echo '<h1>' . $test['testName'] . '</h1>';
                    if ($isStudent == 1 && $currentDate > $dueDate) {
                        echo '<div class="alert alert-danger">The due date for this test has passed. You cannot answer it anymore.</div>';
                        mysqli_free_result($result);
                        mysqli_close($link);
                        exit();
                    }
                }
                mysqli_free_result($result);
            }
            ?>

            <form method="post" action="" onsubmit="return confirmSubmit()">
                <div class="container p-3 bg-light shadow-lg">

                    <?php
                    $sql = "SELECT * FROM test_questions WHERE testId = $testId ORDER BY RAND()";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            $questionNum = 0; // Move this line outside the while loop
                            while ($row = mysqli_fetch_array($result) ) {
                                $questionNum++;
                                echo '<div class="mb-4">';
                                echo '<div><h3>Question #' . $questionNum . '</h3></div>';
                                echo '<div><p>' . $row['question'] . '</p></div>';
                                echo '<b><p>Choose at least one correct answer</p></b>';
                                echo '<div class="answer-container">';
                                for ($i = 1; $i <= 5; $i++) {
                                    if (isset($row['answer' . $i])) {
                                        echo '<div class="answer-format rounded">';
                                        echo '<input class="form-check-input" type="radio" name="answers[' . $row['id'] . ']" value="' . $i . '" id="q' . $row['id'] . '_option' . $i . '">';
                                        echo '<label class="form-check-label" for="q' . $row['id'] . '_option' . $i . '">' . $row['answer' . $i] . '</label>';
                                        echo '</div>';
                                    }
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    mysqli_close($link);
                    ?>

                    <div class="d-flex justify-content-end mt-3 gap-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Submit</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Submission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit your answers?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Content -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script>
        function confirmSubmit() {
            var myModal = new bootstrap.Modal(document.getElementById('confirmModal'), {
                keyboard: false
            });
            myModal.show();
            return false;
        }

        function submitForm() {
            document.querySelector('form').submit();
        }
    </script>
</body>

</html>