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
    <title>Login Page</title>
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

        .register-link{
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
        if (isset($_POST["login"])) {
            $email= $_POST["email"];
            $password= $_POST["password"];

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // This will check if exist
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: homepage.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password is invalid!</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not exist!</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="image">
                <img src="image/login1.png" alt="login" class="logo">
            </div>
            <div class="form-group">
                <input type="email" placeholder="Email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div class="register-link"><br><p>Not registered yet? <a href="register.php">Register Here</a></p></div>
    </div>
</body>
</html>