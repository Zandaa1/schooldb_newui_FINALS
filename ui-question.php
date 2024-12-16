<?php
include('session.php');
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>Quiz</title>
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
                    <a class="nav-link" href="#"> <i class="bi bi-list-task"></i> To Do</a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/avatar-placeholder.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $login_session; ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <!-- Remove most of these later -->
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="content">

            <div class="alert alert-danger" role="alert">
                <strong>WIP!</strong> Sidebar Style UI
            </div>

            <div class="container-fluid p-3">

                <h1>Test Name [Class Code]</h1>

                <div>
                    <span class="badge rounded-pill text-bg-primary">0/50</span>
                </div>

                <div class="container p-3 bg-light shadow-lg">

                    <?php
                    require_once "config.php";

                    $sql = "SELECT * FROM testquestion";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)) {
                                echo '<div class="mb-4">';
                                echo '<div><h3>Question #' . $row['id'] . '</h3></div>';
                                echo '<div><p>' . $row['question'] . '</p></div>';
                                echo '<b><p>Choose at least one correct answer</p></b>';
                                echo '<div class="answer-container">';
                                for ($i = 1; $i <= 5; $i++) {
                                    if (!empty($row['answer' . $i])) {
                                        echo '<div class="answer-format rounded">';
                                        echo '<input class="form-check-input" type="radio" name="question' . $row['id'] . '" id="q' . $row['id'] . '_option' . $i . '">';
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
                        <button class="btn btn-primary">Submit</button>
                    </div>

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