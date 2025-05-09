<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      background-color: #343a40;
      color: #fff;
    }
    .sidebar a {
      color: #adb5bd;
      text-decoration: none;
      display: block;
      padding: 1rem;
    }
    .sidebar a:hover, .sidebar a.active {
      background-color: #495057;
      color: #fff;
    }
    .main-content {
      padding: 2rem;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 d-md-block sidebar">
        <h4 class="p-3">Admin</h4>
        <a href="#products" class="active">Products</a>
        <a href="#pricing">Pricing</a>
        <a href="#contacts">Contact Submissions</a>
        <a href="#newsletter">Newsletter</a>
      </nav>

      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
        <section id="products">
          <h3>Mart Products</h3>
          <p>Manage and view current products.</p>
          <!-- Product management table will go here -->
        </section>

        <section id="pricing" class="mt-5">
          <h3>Pricing</h3>
          <p>Edit dynamic pricing.</p>
          <!-- Pricing form or table here -->
        </section>

        <section id="contacts" class="mt-5">
          <h3>Contact Form Submissions</h3>
          <!-- Contact messages table -->
        </section>

        <section id="newsletter" class="mt-5">
          <h3>Newsletter Subscribers</h3>
          <!-- Newsletter list table -->
        </section>
      </main>
    </div>
  </div>
</body>
</html>
