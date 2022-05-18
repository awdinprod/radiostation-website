const add_comment_modal_button = document.getElementById("commentBtn");

const comment_modal_window = document.getElementById("comment_modal");

const cross_comment_button = document.getElementsByClassName("close_comment")[0];

add_comment_modal_button.onclick = function () {
    comment_modal_window.style.display = "block";
}

cross_comment_button.onclick = function () {
    comment_modal_window.style.display = "none";
}

window.onclick = function (event) {
    if (event.target === comment_modal_window) {
        comment_modal_window.style.display = "none";
    }
}

