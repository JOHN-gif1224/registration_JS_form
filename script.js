document
  .getElementById("inscriptionForm")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    const firstName = document.getElementById("firstName").value;
    const lastName = document.getElementById("lastName").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmation = document.getElementById("confirmation").value;
    const terms = document.getElementById("terms").value;

    const firstNameError = document.getElementById("firstNameError");
    const lastNameError = document.getElementById("lastNameError");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");
    const confirmationError = document.getElementById("confirmationError");

    let inputValidation = true;

    // validation Nom
    if (!lastName) {
      lastNameError.textContent = "Le nom est requis.";
      inputValidation = false;
    }
    // validation Prénom
    if (!firstName) {
      firstNameError.textContent = "Le prénom est requis.";
      inputValidation = false;
    }
    // validation Email
    if (!email) {
      email.textContent = "L'e-mail est requis.";
      inputValidation = false;
    }
    // validation Nom
    if (!lastName) {
      lastNameError.textContent = "Le nom est requis.";
      inputValidation = false;
    }
    // validation Nom
    if (!lastName) {
      lastNameError.textContent = "Le nom est requis.";
      inputValidation = false;
    }
  });
