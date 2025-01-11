<?php
include('session.php');

// Define variables and initialize with empty values
$question = $answer1 = $answer2 = $answer3 = $answer4 = $correct = "";
$question_err = $answer1_err = $answer2_err = $answer3_err = $answer4_err = $correct_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate question
    $input_question = trim($_POST["question"]);
    if(empty($input_question)){
        $question_err = "Please enter a question.";
    } else{
        $question = $input_question;
    }
    
    // Validate answer1
    $input_answer1 = trim($_POST["answer1"]);
    if(empty($input_answer1)){
        $answer1_err = "Please enter the first answer.";
    } else{
        $answer1 = $input_answer1;
    }

    // Validate answer2
    $input_answer2 = trim($_POST["answer2"]);
    if(empty($input_answer2)){
        $answer2_err = "Please enter the second answer.";
    } else{
        $answer2 = $input_answer2;
    }

    // Validate answer3
    $input_answer3 = trim($_POST["answer3"]);
    if(empty($input_answer3)){
        $answer3_err = "Please enter the third answer.";
    } else{
        $answer3 = $input_answer3;
    }

    // Validate answer4
    $input_answer4 = trim($_POST["answer4"]);
    if(empty($input_answer4)){
        $answer4_err = "Please enter the fourth answer.";
    } else{
        $answer4 = $input_answer4;
    }

    // Validate correct answer
    $input_correct = trim($_POST["correct"]);
    if(empty($input_correct)){
        $correct_err = "Please enter the correct answer.";
    } else{
        $correct = $input_correct;
    }

    // Check for errors before inserting in database
    if(empty($question_err) && empty($answer1_err) && empty($answer2_err) && empty($answer3_err) && empty($answer4_err) && empty($correct_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO questions (question, answer1, answer2, answer3, answer4, correct) VALUES (?, ?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_question, $param_answer1, $param_answer2, $param_answer3, $param_answer4, $param_correct);
            
            // Set parameters
            $param_question = $question;
            $param_answer1 = $answer1;
            $param_answer2 = $answer2;
            $param_answer3 = $answer3;
            $param_answer4 = $answer4;
            $param_correct = $correct;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
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


                    <li><a class="dropdown-item" href="ui-login.php">Sign out</a></li>
                </ul>
            </div>
        </div>


        <!-- Content -->

        <div class="content">

            <div class="container-fluid p-3">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add a test question to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question" class="form-control <?php echo (!empty($question_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $question; ?>">
                            <span class="invalid-feedback"><?php echo $question_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Answer #1</label>
                            <input type="text" name="answer1" class="form-control <?php echo (!empty($answer1_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $answer1; ?>">
                            <span class="invalid-feedback"><?php echo $answer1_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Answer #2</label>
                            <input type="text" name="answer2" class="form-control <?php echo (!empty($answer2_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $answer2; ?>">
                            <span class="invalid-feedback"><?php echo $answer2_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Answer #3</label>
                            <input type="text" name="answer3" class="form-control <?php echo (!empty($answer3_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $answer3; ?>">
                            <span class="invalid-feedback"><?php echo $answer3_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Answer #4</label>
                            <input type="text" name="answer4" class="form-control <?php echo (!empty($answer4_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $answer4; ?>">
                            <span class="invalid-feedback"><?php echo $answer4_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Correct Answer</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct" id="correct1" value="1" <?php echo ($correct == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="correct1">Answer #1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct" id="correct2" value="2" <?php echo ($correct == 2) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="correct2">Answer #2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct" id="correct3" value="3" <?php echo ($correct == 3) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="correct3">Answer #3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct" id="correct4" value="4" <?php echo ($correct == 4) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="correct4">Answer #4</label>
                                </div>
                            </div>
                            <span class="invalid-feedback d-block"><?php echo $correct_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
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