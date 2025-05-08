// Update the fetch paths to:
fetch('../../Head_Foot/header.html')
  .then(response => response.text())
  .then(data => document.getElementById('header-placeholder').innerHTML = data);

fetch('../../Head_Foot/footer.html')
  .then(response => response.text())
  .then(data => document.getElementById('footer-placeholder').innerHTML = data);