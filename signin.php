<?php

// session_start();
// if (isset($_SESSION['user'])) {
//     header("location:index.php");
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
            padding-top: 40px;
        }

        .content {
            margin-top: 8rem;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #495057;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group label {
            color: #fff;
        }

        .form-control {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php

    include_once "includes/connection.php";

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $connection->query($sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = 'yes';
                header("location:index.php");
                die();
            } else {
                echo "<div class= 'alert alert-danger'>Password doesn't match</div>";
            }
        } else {
            echo "<div class= 'alert alert-danger'>Email doesn't match</div>";
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 content mx-auto">
                <form class="login-form" method="post" action="signin.php">
                    <h2>Login</h2>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Accepter</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>