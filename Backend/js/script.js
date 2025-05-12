// Admin dashboard humberggerbutton
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("menu-toggle");
    const wrapper = document.getElementById("wrapper");
  
    toggleButton.addEventListener("click", function () {
      wrapper.classList.toggle("toggled");
    });
  });
  

// contact form submission
//   document.getElementById('contact-form').addEventListener('submit', function(e) {
//   e.preventDefault();

//   const form = e.target;
//   const formData = new FormData(form);
//   const loading = form.querySelector('.loading');
//   const error = form.querySelector('.error-message');
//   const success = form.querySelector('.sent-message');

//   loading.style.display = 'block';
//   error.style.display = 'none';
//   success.style.display = 'none';

//   fetch(form.action, {
//     method: 'POST',
//     body: formData
//   })
//   .then(res => res.text())
//   .then(data => {
//     loading.style.display = 'none';
//     if (data.trim() === 'OK') {
//       success.style.display = 'block';
//       form.reset();
//     } else {
//       error.innerHTML = data;
//       error.style.display = 'block';
//     }
//   })
//   .catch(err => {
//     loading.style.display = 'none';
//     error.innerHTML = 'Form submission failed. Please try again.';
//     error.style.display = 'block';
//   });
// });

