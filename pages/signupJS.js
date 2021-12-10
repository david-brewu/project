// Select UI elements or inputs
const form = $('#form');
const first_name = $('#first_name');
const last_name = $('#last_name')
const email = $('#email');
const password = $('#password');
const confirm_password = $('#confirm_passwordd');




// error count
let errors = 0;

// show input error message
const showError = (displayPlace, message) => {
    displayPlace.html(message);
    errors += 1;
}

// check for required field
const checkRequired = (inputArr) => {
    
    inputArr.forEach(function(input){
        if(input.val() === '') {
            showError(input.next(), `${input.attr('id')} field is required`);
        }
    })
}

// check for input length
const checkInputLength = (input, min, max) => {

    if(input.val().length <= min){
        showError(input.next(), `${input.attr('id')} must be more than ${min} characters long`);
    } else if( input.val().length >= max){
        showError(input.next(), `${input.attr('id')} must be less than ${max} characters long`);
    }
}

const checkEmail = (input) => {
    const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(!regex.test(input.val())){
        showError(input.next(), 'Email is not valid');
    }
}

const checkPasswordMatch = (password1, password2) => {
    if(password1.val() != password2.val()){
        showError(password2.next(), 'Your passwords do not match');
    }
}


const validateForm = (e) =>{
    
    $('small').html('');
    errors = 0;

    // TODO check for required inputs
    checkRequired([first_name, last_name, email, password, confirm_password]);
    // TODO check for username length
    checkInputLength(first_name, 3, 50);
    checkInputLength(last_name, 3, 50);
    // TODO check for password length
    checkInputLength(password, 3, 50);
    // TODO check for valid email
    checkEmail(email);
    // TODO check if the passwords match
    checkPasswordMatch(password, confirm_password);

    if(errors === 0){
        return true;
    }else{
        return false;
    }
}