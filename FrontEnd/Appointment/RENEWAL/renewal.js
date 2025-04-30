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
  
  