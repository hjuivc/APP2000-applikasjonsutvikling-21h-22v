var menuButton = document.getElementById("menuClosed");
var sideMenu = document.getElementById("sideMenu");

var menuIcon = "https://www.svgrepo.com/show/336031/hamburger-button.svg";
var xIcon = "https://www.svgrepo.com/show/349933/x.svg";

var visible = "visibility: visible";
var hidden = "visibility: hidden";

var menuOpen = false;

menuButton.onclick = function expandMenu() {
  if (menuOpen) {
    menuButton.src = menuIcon;
    sideMenu.style = hidden;
    menuOpen = false;
  } else {
    menuButton.src = xIcon;
    sideMenu.style = visible;
    menuOpen = true;
  }
};