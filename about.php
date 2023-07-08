<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- CSS -->
    <link href="about.css" rel="stylesheet">
    <!-- JavaScript -->
    <script src="script.js" defer></script>
    <!-- Icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Find the login button
            var loginButton = document.querySelector(".btnLogin-popup");

            // Add click event listener to the button
            loginButton.addEventListener("click", function() {
                // Redirect to login.php
                window.location.href = "login.php";
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Find the login button
            var loginButton = document.querySelector(".btnRegister-popup");

            // Add click event listener to the button
            loginButton.addEventListener("click", function() {
                // Redirect to login.php
                window.location.href = "register.php";
            });
        });
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root{
    --color-1: #272727;
    --color-2: #747474;
    --color-3: #FF652F;
    --color-4: #FFE400;
    --color-5: #14A76C;
}

html, body {
    height: 100%;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: var(--color-1);
  }
  
.description-box{
    text-align: center;
  }
  
.description-box p{
    font-size: 18px;
}
  

header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 100px;
    background: var(--color-1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;
}

.logo{
    font-size: 2em;
    color: #ffffff;
    user-select: none;
}

.logo-image{
    width: 10%;
    height: 10%;
    border-radius: 0;
}

.navigation .btnLogin-popup{
    width: 130px;
    height: 50px;
    background: transparent;
    border: 2px solid var(--color-5) ;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1.1em;
    color: var(--color-5);
    font-weight: 500;
    margin-left: 40px;
    transition: .5s;
}

.navigation .btnRegister-popup{
    width: 130px;
    height: 50px;
    background: transparent;
    border: 2px solid var(--color-5) ;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1.1em;
    color: var(--color-5);
    font-weight: 500;
    margin-left: 40px;
    transition: .5s;
}

.navigation .btnLogin-popup:hover{
    background: var(--color-5);
    color: #162938;
}

.navigation .btnRegister-popup:hover{
    background: var(--color-5);
    color: #162938;
}

.description-box{
    color: var(--color-2);
    justify-content: center;
    align-items: center;
}

.description-box p{
    font-size: 20px;
    font-weight: 500;
}

.button{
    align-items: center;
    justify-content: center;
}

.image-banner{
    margin-bottom: 35px;
}

    </style>
</head>
<body>
    <header>
        <img src="image/SooBoardLogo.png" alt="owner" class="logo-image">
            <nav class="navigation">
                <button class="btnLogin-popup">
                    Login
                </button>
                <button class="btnRegister-popup">
                    Register
                </button>
            </nav>
    </header>

    <div class="description-box">
        <img src="image/StudentDashboard.png" alt="owner" class="image-banner">
        <p>Welcome to my Student Dashboard.
            <br><br>
            It is a simple dashboard with all the features needed
            <br>
            by a basic student.
            <br><br>
            Click the button above to either login or register.
        </p>
    </div>

</body>
</html>