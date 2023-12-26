<?php

session_start();
if (isset($_SESSION['user'])) {
    // header("location:signin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulaire d'inscription</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
            padding-top: 40px;
        }

        .content {
            margin-top: 4rem;
        }

        .contet {
            color: white;
            display: flex;
            justify-content: center;
            margin-top: 0.8rem;
        }

        .registration-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #495057;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .registration-form h2 {
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

        .wrong {
            width: 25rem;
            text-align: center;
            margin-left: 35rem;

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

    $errors = [];

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];

        // Validate input
        if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
            $errors[] = "All fields are required";
        }

        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long";
        }

        if ($password !== $passwordRepeat) {
            $errors[] = "Passwords don't match";
        }

        if (empty($errors)) {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $existingUser = $result->fetch_assoc();

            if ($existingUser) {
                $errors[] = "Email already exists. Please choose a different one.";
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = $connection->prepare($insertQuery);
                $stmt->bind_param("sss", $username, $email, $passwordHash);
                $stmt->execute();

                header("Location: signin.php");
                exit();
            }
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 content mx-auto">
                <form class="registration-form" action="signup.php" method="post">
                    <h2>Formulaire d'inscription</h2>
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur :</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordRepeat">Confirmation de passe :</label>
                        <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    <a href="signin.php" class="contet">Login</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>