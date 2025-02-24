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
    <title>Gradebook - <?php echo $className; ?></title>
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
        <div class="container-fluid p-2">
            <div class="d-flex flex-row">
                <div class="p-2"><a href="ui-classroom-v2.php" class="btn btn-danger">Go back</a></div>
            </div>
        </div>

        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded"
                style="background-image: url('img/sci.png');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h4 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Gradebook - <?php echo $className; ?></h4>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4">Student Grades</h2>
                    <?php
                    $sql = "SELECT u.name, t.testName, at.totalCorrectAnswers, 
                            (SELECT COUNT(*) FROM test_questions tq WHERE tq.testId = t.id) as maxScore
                            FROM answered_tests at
                            JOIN users u ON at.studentId = u.id
                            JOIN tests t ON at.testId = t.id
                            ORDER BY u.name, t.testName";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-dark table-striped">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th scope="col">Student Name</th>';
                            echo '<th scope="col">Test Name</th>';
                            echo '<th scope="col">Score</th>';
                            echo '<th scope="col">Total Score</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            $currentStudent = '';
                            $totalScore = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                if ($currentStudent != $row['name']) {
                                    if ($currentStudent != '') {
                                        echo '<tr>';
                                        echo '<td colspan="3"><b>Total Score</b></td>';
                                        echo '<td><b>' . $totalScore . '</b></td>';
                                        echo '</tr>';
                                    }
                                    $currentStudent = $row['name'];
                                    $totalScore = 0;
                                }
                                $totalScore += $row['totalCorrectAnswers'];
                                echo '<tr>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>' . $row['testName'] . '</td>';
                                echo '<td>' . $row['totalCorrectAnswers'] . '/' . $row['maxScore'] . '</td>';
                                echo '<td></td>';
                                echo '</tr>';
                            }
                            echo '<tr>';
                            echo '<td colspan="3"><b>Total Score</b></td>';
                            echo '<td><b>' . $totalScore . '</b></td>';
                            echo '</tr>';
                            echo '</tbody>';
                            echo '</table>';
                            mysqli_free_result($result);
                        } else {
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