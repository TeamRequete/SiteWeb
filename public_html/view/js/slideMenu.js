/*function openNav() {
    document.getElementById("headerBar").style.transition = "1s";
    document.getElementById("headerBar").style.visibility = "visible";
}

function closeNav() {
    document.getElementById("headerBar").style.transition = "1s";
    document.getElementById("headerBar").style.visibility = "hidden";
}*/


function openNav() {
    document.getElementById("headerBar").style.transition = "1s ease";
    document.getElementById("headerBar").style.transform = "translateX(0)";
}

function closeNav() {
    document.getElementById("headerBar").style.transition = "1s ease";
    document.getElementById("headerBar").style.transform = "translateX(-100%)";

}