// Scroll Events
window.onscroll = function() { scrollFunction(); };
let nav = document.getElementById("navindex");
let navText = document.getElementById("nav-text");
let navCollapse = document.getElementById("navbarSupportedContent");

function scrollFunction() {
    if (document.documentElement.scrollTop > 10) {
        nav.setAttribute("style", "height: 15vh; background: #6F584B !important");
        navCollapse.setAttribute("style", "background: #6F584B !important");
        navText.setAttribute("style", "color: #c38f3c");


    } else {
        nav.setAttribute("style", "height: 20vh; background: transparent !important");
        navCollapse.setAttribute("style", "background: transparent !important");
        navText.setAttribute("style", "color: white");
    }
}