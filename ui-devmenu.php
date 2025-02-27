<?php
include('session.php');
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>Classroom</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <!-- Icons -->
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

    <!-- Side Bar -->
    <?php require_once('ui-sidebar.php'); ?>

    <!-- Content -->
    <div class="content">
        <div class="container-fluid p-3">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" fill="red">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                THIS IS ONLY MEANT FOR DEVELOPMENT!
            </div>


            <!-- Remove on release DEV MENU -->
            <a href="ui-classroom-v2.php" class="btn btn-danger">Return to userMode</a>
            <a href="logout.php" class="btn btn-primary">Logout session</a>
            <a href="deleteTestData.php" class="btn btn-success">Clear Data</a>

            <small>Current Mode: <?php
                                    if ($isStudent == 0) {
                                        echo 'Teacher';
                                    } else {
                                        echo 'Student';
                                    }
                                    ?>
            </small>

            <?php
            // Include config file
            require_once "config.php";

            // Attempt select query execution
            $sql = "SELECT * FROM test_questions";
            $sql2 = "SELECT * FROM users";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<h1>DB [Test Questions]</h1>';
                    echo '<table class="table table-bordered table-striped">';
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Question ID</th>";
                    echo "<th>Test ID</th>";
                    echo "<th>Question</th>";
                    echo "<th>Answer #1</th>";
                    echo "<th>Answer #2</th>";
                    echo "<th>Answer #3</th>";
                    echo "<th>Answer #4</th>";
                    echo "<th>Answer #5</th>";
                    echo "<th>Correct Answer</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['testId'] . "</td>";
                        echo "<td>" . $row['question'] . "</td>";
                        echo "<td>" . $row['answer1'] . "</td>";
                        echo "<td>" . $row['answer2'] . "</td>";
                        echo "<td>" . $row['answer3'] . "</td>";
                        echo "<td>" . $row['answer4'] . "</td>";
                        echo "<td>" . $row['answer5'] . "</td>";
                        echo "<td>" . $row['correctAnswer'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";


                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }

            if ($result2 = mysqli_query($link, $sql2)) {
                if (mysqli_num_rows($result2) > 0) {
                    echo '<h1>DB [Users]</h1>';
                    echo '<table class="table table-bordered table-striped">';
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>id</th>";
                    echo "<th>Username</th>";
                    echo "<th>Password</th>";
                    echo "<th>Student Name</th>";
                    echo "<th>Nickname</th>";
                    echo "<th>isStudent</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row2 = mysqli_fetch_array($result2)) {
                        echo "<tr>";
                        echo "<td>" . $row2['id'] . "</td>";
                        echo "<td>" . $row2['username'] . "</td>";
                        echo "<td>" . $row2['password'] . "</td>";
                        echo "<td>" . $row2['name'] . "</td>";
                        echo "<td>" . $row2['nickname'] . "</td>";
                        if ($row2['isStudent'] == 0) {
                            echo "<td> Teacher </td>";
                        } else {
                            echo "<td> Student </td>";
                        }
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result2);
                } else {
                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                }
            } else {
                echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
            }

            mysqli_close($link);

            ?>

        </div>
    </div>
    </div>

    <?php
    echo "<script>
    console.log('id: " . $id . " | isStudent: " . $isStudent . " | nickname: " . $nickname . "');
    </script>";
    ?>
    <!-- Bootstrap Script  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>