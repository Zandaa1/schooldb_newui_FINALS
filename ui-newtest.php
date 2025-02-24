<?php
include('session.php');
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>Creating new test...</title>
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
                <a href="ui-classroom-v2.php" class="btn btn-danger">Go back</a>
                    <h2 class="display-4">Create New Test</h2>

                    <form action="submit_newtest.php" method="post">
                        <label for="testName" class="form-label">Test Name:</label>
                        <input type="text" class="form-control" name="testName" id="testName" aria-describedby="helpId" placeholder="" required />
                       
                        <label for="dueDate" class="form-label">Set Due Date:</label>
                        <input type="date" class="form-control" name="dueDate" id="dueDate" aria-describedby="helpId" placeholder="" required />

                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Enter description" required></textarea>

                        <hr>

                        <div class="answer-format">
                            <h2>Question 1:</h2>
                            <div class="answer-container">
                                <label for="question1" class="form-label">Question:</label>
                                <input type="text" class="form-control" name="question1" id="question1" placeholder="Enter your question here" required />

                                <label for="option1_1" class="form-label">Option 1:</label>
                                <input type="text" class="form-control" name="option1_1" id="option1_1" placeholder="Enter option 1" required />

                                <label for="option1_2" class="form-label">Option 2:</label>
                                <input type="text" class="form-control" name="option1_2" id="option1_2" placeholder="Enter option 2" required />

                                <label for="option1_3" class="form-label">Option 3:</label>
                                <input type="text" class="form-control" name="option1_3" id="option1_3" placeholder="Enter option 3" required />

                                <label for="option1_4" class="form-label">Option 4:</label>
                                <input type="text" class="form-control" name="option1_4" id="option1_4" placeholder="Enter option 4" required />

                                <label for="option1_5" class="form-label">Option 5:</label>
                                <input type="text" class="form-control" name="option1_5" id="option1_5" placeholder="Enter option 5" required />

                                <label class="form-label">Correct Answer:</label>
                                <div class="correct-answer-container">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer1" id="correctAnswer1_1" value="option1" required>
                                        <label class="form-check-label" for="correctAnswer1_1">Option 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer1" id="correctAnswer1_2" value="option2">
                                        <label class="form-check-label" for="correctAnswer1_2">Option 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer1" id="correctAnswer1_3" value="option3">
                                        <label class="form-check-label" for="correctAnswer1_3">Option 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer1" id="correctAnswer1_4" value="option4">
                                        <label class="form-check-label" for="correctAnswer1_4">Option 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer1" id="correctAnswer1_5" value="option5">
                                        <label class="form-check-label" for="correctAnswer1_5">Option 5</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="answer-format">
                            <h2>Question 2:</h2>
                            <div class="answer-container">
                                <label for="question2" class="form-label">Question:</label>
                                <input type="text" class="form-control" name="question2" id="question2" placeholder="Enter your question here" required />

                                <label for="option2_1" class="form-label">Option 1:</label>
                                <input type="text" class="form-control" name="option2_1" id="option2_1" placeholder="Enter option 1" required />

                                <label for="option2_2" class="form-label">Option 2:</label>
                                <input type="text" class="form-control" name="option2_2" id="option2_2" placeholder="Enter option 2" required />

                                <label for="option2_3" class="form-label">Option 3:</label>
                                <input type="text" class="form-control" name="option2_3" id="option2_3" placeholder="Enter option 3" required />

                                <label for="option2_4" class="form-label">Option 4:</label>
                                <input type="text" class="form-control" name="option2_4" id="option2_4" placeholder="Enter option 4" required />

                                <label for="option2_5" class="form-label">Option 5:</label>
                                <input type="text" class="form-control" name="option2_5" id="option2_5" placeholder="Enter option 5" required />

                                <label class="form-label">Correct Answer:</label>
                                <div class="correct-answer-container">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer2" id="correctAnswer2_1" value="option1" required>
                                        <label class="form-check-label" for="correctAnswer2_1">Option 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer2" id="correctAnswer2_2" value="option2">
                                        <label class="form-check-label" for="correctAnswer2_2">Option 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer2" id="correctAnswer2_3" value="option3">
                                        <label class="form-check-label" for="correctAnswer2_3">Option 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer2" id="correctAnswer2_4" value="option4">
                                        <label class="form-check-label" for="correctAnswer2_4">Option 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer2" id="correctAnswer2_5" value="option5">
                                        <label class="form-check-label" for="correctAnswer2_5">Option 5</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="answer-format">
                            <h2>Question 3:</h2>
                            <div class="answer-container">
                                <label for="question3" class="form-label">Question:</label>
                                <input type="text" class="form-control" name="question3" id="question3" placeholder="Enter your question here" required />

                                <label for="option3_1" class="form-label">Option 1:</label>
                                <input type="text" class="form-control" name="option3_1" id="option3_1" placeholder="Enter option 1" required />

                                <label for="option3_2" class="form-label">Option 2:</label>
                                <input type="text" class="form-control" name="option3_2" id="option3_2" placeholder="Enter option 2" required />

                                <label for="option3_3" class="form-label">Option 3:</label>
                                <input type="text" class="form-control" name="option3_3" id="option3_3" placeholder="Enter option 3" required />

                                <label for="option3_4" class="form-label">Option 4:</label>
                                <input type="text" class="form-control" name="option3_4" id="option3_4" placeholder="Enter option 4" required />

                                <label for="option3_5" class="form-label">Option 5:</label>
                                <input type="text" class="form-control" name="option3_5" id="option3_5" placeholder="Enter option 5" required />

                                <label class="form-label">Correct Answer:</label>
                                <div class="correct-answer-container">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer3" id="correctAnswer3_1" value="option1" required>
                                        <label class="form-check-label" for="correctAnswer3_1">Option 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer3" id="correctAnswer3_2" value="option2">
                                        <label class="form-check-label" for="correctAnswer3_2">Option 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer3" id="correctAnswer3_3" value="option3">
                                        <label class="form-check-label" for="correctAnswer3_3">Option 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer3" id="correctAnswer3_4" value="option4">
                                        <label class="form-check-label" for="correctAnswer3_4">Option 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer3" id="correctAnswer3_5" value="option5">
                                        <label class="form-check-label" for="correctAnswer3_5">Option 5</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="answer-format">
                            <h2>Question 4:</h2>
                            <div class="answer-container">
                                <label for="question4" class="form-label">Question:</label>
                                <input type="text" class="form-control" name="question4" id="question4" placeholder="Enter your question here" required />

                                <label for="option4_1" class="form-label">Option 1:</label>
                                <input type="text" class="form-control" name="option4_1" id="option4_1" placeholder="Enter option 1" required />

                                <label for="option4_2" class="form-label">Option 2:</label>
                                <input type="text" class="form-control" name="option4_2" id="option4_2" placeholder="Enter option 2" required />

                                <label for="option4_3" class="form-label">Option 3:</label>
                                <input type="text" class="form-control" name="option4_3" id="option4_3" placeholder="Enter option 3" required />

                                <label for="option4_4" class="form-label">Option 4:</label>
                                <input type="text" class="form-control" name="option4_4" id="option4_4" placeholder="Enter option 4" required />

                                <label for="option4_5" class="form-label">Option 5:</label>
                                <input type="text" class="form-control" name="option4_5" id="option4_5" placeholder="Enter option 5" required />

                                <label class="form-label">Correct Answer:</label>
                                <div class="correct-answer-container">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer4" id="correctAnswer4_1" value="option1" required>
                                        <label class="form-check-label" for="correctAnswer4_1">Option 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer4" id="correctAnswer4_2" value="option2">
                                        <label class="form-check-label" for="correctAnswer4_2">Option 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer4" id="correctAnswer4_3" value="option3">
                                        <label class="form-check-label" for="correctAnswer4_3">Option 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer4" id="correctAnswer4_4" value="option4">
                                        <label class="form-check-label" for="correctAnswer4_4">Option 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer4" id="correctAnswer4_5" value="option5">
                                        <label class="form-check-label" for="correctAnswer4_5">Option 5</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="answer-format">
                            <h2>Question 5:</h2>
                            <div class="answer-container">
                                <label for="question5" class="form-label">Question:</label>
                                <input type="text" class="form-control" name="question5" id="question5" placeholder="Enter your question here" required />

                                <label for="option5_1" class="form-label">Option 1:</label>
                                <input type="text" class="form-control" name="option5_1" id="option5_1" placeholder="Enter option 1" required />

                                <label for="option5_2" class="form-label">Option 2:</label>
                                <input type="text" class="form-control" name="option5_2" id="option5_2" placeholder="Enter option 2" required />

                                <label for="option5_3" class="form-label">Option 3:</label>
                                <input type="text" class="form-control" name="option5_3" id="option5_3" placeholder="Enter option 3" required />

                                <label for="option5_4" class="form-label">Option 4:</label>
                                <input type="text" class="form-control" name="option5_4" id="option5_4" placeholder="Enter option 4" required />

                                <label for="option5_5" class="form-label">Option 5:</label>
                                <input type="text" class="form-control" name="option5_5" id="option5_5" placeholder="Enter option 5" required />

                                <label class="form-label">Correct Answer:</label>
                                <div class="correct-answer-container">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer5" id="correctAnswer5_1" value="option1" required>
                                        <label class="form-check-label" for="correctAnswer5_1">Option 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer5" id="correctAnswer5_2" value="option2">
                                        <label class="form-check-label" for="correctAnswer5_2">Option 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer5" id="correctAnswer5_3" value="option3">
                                        <label class="form-check-label" for="correctAnswer5_3">Option 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer5" id="correctAnswer5_4" value="option4">
                                        <label class="form-check-label" for="correctAnswer5_4">Option 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctAnswer5" id="correctAnswer5_5" value="option5">
                                        <label class="form-check-label" for="correctAnswer5_5">Option 5</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-primary">Submit</button>
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