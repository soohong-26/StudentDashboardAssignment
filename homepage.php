<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>Student Dashboard Assignment</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
        <!-- JavaScript -->
        <script src="script.js" defer></script>

        <style>
            :root{
                --color-1: #272727;
                --color-2: #747474;
                --color-3: #FF652F;
                --color-4: #FFE400;
                --color-5: #14A76C;
                --color-6: #5DA0FF;
                --color-7: #C14784;
            }
            .anchors{
                text-decoration: none;
                color: var(--color-5);
                margin: 20px;
            }

            .calendarGrid h2{
                color: var(--color-4);
            }

            .bookmarks .container-bookmark{
                margin: 10px;
                width: 80%;
                height: 60px;
                background: none;
                border-radius: 5px;
                cursor: pointer;
                border: 2px solid var(--color-5);
                color: var(--color-5);
                font-weight: 500;
                font-size: 17px;
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            }
            /* Bookmarks */
            .box{
                background: var(--color-1);
                padding: 15px;
                border-radius: 5px;
                width: 100%;
                text-align: center;
                border: 2px solid var(--color-3);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            }

            /* Calendar */
            .calendarGrid{
                width: 80%;
                background: none;
                border-radius: 11px;
                margin-right: auto;
                margin-left: auto;
                margin-top: 25px;
            }

            .calendar ul{
                display: flex;
                list-style: none;
                flex-wrap: wrap;
                color: var(--color-2);
                text-align: center;
            }

            .bookmarksGrid h2{
                text-align: center;
                color: var(--color-5);
            }

            #newtask{
                background: none;
                padding: 30px 10px;
                border-radius: 5px;
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
                position: relative;
            }

            .tasksGrid h2{
                text-align: center;
                color: var(--color-3);
            }

            #newtask input{
                width: 70%;
                width: 70%;
                height: 45px;
                font-family: 'Poppins', sans-serif;
                font-size: 15px;
                border: 2px solid var(--color-3);
                padding: 12px;
                color: var(--color-3);
                font-weight: 500;
                position: relative;
                border-radius: 5px;
                background: none;
            }

            #newtask input:focus{
                outline: none;
                border-color: var(--color-2);
            }

            .task{
                background: none;
                height: 50px;
                padding: 5px 10px;
                margin-top: 10px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border: 2px solid var(--color-3);
            }

            .task button{
                background: none;
                color: var(--color-3);
                height: 100%;
                width: 40px;
                border-radius: 5px;
                border: none;
                cursor: pointer;
                outline: none;
            }

            #newtask{
                background: none;
                padding: 30px 10px;
                border-radius: 5px;
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
                position: relative;
                border: 2px solid var(--color-3);
            }

            #newtask input::placeholder{
                color: var(--color-3);
                opacity: 1;
            }

            #newtask button{
                position: relative;
                float: right;
                width: 20%;
                height: 45px;
                border-radius: 5px;
                font-family: 'Poppins', sans-serif;
                font-weight: 500;
                background: none;
                font-size: 16px;
                border: 2px solid var(--color-3);
                cursor: pointer;
                color: var(--color-3);
            }

            #tasks{
                background: none;
                padding: 30px 20px;
                margin-top: 60px;
                border-radius: 10px;
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
                width: 100%;
                position: relative;
                color: var(--color-3);
                border: 2px solid var(--color-3);
            }

            .greetUserGrid{
                margin: 1rem;
                color: var(--color-6);
                font-size: 20px;
                padding-top: 10px;
                align-items: center;
                justify-content: center;
            }

            .box{
                background: var(--color-1);
                padding: 15px;
                border-radius: 5px;
                width: 100%;
                text-align: center;
                border: 2px solid var(--color-6);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            }
        </style>
    </head>
    
    <body>
        <header>
            <h1>
                <b>Student Dashboard</b>
                <div class="navigation-bar">
                    <a class="anchors" href="about.php">About</a>
                    <a class="anchors" href="logout.php">Logout</a>
                </div>
            </h1>
        </header>

        <div id="container">
            <!-- Greeting the user -->
            <div class="greetUserGrid">
                <!-- Greeting Box -->
                <div class="box">
                    <p id="greetUser"></p>
                </div>

                <!-- News Box -->
                <div id="carousel">
                    <img id="image" src="quotes" alt="Carousel Image">
                </div>
            </div>
            
            <!-- Calendar Section -->
            <div class="calendarGrid">
                <h2>Calendar</h2>
                <header>
                    <p class="current-date"></p>
                    <div class="icons">
                        <!-- <span id="prev" class="material-symbols-rounded">chevron_left</span>
                        <span id="next" class="material-symbols-rounded">chevron_right</span> -->
                        <span id="prev"><</span>
                        <span id="next">></span>
                    </div>
                </header>
                <div class="calendar">
                    <ul class="weeks">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                    </ul>
                    <ul class="days"></ul>
                </div>
            </div>
          
            <!-- Tasks Section -->
            <div class="tasksGrid">
                <h2>Tasks</h2>  
                    <div class="taskContainer">
                        <div id="newtask">
                            <input type="text" placeholder="Task to be done">
                            <button id="push">Add</button>
                        </div>

                        <div id="tasks">
                        </div>
                    </div>
            </div>
            
            <!-- Book Marking Section -->
            <div class="bookmarksGrid">
                <h2>Bookmarks</h2>
                <div class="bookmarks">
                    <!-- YouTube -->
                    <button class="container-bookmark" onclick="gotoLink(this)" value="https://www.youtube.com">
                        YouTube
                    </button>
                    <!-- Canvas -->
                    <button class="container-bookmark" onclick="gotoLink(this)" value="https://newinti.instructure.com/login/canvas">
                        Canvas INTI
                    </button>
                    <!-- GitHub -->
                    <button class="container-bookmark" onclick="gotoLink(this)" value="https://github.com/">
                        GitHub
                    </button>
                    <!-- Gmail -->
                    <button class="container-bookmark" onclick="gotoLink(this)" value="https://www.gmail.com">
                        Gmail
                    </button>
                </div>
                
            </div>
        </div>

    
    </body>
    
</html>