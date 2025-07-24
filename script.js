document
  .getElementById("inscriptionForm")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    suppErreurs();
    /* Variables désignant chaque champs */
    const lastName = document.getElementById("lastName").value;
    const firstName = document.getElementById("firstName").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmation = document.getElementById("confirmation").value;
    const terms = document.getElementById("terms").checked;

    /* Variables pour non validation des champs */
    const lastNameError = document.getElementById("lastNameError");
    const firstNameError = document.getElementById("firstNameError");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");
    const confirmationError = document.getElementById("confirmationError");
    const conditionsError = document.getElementById("conditionsError");

    let inputValidation = true; // Variable pour vérifier la validation des champs.

    // validation Nom
    if (!lastName) {
      lastNameError.innerHTML = "Le nom est requis.";
      inputValidation = false;
    }
    // validation Prénom
    if (!firstName) {
      firstNameError.innerHTML = "Le prénom est requis.";
      inputValidation = false;
    }
    // validation Email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email) {
      emailError.innerHTML = "L'e-mail est requis .";
      inputValidation = false;
    } else if (!emailRegex.test(email)) {
      emailError.innerHTML = "L'e-mail n'est pas valide.";
      inputValidation = false;
    }

    // validation Mot de passe
    if (!password) {
      passwordError.innerHTML = "Le mot de passe est requis.";
      inputValidation = false;
    } else if (password.length < 8) {
      passwordError.innerHTML =
        "Le mot de passe doit contenir au moins 8 caractères.";
      inputValidation = false;
    }

    // Confirmation du mot de passe
    if (!confirmation) {
      confirmationError.innerHTML = "Confirmez votre mot de passe.";
      inputValidation = false;
    } else if (confirmation !== password) {
      confirmationError.innerHTML = "Les mots de passe ne correspondent pas.";
      inputValidation = false;
    }

    // Validation des conditions d'utilisation
    if (!terms) {
      conditionsError.innerHTML =
        "Vous n'avez pas accepté les conditions d'utilisation.";
      inputValidation = false;
    }

    // Affichage du message d'inscription effectuée
    if (inputValidation) {
      const validationMessage = document.getElementById("validationMessage");
      validationMessage.innerHTML = `Vous êtes bien inscrit ${lastName} ${firstName}`;
      validationMessage.style.display = "block";

      // Réinitialisation des champs du formulaire
      // document.getElementById("inscriptionForm").reset();
    }
  });

// Fonction permettant de supprimer les messages d'erreurs après validation.
function suppErreurs() {
  const errors = document.querySelectorAll(".messageErreur");
  errors.forEach((Error) => (Error.innerHTML = ""));

  document.getElementById("validationMessage").style.display = "none";
}

// Validation en temps réel
const fields = ["firstName", "lastName", "email", "password", "confirmation"];
fields.forEach((field) => {
  document.getElementById(field).addEventListener("input", function () {
    suppErreurs();
  });
});

document.getElementById("terms").addEventListener("change", suppErreurs);
