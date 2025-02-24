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

    <!-- Sidebar -->

    <?php require_once('ui-sidebar.php'); ?>

    <!-- Content -->
    <div class="content">

        <div class="container-fluid p-3">

            <a class="btn btn-primary" href="ui-studentClass.php">Go Back</a>

            <?php
            $sql = "SELECT * FROM tests WHERE id = $testId";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    $test = mysqli_fetch_array($result);
                    $dueDate = new DateTime($test['dueDate']);
                    $currentDate = new DateTime();
                    echo '<h1>' . $test['testName'] . '</h1>';
                    echo '<div><span class="badge rounded-pill text-bg-primary">0/50</span></div>';
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
                    $sql = "SELECT * FROM test_questions WHERE testId = $testId";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<div class="mb-4">';
                                echo '<div><h3>Question #' . $row['id'] . '</h3></div>';
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>

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
            return confirm("Are you sure you want to submit your answers?");
        }
    </script>
</body>

</html>