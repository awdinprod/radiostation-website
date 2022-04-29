const modal_window = document.getElementById("modal");

const header_login_button = document.getElementById("loginBtn1");

const cross_button = document.getElementsByClassName("close")[0];

header_login_button.onclick = function () {
    modal_window.style.display = "block";
}

cross_button.onclick = function () {
    modal_window.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal_window) {
        modal_window.style.display = "none";
    }
}

