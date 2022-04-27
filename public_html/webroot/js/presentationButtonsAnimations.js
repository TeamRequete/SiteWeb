$(document).ready(function() {

});

var pos = 0;

function before() {
    if (pos >= -200 && pos < 0) {
        pos += 100;
        for (let index = 0; index < 3; index++) {
            document.getElementsByClassName("content")[index].style.transition = "1s ease"
            document.getElementsByClassName("content")[index].style.transform = "translateX(" + pos + "%)";
        }
    }
}

function after() {
    if (pos > -200 && pos <= 0) {
        pos -= 100;
        for (let index = 0; index < 3; index++) {
            document.getElementsByClassName("content")[index].style.transition = "1s ease"
            document.getElementsByClassName("content")[index].style.transform = "translateX(" + pos + "%)";


        }
    }
}