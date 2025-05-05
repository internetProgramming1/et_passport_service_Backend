// Update the fetch paths to:
fetch('http://localhost/website/project/et_passport_service_backend/FrontEnd/Head_Foot/header.html')
  .then(response => response.text())
  .then(data => document.getElementById('header-placeholder').innerHTML = data);

fetch('http://localhost/website/project/et_passport_service_backend/FrontEnd/Head_Foot/footer.html')
  .then(response => response.text())
  .then(data => document.getElementById('footer-placeholder').innerHTML = data);