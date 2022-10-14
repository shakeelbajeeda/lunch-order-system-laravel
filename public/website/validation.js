const firstNameEL = document.querySelector('#firstName');
const lastNameEL = document.querySelector('#lastName');
const contact_numberEL = document.querySelector('#contact_number');
const credit_cardEL = document.querySelector('#credit_card');
const expire_dateEL = document.querySelector('#expire_date');
const cvv_numberEL = document.querySelector('#cvv_number');
const studentid = document.querySelector('#studentid');
const emailEl = document.querySelector('#email');
const passwordEl = document.querySelector('#password');
const confirmPasswordEl = document.querySelector('#confirm-password');

const form = document.querySelector('#signup');


const checkFirstname = () => {

    let valid = false;

    const min = 3,
        max = 25;

    const firstName = firstNameEl.value.trim();

    if (!isRequired(firstName)) {
        showError(firstNameEl, 'First Name cannot be blank.');
        alert("hi");
    } else if (!isBetween(firstName.length, min, max)) {
        showError(firstNameEl, `First Name must be between ${min} and ${max} characters.`)
    } else {
        showSuccess(lastnameEl);
        valid = true;
    }
    return valid;
};

const checkLastname = () => {

    let valid = false;

    const min = 3,
        max = 25;

    const lastName = lastNameEl.value.trim();

    if (!isRequired(lastName)) {
        showError(lastNameEl, 'Last Name cannot be blank.');
    } else if (!isBetween(lastName.length, min, max)) {
        showError(lastNameEl, `Last Name must be between ${min} and ${max} characters.`)
    } else {
        showSuccess(lastnameEl);
        valid = true;
    }
    return valid;
};

const checkcreditcardnumber = () => {

    let valid = false;

    const min = 14,
        max = 16;

    const credit_card = credit_cardEL.value.trim();

    if (!isRequired(credit_card)) {
        showError(credit_cardEl, 'Credit Card Number cannot be blank.');
    } else if (!isBetween(credit_card.length, min, max)) {
        showError(credit_cardEl, `Contact Number must be ${min} and ${max}  Digits.`)
    } else {
        showSuccess(credit_cardEl);
        valid = true;
    }
    return valid;
};


const checkcontactnumber = () => {

    let valid = false;

    const min = 10,
        max = 10;

    const contact_number = contact_numberEl.value.trim();

    if (!isRequired(contact_number)) {
        showError(contact_numberEl, 'Contact Number cannot be blank.');
    } else if (!isBetween(contact_number.length, min, max)) {
        showError(contact_numberEl, `Contact Number must be 10 Digits.`)
    } else {
        showSuccess(contact_numberEl);
        valid = true;
    }
    return valid;
};


const checkexpiredate = () => {

    let valid = false;

    const min = 10,
        max = 10;

    const expire_date = expire_dateEL.value.trim();

    if (!isRequired(expire_date)) {
        showError(expire_dateEl, 'Expire Date cannot be blank.');
    } else {
        showSuccess(expire_dateEL);
        valid = true;
    }
    return valid;
};


const checkecvv = () => {

    let valid = false;

    const min = 4,
        max = 4;

    const cvv_number = cvv_numberEL.value.trim();

    if (!isRequired(cvv_number)) {
        showError(cvv_number, 'CVV Number cannot be blank.');
    } else if (!isBetween(cvv_number.length, min, max)) {
        showError(cvv_numberEL, `CVV Number must be 4 Digits.`)
    } 
    else {
        showSuccess(cvv_numberEL);
        valid = true;
    }
    return valid;
};



const checkEmail = () => {
    let valid = false;
    const email = emailEl.value.trim();
    if (!isRequired(email)) {
        showError(emailEl, 'Email cannot be blank.');
    } else if (!isEmailValid(email)) {
        showError(emailEl, 'Email is not valid.')
    } else {
        showSuccess(emailEl);
        valid = true;
    }
    return valid;
};

const checkPassword = () => {
    let valid = false;


    const password = passwordEl.value.trim();

    if (!isRequired(password)) {
        showError(passwordEl, 'Password cannot be blank.');
    } else if (!isPasswordSecure(password)) {
        showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    } else {
        showSuccess(passwordEl);
        valid = true;
    }

    return valid;
};

const checkConfirmPassword = () => {
    let valid = false;
    // check confirm password
    const confirmPassword = confirmPasswordEl.value.trim();
    const password = passwordEl.value.trim();

    if (!isRequired(confirmPassword)) {
        showError(confirmPasswordEl, 'Please enter the password again');
    } else if (password !== confirmPassword) {
        showError(confirmPasswordEl, 'The password does not match');
    } else {
        showSuccess(confirmPasswordEl);
        valid = true;
    }

    return valid;
};

const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,12})");
    return re.test(password);
};

const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;


const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}


form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    e.preventDefault();

    // validate fields
    let isUsernameValid = checkUsername(),
        isEmailValid = checkEmail(),
        isPasswordValid = checkPassword(),
        isConfirmPasswordValid = checkConfirmPassword();

    let isFormValid = isUsernameValid &&
        isEmailValid &&
        isPasswordValid &&
        isConfirmPasswordValid;

    // submit to the server if the form is valid
    if (isFormValid) {

    }
});


const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'username':
            checkUsername();
            break;
        case 'email':
            checkEmail();
            break;
        case 'password':
            checkPassword();
            break;
        case 'confirm-password':
            checkConfirmPassword();
            break;
    }
}));
