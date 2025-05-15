// Admin dashboard humberggerbutton
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("menu-toggle");
    const wrapper = document.getElementById("wrapper");
  
    toggleButton.addEventListener("click", function () {
      wrapper.classList.toggle("toggled");
    });
  });
  

// contact form submission loading,success and error message
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

// end contact form submission loading,success and error message



// News letter subscriptions
document.getElementById('newsletters').addEventListener('submit', async function (e) {
  e.preventDefault();

  const form = e.target;
  const formData = new FormData(form);
  const loading = form.querySelector('.loading');
  const errorMsg = form.querySelector('.error-message');
  const sentMsg = form.querySelector('.sent-message');

  // Reset messages
  [loading, errorMsg, sentMsg].forEach(el => {
    el.classList.remove('show');
    el.style.display = 'none';
  });

  // Show loading
  loading.style.display = 'block';
  requestAnimationFrame(() => loading.classList.add('show')); // smoother trigger

  try {
    const response = await fetch(form.action, {
      method: 'POST',
      body: formData
    });

    const result = await response.json();

    // Stop loading
    loading.classList.remove('show');
    setTimeout(() => loading.style.display = 'none', 300);

    if (result.status === 'success') {
      sentMsg.textContent = result.message;
      sentMsg.style.display = 'block';
      requestAnimationFrame(() => sentMsg.classList.add('show'));
      form.reset();

      setTimeout(() => {
        sentMsg.classList.remove('show');
        setTimeout(() => sentMsg.style.display = 'none', 300);
      }, 5000);
    } else {
      errorMsg.textContent = result.message;
      errorMsg.style.display = 'block';
      requestAnimationFrame(() => errorMsg.classList.add('show'));

      setTimeout(() => {
        errorMsg.classList.remove('show');
        setTimeout(() => errorMsg.style.display = 'none', 300);
      }, 5000);
    }

  } catch (err) {
    loading.classList.remove('show');
    setTimeout(() => loading.style.display = 'none', 300);

    errorMsg.textContent = 'An unexpected error occurred.';
    errorMsg.style.display = 'block';
    requestAnimationFrame(() => errorMsg.classList.add('show'));

    setTimeout(() => {
      errorMsg.classList.remove('show');
      setTimeout(() => errorMsg.style.display = 'none', 300);
    }, 5000);
  }
});

// end News letter subscriptions

// Pricing updates
document.getElementById('pricingForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  const statusMsg = document.getElementById('statusMsg');
  statusMsg.textContent = 'Saving...';

  fetch('save_pricing.php', {
    method: 'POST',
    body: formData
  }).then(res => res.json())
    .then(data => {
      if (data.status === 'success') {
        statusMsg.textContent = 'Saved successfully!';
        setTimeout(() => location.reload(), 1000);
      } else {
        statusMsg.textContent = 'Error: ' + data.message;
      }
    }).catch(err => {
      statusMsg.textContent = 'Error occurred.';
    });
});
// end pricing updates

// to track activities on the site
function trackAction(action) {
    fetch('../forms/trackactivity.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'action=' + encodeURIComponent(action)
    });
  }

// end to track activities on the site
