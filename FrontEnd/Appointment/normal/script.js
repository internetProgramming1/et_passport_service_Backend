document.getElementById("siteSelectionForm").addEventListener("submit", (e) => {
    e.preventDefault();
    
    // Save form data to localStorage
    const formData = {
      site: e.target.elements.site.value,
      city: e.target.elements.city.value,
      office: e.target.elements.office.value,
      delivery: e.target.elements.delivery.value
    };
    localStorage.setItem("passportFormData", JSON.stringify(formData));
    
    // Redirect to the next step (e.g., personal-info.html)
    window.location.href = "page3.html";
  });