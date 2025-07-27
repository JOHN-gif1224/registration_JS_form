document
  .getElementById("registrationForm")
  .addEventListener("submit", function (e) {
    e.preventDefault();
    clearErrors();

    const firstName = document.getElementById("firstName").value.trim();
    const lastName = document.getElementById("lastName").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const termsAccepted = document.getElementById("terms").checked;

    let isValid = true;

    // Validation prénom
    if (!firstName) {
      showError("firstNameError", "Le prénom est requis");
      isValid = false;
    }

    // Validation nom
    if (!lastName) {
      showError("lastNameError", "Le nom est requis");
      isValid = false;
    }

    // Validation email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email) {
      showError("emailError", "L'email est requis");
      isValid = false;
    } else if (!emailRegex.test(email)) {
      showError("emailError", "Format d'email invalide");
      isValid = false;
    }

    // Validation mot de passe
    if (!password) {
      showError("passwordError", "Le mot de passe est requis");
      isValid = false;
    } else if (password.length < 8) {
      showError(
        "passwordError",
        "Le mot de passe doit contenir au moins 8 caractères"
      );
      isValid = false;
    }

    // Validation confirmation mot de passe
    if (!confirmPassword) {
      showError(
        "confirmPasswordError",
        "Veuillez confirmer votre mot de passe"
      );
      isValid = false;
    } else if (password !== confirmPassword) {
      showError(
        "confirmPasswordError",
        "Les mots de passe ne correspondent pas"
      );
      isValid = false;
    }

    // Validation conditions d'utilisation
    if (!termsAccepted) {
      showError("termsError", "Vous devez accepter les conditions");
      isValid = false;
    }

    // Soumission réussie
    if (isValid) {
      const successMessage = document.getElementById("successMessage");
      successMessage.textContent =
        "Inscription réussie ! Bienvenue " + firstName + " " + lastName;
      successMessage.style.display = "block";
    }
  });

// Fonction pour afficher les messages d'erreur
function showError(elementId, message) {
  const errorElement = document.getElementById(elementId); // Variable permettant de récupérer l'élément d'erreur
  errorElement.textContent = message;
}

function clearErrors() {
  const errors = document.querySelectorAll(".error-message");
  errors.forEach((error) => (error.textContent = ""));

  document.getElementById("successMessage").style.display = "none";
}

// Validation en temps réel
const fields = [
  "firstName",
  "lastName",
  "email",
  "password",
  "confirmPassword",
];
fields.forEach((field) => {
  document.getElementById(field).addEventListener("input", function () {
    clearErrors();
  });
});

document.getElementById("terms").addEventListener("change", clearErrors);
