const signup_form = document.querySelector("#signup_form");
const password1 = document.querySelector("#password1");
const password2 = document.querySelector("#password2");

var mailformat = /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;

signup_form.addEventListener("submit", e => {
    if (mailformat.test(signup_form.Email.value)) {
        if (!checkPassword(password1,password2)) {
            e.preventDefault();
        }
    } else {
        alert( "Please enter a valid email");
        e.preventDefault();
    }
});