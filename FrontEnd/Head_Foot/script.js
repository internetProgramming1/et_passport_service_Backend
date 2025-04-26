// Update the fetch paths to:
fetch('../FrontEnd/Head_Foot/header.html')
  .then(response => response.text())
  .then(data => document.getElementById('header-placeholder').innerHTML = data);

fetch('../FrontEnd/Head_Foot/footer.html')
  .then(response => response.text())
  .then(data => document.getElementById('footer-placeholder').innerHTML = data);