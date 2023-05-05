//let container = document.querySelector(".greetUser")
//;
//let timeNow = new Date().getHours();
//console.log(timeNow);

//Greeting the user with the day
var myDate = new Date();
var hrs = myDate.getHours();

var greet;

if (hrs < 12)
    greet = 'Good Morning';
else if (hrs >= 12 && hrs <= 17)
    greet = 'Good Afternoon';
else if (hrs >= 17 && hrs <= 24)
    greet = 'Good Evening';

document.getElementById('greetUser').innerHTML =
    greet + '!';