<?php
include('session.php');
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>Title</title>
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
                    <strong><?php echo $login_session;?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <!-- Remove most of these later -->
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="ui-login.php">Sign out</a></li>
                </ul>
            </div>
        </div>


        <!-- Content -->

        <div class="content">

            <div class="container-fluid p-3">

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

                <div class="d-flex align-items-center p-3 my-3 text-white bg-dark rounded shadow-sm">
                    <a href="#activity1Details" class="text-white text-decoration-none w-100" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="activity1Details">
                        <div class="lh-1">
                            <h2 class="h6 mb-0 text-white">Activity 1 - Test</h2>
                            <small>Due on Dec 9</small>
                        </div>
                    </a>
                </div>

                <div class="collapse" id="activity1Details">
                    <div class="card card-body bg-dark text-white">
                        <div>
                            <span class="badge rounded-pill text-bg-primary">0/50</span>
                        </div>
                        <p>Details about Activity 1 - Test. This activity covers chapters 1-3 of the textbook and includes multiple-choice and short-answer questions.</p>
                        <button class="btn btn-primary" onclick="location.href='ui-question.php'">Answer Activity</button>
                    </div>
                </div>

                <div class="d-flex align-items-center p-3 my-3 text-white bg-dark rounded shadow-sm">
                    <a href="#activity2Details" class="text-white text-decoration-none w-100" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="activity1Details">
                        <div class="lh-1">
                            <h2 class="h6 mb-0 text-white">Activity 1 - Test</h2>
                            <small>Due on Dec 9</small>
                        </div>
                    </a>
                </div>

                <div class="collapse" id="activity2Details">
                    <div class="card card-body bg-dark text-white">
                        <div>
                            <span class="badge rounded-pill text-bg-primary">0/50</span>
                        </div>
                        <p>Details about Activity 1 - Test. This activity covers chapters 1-3 of the textbook and includes multiple-choice and short-answer questions.</p>
                        <button class="btn btn-primary" onclick="location.href='ui-question.html'">Answer Activity</button>
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