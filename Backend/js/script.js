// Admin dashboard humberggerbutton
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("menu-toggle");
    const wrapper = document.getElementById("wrapper");
  
    toggleButton.addEventListener("click", function () {
      wrapper.classList.toggle("toggled");
    });
  });
  

// contact form submission
document.querySelector('.php-email-form').addEventListener('submit', function (e) {
  e.preventDefault();

  const form = this;
  const formData = new FormData(form);
  const loading = form.querySelector('.loading');
  const errorMessage = form.querySelector('.error-message');
  const sentMessage = form.querySelector('.sent-message');

  loading.style.display = 'block';
  errorMessage.style.display = 'none';
  sentMessage.style.display = 'none';

  fetch(form.getAttribute('action'), {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    loading.style.display = 'none';
    if (data.status === 'success') {
      sentMessage.innerText = data.message;
      sentMessage.style.display = 'block';
      form.reset();
    } else {
      errorMessage.innerText = data.message;
      errorMessage.style.display = 'block';
    }
  })
  .catch(() => {
    loading.style.display = 'none';
    errorMessage.innerText = "There was a problem submitting the form. Please try again.";
    errorMessage.style.display = 'block';
  });
});
