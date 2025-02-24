<?php
include('session.php');
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

        .correct-answer-container {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <?php require_once('ui-sidebar.php'); ?>

    <div class="content">
        <div class="container-fluid p-3">
            <div class="mb-3">
                <div
                    class="alert alert-danger"
                    role="alert"
                >
                    <strong>WIP!</strong> Feature Not Implemented!
                </div>
                
                <a href="ui-classroom-v2.php" class="btn btn-primary">Go back</a>
                <h2 class="display-4">Create new announcement</h2>

                <form action="">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name=""
                            id=""
                            aria-describedby="helpId"
                            placeholder="" />

                        <label for="">What is your announcement?</label>
                        <input type="text"
                            class="form-control">
                    </div>



                </form>

            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>