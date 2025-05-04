// Function to hide all forms initially
function hideAllForms() {
    const forms = ['correct-passport-form', 'deliverycorrect-date-form', 'personal-info-correctform'];
    forms.forEach(function(form) {
        document.getElementById(form).style.display = 'none';
    });
  }
  
  function showlostForm() {
    hideAllForms();
    document.getElementById("correct-passport-form").style.display = "block";
  }
  // Show Delivery Date Form (After Expired Passport Form)
  function showDeliveryDatecorrectForm() {
    hideAllForms();
    document.getElementById("deliverycorrect-date-form").style.display = "block";
  }
  
  // Show Personal Info Form (After Delivery Date Form)
  function showPersonalInfocorrectForm() {
    hideAllForms();
    document.getElementById("personal-info-correctform").style.display = "block";
  }
  document.getElementById('personal-info-correctform').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
  
    // Optionally validate personal info inputs here
  
    // Hide the personal info form and show the region form
    document.getElementById("personal-info-correctform").style.display = "none";
    document.getElementById('step-correctregion').style.display = "block"; // Show the region form
  });
  function goToPassportInfocorrect() {
    // Hide the region selection form
    document.getElementById('step-correctregion').style.display = 'none';
    
    // Show the passport information form
    document.getElementById('step-passport-infocorrect').style.display = 'block';
  }
 