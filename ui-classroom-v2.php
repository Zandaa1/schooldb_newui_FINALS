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
    <div class="wrapper">
        <div class="sidebar">
            <h2>School DBMS</h2>

            <small style="color:grey;"><?php

                                        if ($isStudent == 1) {
                                            echo 'Student Portal';
                                        } else {
                                            echo 'Teacher Portal';
                                        }

                                        ?></small>
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
                    <strong><?php echo $nickname; ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <!-- Remove most of these later -->

                    
                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="container-fluid p-3">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" fill="red">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    Please check back later.
                </div>


                <!-- Remove on release DEV MENU -->
                <a href="ui-devmenu.php" class="btn btn-danger">Dev Menu</a>
                <?php echo '<p>(0 = Teacher, 1 = Student) Current User: ' . $isStudent . '</p>' ?>

                <h1>Welcome back, <?php
                                    if ($isStudent == 0) {
                                        echo 'Teacher ';
                                    }

                                    echo $nickname;
                                    ?>!</h1>

<?php 

require_once "config.php";

$sql = "SELECT classrooms.className, users.name AS teacher_name FROM classrooms 
        JOIN users ON classrooms.classIDTeacher = users.id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            echo '<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-3">';
            echo '<div class="col">';
            echo '<a href="ui-studentClass.php" class="text-decoration-none">';
            echo '<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url(\'img/sci.png\');">';
            echo '<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">';
            echo '<h4 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">' . $row['className'] . '</h4>';
            echo '<ul class="d-flex list-unstyled mt-auto">';
            echo '<li class="me-auto">';
            echo '<img src="img/avatar-placeholder.jpg" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">';
            echo '<small>' . $row['teacher_name'] . '</small>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
        }
        mysqli_free_result($result);
    } else {
        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>
            </div>
        </div>
    </div>

    <!-- Bootstrap Script  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>