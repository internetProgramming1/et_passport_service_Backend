// Load header
fetch('/Project/et_passport_service_Backend/FrontEnd/Head_Foot/header.html')
  .then(response => response.text())
  .then(data => document.getElementById('header-placeholder').innerHTML = data);

// Load footer
fetch('/Project/et_passport_service_Backend/FrontEnd/Head_Foot/footer.html')
  .then(response => response.text())
  .then(data => document.getElementById('footer-placeholder').innerHTML = data);