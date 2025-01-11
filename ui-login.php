<?php
include("config.php");
session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $sql = "SELECT id, isStudent, nickname FROM users WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        
        $isStudent = $row['isStudent'];
        $nickname = $row['nickname'];
        $id = $row['id'];

        $_SESSION['login_user'] = $username;
        $_SESSION['isStudent'] = $isStudent;
        $_SESSION['nickname'] = $nickname;
        $_SESSION['id'] = $id;
        header("location: ui-classroom-v2.php");
    } else {
        $error = "Invalid login. Try again!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f5ff;
            min-height: 100vh;
        }

        .login-container {
            max-width: 400px;
        }

        .custom-blue {
            background-color: #1a237e;
        }

        .btn-custom-blue {
            background-color: #1a237e;
            color: white;
        }

        .btn-custom-blue:hover {
            background-color: #0d1757;
            color: white;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">

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



    <div class="login-container p-4 bg-white rounded shadow-lg">
        <div class="text-center mb-4">
            <h2 class="text-primary fw-bold">School LMS</h2>
            <p class="text-muted">Please login to continue</p>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label fw-semibold">School ID</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>

            <?php if ($error) { ?>
                <div class="alert alert-danger mt-3">                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" fill="red">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg><?php echo $error; ?></div>
            <?php } ?>

            <div class="text-center mt-3">
                <a href="#" class="text-decoration-none">Forgot password?</a>
            </div>
            
            <div class="text-center">
            <small class="text-center mt-3">
                v0.2.3 16/12/2024
            </small>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>