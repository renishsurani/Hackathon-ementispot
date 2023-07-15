const email = document.getElementsByClassName("email-register")[0];
email.addEventListener("input", () => validate(email));

function validate(element) {
    if (element.validity.typeMismatch) {
        element.setCustomValidity("The Email is not in the right format!!!");
        element.reportValidity();
    } else {
        element.setCustomValidity("");  
    }
}

const password = document.getElementsByClassName("password-register")[0];
password.addEventListener("input", () => passwordValidation(password));

function passwordValidation(element) {
    if(element.value.length < 8) {
        element.setCustomValidity("password length must be at least 8 characters"); 
        element.reportValidity(); 
    } else {
        element.setCustomValidity("");
    }
}


const passwordConfirmation = document.getElementsByClassName("passwordConfirmation")[0];
passwordConfirmation.addEventListener('input', () => conformation(passwordConfirmation, password))

function conformation(passwordConfirmation, password) {
    if(passwordConfirmation.value === password.value) {
        passwordConfirmation.setCustomValidity("");
    } else {
        passwordConfirmation.setCustomValidity("password does not match");
        passwordConfirmation.reportValidity();   
    }
}
