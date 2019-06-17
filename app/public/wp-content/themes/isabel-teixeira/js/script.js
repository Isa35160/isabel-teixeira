// Burger Menu
let burger = '.menu_burger';
let mainNav = '.header_nav_principal';
$(burger).on('click', function () {
    $(mainNav).attr("style", "display: block");
});


let author = document.getElementById('author');
if (author) {
    author.setAttribute("placeholder", "Nom");
}
let email = document.getElementById('email');
if (email) {
    email.setAttribute("placeholder", "Email");
}

let comment = document.getElementById('comment');
if (comment) {
    comment.setAttribute("placeholder", "Votre Message");
}

let submit = document.getElementById('submit');
if (submit) {
    submit.setAttribute("placeholder", "Envoyer");
}






