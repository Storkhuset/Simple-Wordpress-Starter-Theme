console.log("The main.js script is enqueued."); // Remove when implementing your own code.

/**
 *  Simmples form of form validation
 *  Checks if all fields are filld
 *  Recommended to add email verification
 *  Recommended to add success message
 */

function submitForm() {
  const formName = document.querySelector("#form-name");
  const formEmail = document.querySelector("#form-email");
  const formText = document.querySelector("#form-message");

  if (formName.value == "" || formEmail.value == "" || formText.value == "") {
    alert("All fields must be filled!");
    return false;
  }
}

function toggleNav() {
  console.log("Nav menu button was clicked."); // Remove when implementing your own code.
  // Your solution to toggle the navigation on mobile devices goes here.
}
