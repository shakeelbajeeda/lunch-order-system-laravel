const form = document.querySelector("form"),
  emailField = form.querySelector(".email-field"),
  emailInput = emailField.querySelector(".email"),
  passField = form.querySelector(".create-password"),
  passInput = passField.querySelector(".password"),
  cPassField = form.querySelector(".confirm-password"),
  cPassInput = cPassField.querySelector(".cPassword");
 
nameField = form.querySelector(".name-field"),
  nameInput = nameField.querySelector(".name");
postalField= form.querySelector(".postal-field"),
  postalInput =postalField.querySelector(".postal");

postalField= form.querySelector(".postal-field"),
  postalInput =postalField.querySelector(".postal");

function name() {
  
const namePattern = /^[a-zA-Z'-\s]+$/;
    if (nameInput.value.trim() === "") {
     
      nameField.classList.add("invalid");
      return false;
    } else if (!nameInput.value.match(namePattern)) {
      
      nameField.classList.add("invalid");
      return false;
    } else {
      nameField.classList.remove("invalid");
      return true;
    }
  }

function postal() {
    if (postalInput.value.trim() === "") {
    postalField.classList.add("invalid");
      
      return  postalField.classList.add("invalid"); 
    }
   postalField.classList.remove("invalid"); 
  } 


function checkEmail() {
  const emaiPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  if (!emailInput.value.match(emaiPattern)) {
    return emailField.classList.add("invalid"); 
  }
  emailField.classList.remove("invalid"); 
}


const eyeIcons = document.querySelectorAll(".show-hide");

eyeIcons.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
    const pInput = eyeIcon.parentElement.querySelector("input"); 
    if (pInput.type === "password") {
      eyeIcon.classList.replace("bx-hide", "bx-show");
      return (pInput.type = "text");
    }
    eyeIcon.classList.replace("bx-show", "bx-hide");
    pInput.type = "password";
  });
});


function createPass() {
  const passPattern =
    pattern=/^(?=.*[A-Z].*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+[\]{}|;':",./<>?]).{5,10}$/;

  if (!passInput.value.match(passPattern)) {
    return passField.classList.add("invalid"); 
  }
  passField.classList.remove("invalid"); 
}

function Tradingposition() {
    if (Tradingposition.value === "") {
      alert("Please select your trading position.");
      return false;
    }
    return true;
  }


function confirmPass() {
  if (passInput.value !== cPassInput.value || cPassInput.value === "") {
    return cPassField.classList.add("invalid");
  }
  cPassField.classList.remove("invalid");
}


form.addEventListener("submit", (e) => {
  e.preventDefault();
  checkEmail();
  createPass();
  confirmPass();
postal();
 name();


nameInput.addEventListener("keyup", name);
postalInput.addEventListener("keyup", postal);

  emailInput.addEventListener("keyup", checkEmail);
  passInput.addEventListener("keyup", createPass);
  cPassInput.addEventListener("keyup", confirmPass);

  if (
  !nameField.classList.contains("invalid") &&
    !postalField.classList.contains("invalid") &&
    !emailField.classList.contains("invalid") &&
    !passField.classList.contains("invalid") &&
    !cPassField.classList.contains("invalid")
  ) {
    location.href = form.getAttribute("action");
  }
});


