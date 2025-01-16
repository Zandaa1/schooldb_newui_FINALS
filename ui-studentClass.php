<?php
include('session.php');
require_once "config.php";

// Ensure $studentId and $isStudent are defined
$studentId = $_SESSION['id'];
$isStudent = $_SESSION['isStudent'];
$className = $_SESSION['className'];
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>
        <?php 
    echo $className;
    
    ?>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

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

    <div class="wrapper">
        <div class="sidebar">
            <h2>School DBMS</h2>
            <small style="color:grey;">Student Portal</small>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="ui-classroom-v2.php">Classroom</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"> <i class="bi bi-list-task"></i> To Do</a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/avatar-placeholder.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $nickname;?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="ui-login.php">Sign out</a></li>
                </ul>
            </div>
        </div>


        <!-- Content -->

        <div class="content">

            <div class="container-fluid p-3">

            <?php
            if ($isStudent == 0) {
                echo '<a href="ui-newtest.php" class="btn btn-danger">Create a new test</a>';
                echo '<br></br>';
            }
            ?>
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded"
                        style="background-image: url('img/sci.png');">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h4 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">BSIT 244 - DATABASE MANAGEMENT SYSTEMS
                                (LEC & LAB)</h4>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="img/avatar-placeholder.jpg" alt="Bootstrap" width="32" height="32"
                                        class="rounded-circle border border-white">
                                    <small>Tristan Jay Calaguas</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php
                $sql = "SELECT * FROM tests";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $dueDate = new DateTime($row['dueDate']);
                            $currentDate = new DateTime();
                            echo '<div class="d-flex align-items-center p-3 my-3 text-white bg-dark rounded shadow-sm">';
                            echo '<a href="#activity' . $row['id'] . 'Details" class="text-white text-decoration-none w-100" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="activity' . $row['id'] . 'Details">';
                            echo '<div class="lh-1">';
                            echo '<h2 class="h6 mb-0 text-white">' . $row['testName'] . '</h2>';
                            echo '<small>Due on ' . $row['dueDate'] . '</small>';
                            echo '</div>';
                            echo '</a>';
                            echo '</div>';
                            echo '<div class="collapse" id="activity' . $row['id'] . 'Details">';
                            echo '<div class="card card-body bg-dark text-white">';
                            echo '<div>';
                            echo '</div>';
                            echo '<p>' . $row['description'] . '</p>';

                            // Check if the test is already answered by the student
                            $sqlAnswered = "SELECT totalCorrectAnswers FROM answered_tests WHERE studentId = $studentId AND testId = " . $row['id'];
                            $resultAnswered = mysqli_query($link, $sqlAnswered);
                            if (mysqli_num_rows($resultAnswered) > 0) {
                                $rowAnswered = mysqli_fetch_assoc($resultAnswered);
                                $totalCorrectAnswers = $rowAnswered['totalCorrectAnswers'];
                                echo '<div class="alert alert-info">You have already answered this test. Your score is: ' . $totalCorrectAnswers . '</div>';

                                // Display correct answers
                                $sqlCorrectAnswers = "SELECT question, correctAnswer FROM test_questions WHERE testId = " . $row['id'];
                                $resultCorrectAnswers = mysqli_query($link, $sqlCorrectAnswers);
                                if (mysqli_num_rows($resultCorrectAnswers) > 0) {
                                    echo '<div class="alert alert-success"><strong>Correct Answers:</strong><ul>';
                                    while ($rowCorrectAnswers = mysqli_fetch_assoc($resultCorrectAnswers)) {
                                        echo '<li>' . $rowCorrectAnswers['question'] . ': ' . $rowCorrectAnswers['correctAnswer'] . '</li>';
                                    }
                                    echo '</ul></div>';
                                    mysqli_free_result($resultCorrectAnswers);
                                }
                            } else {
                                if ($isStudent == 1 && $currentDate > $dueDate) {
                                    echo '<div class="alert alert-danger">The due date for this test has passed. You cannot answer it anymore.</div>';
                                } else {
                                    echo '<button class="btn btn-primary" onclick="location.href=\'ui-question.php?id=' . $row['id'] . '\'">Answer Activity</button>';
                                }
                            }
                            echo '</div>';
                            echo '</div>';
                        }
                        mysqli_free_result($result);
                    } else {
                        echo '<br>';
                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_close($link);
                ?>

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
</body>

</html>