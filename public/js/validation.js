const form = document.getElementById("registration-form");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");
const sellerInput = document.getElementById("seller");
const buyerInput = document.getElementById("buyer");
const postalAddressInput = document.getElementById("postal-address");

form.addEventListener("submit", (event) => {
  let isValid = true;

  if (nameInput.value.trim() === "") {
    nameInput.setCustomValidity("Name is required.");
    isValid = false;
  } else {
    nameInput.setCustomValidity("");
  }

  if (emailInput.value.trim() === "") {
    emailInput.setCustomValidity("Email is required.");
    isValid = false;
  } else {
    emailInput.setCustomValidity("");
  }

  if (passwordInput.value.length < 5 || passwordInput.value.length > 10) {
    passwordInput.setCustomValidity("Password must be 5-10 characters in length.");
    isValid = false;
  } else {
    passwordInput.setCustomValidity("");
  }

  const uppercaseLetters = passwordInput.value.match(/[A-Z]/g);
  const numbers = passwordInput.value.match(/[0-9]/g);
  const specialCharacters = passwordInput.value.match(/[^\w\s]/g);
  
  if (!uppercaseLetters || uppercaseLetters.length < 2 
      || !numbers || numbers.length < 1 
      || !specialCharacters || specialCharacters.length < 1) {
    passwordInput.setCustomValidity("Password must contain at least 2 uppercase letters, 1 number, and 1 special character.");
    isValid = false;
  } else {
    passwordInput.setCustomValidity("");
  }

  if (confirmPasswordInput.value !== passwordInput.value) {
    confirmPasswordInput.setCustomValidity("Passwords do not match.");
    isValid = false;
