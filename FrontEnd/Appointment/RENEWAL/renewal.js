// Function to hide all forms initially
function hideAllForms() {
    const forms = ['expired-passport-form', 'delivery-date-form', 'personal-info-form'];
    forms.forEach(function(form) {
        document.getElementById(form).style.display = 'none';
    });
  }
  
  
  
  function showExpiredPassportForm() {
    hideAllForms();
    document.getElementById("renewal-passport-main").style.display = "none";
    document.getElementById("expired-passport-form").style.display = "block";
  }
  
  // Show Delivery Date Form (After Expired Passport Form)
  function showDeliveryDateForm() {
    hideAllForms();
    document.getElementById("delivery-date-form").style.display = "block";
  }
  
  // Show Personal Info Form (After Delivery Date Form)
  function showPersonalInfoForm() {
    hideAllForms();
    document.getElementById("personal-info-form").style.display = "block";
  }
  document.getElementById('personal-info-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
  
    // Optionally validate personal info inputs here
  
    // Hide the personal info form and show the region form
    document.getElementById("personal-info-form").style.display = "none";
    document.getElementById('step-region').style.display = "block"; // Show the region form
  });
  function goToPassportInfo() {
    // Hide the region selection form
    document.getElementById('step-region').style.display = 'none';
    
    // Show the passport information form
    document.getElementById('step-passport-info').style.display = 'block';
  }
  
  // Apply Action for each passport type (Expired, Lost, etc.)
  function applyAction(action) {
    hideAllForms();
    if (action === 'expired') {
        showExpiredPassportForm();
    } else if (action === 'lost') {
        alert('Replacement for Lost Passport');
        // You can add similar functionality for the Lost Passport process
    } else if (action === 'valid') {
        alert('Replacement for Valid Passport');
        // You can add similar functionality for the Valid Passport process
    } else if (action === 'damaged') {
        alert('Damaged Passport');
        // You can add similar functionality for the Damaged Passport process
    }
  }
  
  