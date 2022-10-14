const usernameEl = document.querySelector('#username');
const lastnameEl = document.querySelector('#lastname');
const contactnumberEl = document.querySelector('#contactnumber');
const credit_card_numberEl = document.querySelector('#credit_card_number');
const cvv_numberEl = document.querySelector('#cvv_number');
const expire_dateEl = document.querySelector('#expire_date');
const s_idEl = document.querySelector('#s_id');
const emailEl = document.querySelector('#email');
const passwordEl = document.querySelector('#password');
const confirmPasswordEl = document.querySelector('#confirm-password');

const form = document.querySelector('#signup');


const checkUsername = () => {

    let valid = false;

    const min = 3,
        max = 25;

    const username = usernameEl.value.trim();

    if (!isRequired(username)) {
        showError(usernameEl, 'Firstname cannot be blank.');
    } else if (!isBetween(username.length, min, max)) {
        showError(usernameEl, `Firstname must be between ${min} and ${max} characters.`)
    } else {
        showSuccess(usernameEl);
        valid = true;
    }
    return valid;
};

const checklastname = () => {
// alert("hello");
    let valid = false;

    const min = 3,
        max = 25;

    const lastname = lastnameEl.value.trim();

    if (!isRequired(lastname)) {
        showError(lastnameEl, 'Lastname cannot be blank.');
    } else if (!isBetween(lastname.length, min, max)) {
        showError(lastnameEl, `Lastname must be between ${min} and ${max} characters.`)
    } else {
        showSuccess(lastnameEl);
        valid = true;
    }
    return valid;
};



const checkcontactnumber = () => {
    let valid = false;
    const contactnumber = contactnumberEl.value.trim();
    if (!isRequired(contactnumber)) {
      // alert("blank");
        showError(contactnumberEl, 'Contact number cannot be blank.');
    } else if (!isContactnumberValid(contactnumber)) {
      // alert("else if");
        showError(contactnumberEl, 'contact number must be in 10 Digits ')
    } else {
      // alert("else");
        showSuccess(contactnumberEl);
        valid = true;
    }
    return valid;
};


const checkcredit_card_numberEl = () => {

    let valid = false;
    const credit_card_number = credit_card_numberEl.value.trim();
    if (!isRequired(credit_card_number)) {
      // alert("blank");
        showError(credit_card_numberEl, 'Contact number cannot be blank.');
    } else if (!isContactnumberValid(credit_card_number)) {
      // alert("else if");
        showError(credit_card_numberEl, 'contact number must be in 10 Digits ')
    } else {
      // alert("else");
        showSuccess(credit_card_numberEl);
        valid = true;
    }
    return valid;

};

const checkcvv_numberEl = () => {

  let valid = false;
    const cvv_number = cvv_numberEl.value.trim();
    if (!isRequired(cvv_number)) {
      // alert("blank");
        showError(cvv_numberEl, 'CVV number cannot be blank.');
    } else if (!iscvv_numberValid(cvv_number)) {
      // alert("else if");
        showError(cvv_numberEl, 'CVV number must be in 4 Digits ')
    } else {
      // alert("else");
        showSuccess(cvv_numberEl);
        valid = true;
    }
    return valid;

};

const checkexpire_dateEl = () => {
// alert("hellohhhh");
    let valid = false;

    // const min = 3,
    //     max = 25;

    const expire_date = expire_dateEl.value.trim();

    if (!isRequired(expire_date)) {
      // alert("1");
        showError(expire_dateEl, 'Select Expire Date');
    } else {
      // alert("KKKK");
        showSuccess(expire_dateEl);
        valid = true;
    }
    return valid;
};

const checks_idEl = () => {
// alert("hellohhhh");
    let valid = false;

    // const min = 3,
    //     max = 25;

    const s_id = s_idEl.value.trim();

    if (!isRequired(s_id)) {
      // alert("1");
        showError(s_idEl, 'Student Id / Staff Id must not be blank ');
    } else {
      // alert("KKKK");
        showSuccess(s_idEl);
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
        showError(passwordEl, 'Password must has at least 6 to 12 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (~ ! # $)');
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

const isContactnumberValid = (contactnumber) => {
    const re = /^\d{10}$/;
    return re.test(contactnumber);
};

const iscvv_numberValid = (cvv_number) => {
    const re = /^\d{4}$/;
    return re.test(cvv_number);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!#\$\])(?=.{6,12})");
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
       isLastnameValid = checklastname(),
       iscontactnumberValid = checkcontactnumber(),
       iscredit_card_numberElValid = checkcredit_card_numberEl(),
       iscvv_numberElValid = checkcvv_numberEl(),
       isexpire_dateElValid = checkexpire_dateEl(),
       iss_idElValid = checks_idEl(),
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
        case 'lastname':
            checklastname();
            break;
          case 'contactnumber':
            checkcontactnumber();
            break;
        case 'credit_card_number':
            checkcredit_card_number();
            break;
        case 'cvv_number':
            checkcvv_number();
            break;
        case 'expire_date':
            checkexpire_date();
            break;
        case 's_id':
            checks_id();
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