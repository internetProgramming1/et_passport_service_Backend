// Function to hide all forms initially
function hideAllForms() {
    const forms = ['lost-passport-form', 'deliverylost-date-form', 'personal-info-lostform'];
    forms.forEach(function(form) {
        document.getElementById(form).style.display = 'none';
    });
  }
  
  function showlostForm() {
    hideAllForms();
    document.getElementById("lost-passport-form").style.display = "block";
  }
  // Show Delivery Date Form (After Expired Passport Form)
  function showDeliveryDatelostForm() {
    hideAllForms();
    document.getElementById("deliverylost-date-form").style.display = "block";
  }
  
  // Show Personal Info Form (After Delivery Date Form)
  function showPersonalInfolostForm() {
    hideAllForms();
    document.getElementById("personal-info-lostform").style.display = "block";
  }
  document.getElementById('personal-info-lostform').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
  
    // Optionally validate personal info inputs here
  
    // Hide the personal info form and show the region form
    document.getElementById("personal-info-lostform").style.display = "none";
    document.getElementById('step-lostregion').style.display = "block"; // Show the region form
  });
  function goToPassportInfolost() {
    // Hide the region selection form
    document.getElementById('step-lostregion').style.display = 'none';
    
    // Show the passport information form
    document.getElementById('step-passport-infolost').style.display = 'block';
  }
 