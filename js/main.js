let login = document.querySelector('#login');
let password = document.querySelector('#password');
let userName = document.querySelector('#name');
let surname = document.querySelector('#surname');
let country = document.querySelector('#country');
let city = document.querySelector('#city');
let phone =document.querySelector('#phone');
let btnreg = document.querySelector('#btnreg');

let checkInput = () => {
    if (login.value != '' &&
    password.value != '' &&
    userName.value != '' &&
    surname.value != '' &&
    country.value != '' &&
    phone.value != '' &&
    city.value != '') { 
        btnreg.disabled = false; 
    } 
    else btnreg.disabled = true;
}


login.addEventListener('keyup', checkInput);
password.addEventListener('keyup', checkInput);
userName.addEventListener('keyup', checkInput);
surname.addEventListener('keyup', checkInput);
country.addEventListener('keyup', checkInput);
city.addEventListener('keyup', checkInput);
phone.addEventListener('keyup', checkInput);