// Function to hide all forms initially
function hideAllForms() {
  const forms = ['#expired-passport-form', '#delivery-date-form', '#personal-info-form'];
  forms.forEach(function(form) {
      $(form).hide();  
  });
}

function showExpiredPassportForm() {
  hideAllForms();
  $('#renewal-passport-main').hide();
  $('#expired-passport-form').show();  
}

function showReplacementForm() {
  hideAllForms();
  $('#renewal-passport-main').hide();
  $('#lost-passport-form').show();
}

// Show Delivery Date Form (After Expired Passport Form)
function showDeliveryDateForm() {
  hideAllForms();
  $('#delivery-date-form').show();
}

// Show Personal Info Form (After Delivery Date Form)
function showPersonalInfoForm() {
  hideAllForms();
  $('#personal-info-form').show();
}

// jQuery for handling form submission
$('#personal-info-form').submit(function(event) {
  event.preventDefault(); 
  $('#personal-info-form').hide();
  $('#step-region').show();  
});

function goToPassportInfo() {

  $('#step-region').hide();

  $('#step-passport-info').show();
}

// Apply Action for each passport type (Expired, Lost, etc.)
function applyAction(action) {
  hideAllForms();
  if (action === 'expired') {
      showExpiredPassportForm();
  } else if (action === 'lost') {
      alert('Replacement for Lost Passport');
      
  } else if (action === 'valid') {
      alert('Replacement for Valid Passport');
      
  } else if (action === 'damaged') {
      alert('Damaged Passport');
      
  }
}
