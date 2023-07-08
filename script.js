// Greeting the user with the day
var myTime = new Date();
var hrs = myTime.getHours();

var greeting;

if (hrs < 12)
    greeting = 'Good Morning';
else if (hrs >= 12 && hrs <= 17)
    greeting = 'Good Afternoon';
else if (hrs >= 17 && hrs <= 24)
    greeting = 'Good Evening';

document.getElementById('greetUser').innerHTML =
    greeting + '!';

// Carousel
// Array of image URLs for each day of the week
var images = [
    "image/image1.png",
    "image/image2.png",
    "image/image3.png",
    "image/image4.png",
    "image/image5.png",
    "image/image6.png",
    "image/image7.png"
  ];
  
  // Get current day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
  var today = new Date().getDay();
  
  // Set the initial image source to the corresponding day's image
  document.getElementById("image").src = images[today];
  
  // Increment the day every 24 hours and update the image source accordingly
  setInterval(function() {
    today = (today + 1) % 7;
    document.getElementById("image").src = images[today];
  }, 24 * 60 * 60 * 1000); // Change image every 24 hours

// Calendar
const currentDate = document.querySelector(".current-date"),
daysTag = document.querySelector(".days"),
prevNextIcon = document.querySelectorAll(".icons span");

// Getting the new date, current year and also month
let date = new Date(),
currYear = date.getFullYear(), 
currMonth = date.getMonth();

const months = ["January", "February", "March", "April", "May", "June",
                "July", "Augest", "September", "October", "November", "December"];

const renderCalendar = () => {
    let firstDatofMonth = new Date(currYear, currMonth, 1).getDay(),  // Getting the first day of the month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // Getting the last date of the month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // Getting the last day of the month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // Getting the last date of the previous month
    let liTag = "";

    for (let i = firstDatofMonth; i > 0; i--) { // Creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    } 

    for (let i = 1; i <= lastDateofMonth; i++) { // Creating li of all days of current month
        // Adding active class to li if the current day, month, and year are matched 
        let isToday = i === date.getDate() && currMonth === new Date().getMonth()
                      && currYear === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { // Creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
    }

    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => {
    icon.addEventListener("click", () => { // Adding click event on both icons
        // If clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { // If current month is less than 0 or greater than 11
            // Creating a new date of current year and month and pass it as a date value
            date = new Date(currYear, currMonth);

            currYear = date.getFullYear(); // Updating current year with new date year
            currMonth = date.getMonth(); // Updating current month with new date month
        } else { // Else pass new Date as date value
            date = new Date();
        }
        renderCalendar();
    })
})

// Tasks
// Function to save the tasks to local storage
function saveTasks() {
    var tasks = document.querySelectorAll(".task");
    var taskList = [];

    tasks.forEach(function(task) {
        var taskName = task.querySelector("#taskname").textContent;
        taskList.push(taskName);
    });

    localStorage.setItem("tasks", JSON.stringify(taskList));
}

// Function to load tasks from local storage
function loadTasks() {
    var storedTasks = localStorage.getItem("tasks");

    if (storedTasks) {
        var taskList = JSON.parse(storedTasks);

        taskList.forEach(function(taskName) {
            var newTask = `
                <div class="task">
                    <span id="taskname">${taskName}</span>
                    <button class="delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            `;

            document.querySelector("#tasks").innerHTML += newTask;
        });

        addDeleteHandlers();
        addCompletedHandlers();
    }
}

// Function to add click event handlers to the delete buttons
function addDeleteHandlers() {
    var deleteButtons = document.querySelectorAll(".delete");

    deleteButtons.forEach(function(button) {
        button.onclick = function() {
            this.parentNode.remove();
            saveTasks();
        };
    });
}

// Function to add click event handlers to the task elements
function addCompletedHandlers() {
    var tasks = document.querySelectorAll(".task");

    tasks.forEach(function(task) {
        task.onclick = function() {
            this.classList.toggle("completed");
            saveTasks();
        };
    });
}

// Event handler for adding new tasks
document.querySelector("#push").onclick = function() {
    var inputField = document.querySelector("#newtask input");
    var taskName = inputField.value.trim();

    if (taskName.length === 0) {
        alert("Please Enter a Task");
    } else {
        var newTask = `
            <div class="task">
                <span id="taskname">${taskName}</span>
                <button class="delete">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        `;

        document.querySelector("#tasks").innerHTML += newTask;
        inputField.value = "";

        addDeleteHandlers();
        addCompletedHandlers();
        saveTasks();
    }
};

// Load tasks when the page is loaded
loadTasks();

// Bookmark
function gotoLink(link){
    console.log(link.value);
    window.open(link.value);
};

// This button is for the login and register button
document.addEventListener("DOMContentLoaded", function() {
    // Find the login button
    var loginButton = document.querySelector(".btnLogin-popup");

    // Add click event listener to the button
    loginButton.addEventListener("click", function() {
        // Redirect to login.php
        window.location.href = "login.php";
    });
});