<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: homepage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form - Student Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style-register.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        :root{
            --color-1: #272727;
            --color-2: #747474;
            --color-3: #FF652F;
            --color-4: #FFE400;
            --color-5: #14A76C;
        }

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            padding: 50px;
            background-color: var(--color-1);
        }

        .container{
            max-width: 600px;
            margin: 0 auto;
            padding: 50px;
        }

        .form-group{
            margin-bottom: 30px;
        }

        .login-link{
            color: var(--color-5);
            text-align-last: center;
        }

        .form-control{
            height: 55px;
        }

        .form-btn{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image{
            height: 70px;
            margin: 40px; 
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
    if (isset($_POST["submit"])) {
        $fullName = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];

        // Encrypting the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        // Validating the placeholder
        if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors, "All fields are mandatory!");
        }
        // Validating the email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid!");
        }
        // Validating the password
        if (strlen($password) < 8) {
            array_push($errors, "Password must be at least 8 letters long!");
        }
        // Making suyre that the password is the same
        if ($password !== $passwordRepeat) {
            array_push($errors, "Password does not match");
        }

        require_once "database.php";

        $sql = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
            array_push($errors, "Email already exists!");
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Registered Successfully</div>";
            } else {
                die("Something went wrong");
            }
        }
    }
    ?>
        <form action="register.php" method="post">
            <div class="image">
                <img src="image/register1.png" alt="login" class="logo">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
            <div class="login-link"><br><p>Already registered yet? <a href="login.php">Login Here</a></p></div>
        </div>
    </div>
</body>
</html>