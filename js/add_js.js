// Select UI elements or inputs
const form = $('#form');
const first_name = $('#first_name');
const last_name = $('#last_name')
const dob = $('#dob');
const country = $('#country');
const previous_team = $('#previous_team');
const salary = $('#salary');
const position = $('#position');
const contract_exp_date = $('#contract_exp_date');
const date_signed = $('#date_signed');

const date = $('#date');
const title = $('#title');
const image = $('#image');
const body = $('#body');




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



const validateForm = (e) =>{
    
    $('small').html('');
    errors = 0;

    checkRequired([first_name, last_name, dob, country, previous_team, position, date_signed, contract_exp_date, date, body, title, image]);
    checkInputLength(first_name, 2, 30);
    checkInputLength(last_name, 2, 30);
    checkInputLength(salary, 2, 8);
    checkInputLength(title, 5, 100);
    checkInputLength(body, 5, 20000);
    
    
    if(errors === 0){
        return true;
    }else{
        return false;
    }
}