// Admin dashboard humberggerbutton
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("menu-toggle");
    const wrapper = document.getElementById("wrapper");
  
    toggleButton.addEventListener("click", function () {
      wrapper.classList.toggle("toggled");
    });
  });
  

// contact form submission
  document.getElementById('contact-form').addEventListener('submit', async function (e) {
  e.preventDefault();

  const form = e.target;
  const formData = new FormData(form);
  const loading = form.querySelector('.loading');
  const errorMsg = form.querySelector('.error-message');
  const sentMsg = form.querySelector('.sent-message');

  // Reset visibility
  [loading, errorMsg, sentMsg].forEach(el => {
    el.classList.remove('show');
    el.style.display = 'none';
  });

  // Show loading
  loading.style.display = 'block';
  setTimeout(() => loading.classList.add('show'), 10);

  try {
    const response = await fetch(form.action, {
      method: 'POST',
      body: formData
    });

    const result = await response.json();

    loading.classList.remove('show');
    setTimeout(() => loading.style.display = 'none', 500);

    if (result.status === 'success') {
      sentMsg.textContent = result.message;
      sentMsg.style.display = 'block';
      setTimeout(() => sentMsg.classList.add('show'), 10);

      form.reset();

      // Auto-fade out success message after 5s
      setTimeout(() => {
        sentMsg.classList.remove('show');
        setTimeout(() => sentMsg.style.display = 'none', 500);
      }, 5000);

    } else {
      errorMsg.textContent = result.message;
      errorMsg.style.display = 'block';
      setTimeout(() => errorMsg.classList.add('show'), 10);

      setTimeout(() => {
        errorMsg.classList.remove('show');
        setTimeout(() => errorMsg.style.display = 'none', 500);
      }, 5000);
    }

  } catch (err) {
    loading.classList.remove('show');
    setTimeout(() => loading.style.display = 'none', 500);

    errorMsg.textContent = 'An unexpected error occurred.';
    errorMsg.style.display = 'block';
    setTimeout(() => errorMsg.classList.add('show'), 10);

    setTimeout(() => {
      errorMsg.classList.remove('show');
      setTimeout(() => errorMsg.style.display = 'none', 500);
    }, 5000);
  }
});


