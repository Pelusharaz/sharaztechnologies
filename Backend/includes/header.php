<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <!-- contacts.php styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="d-flex" id="wrapper">
  <!-- Sidebar -->
  <div class="bg-dark text-white sidebar p-3" id="sidebar-wrapper">
    <h4 class="mb-4">Admin Panel</h4>
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link text-white" href="dashboard.php"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="products.php"><i class="bi bi-box-seam me-2"></i>Products</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="pricing.php"><i class="bi bi-cash-coin me-2"></i>Pricing</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="contacts.php"><i class="bi bi-envelope me-2"></i>Contacts</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="newsletter.php"><i class="bi bi-send-check me-2"></i>Newsletter</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="analytics.php"><i class="bi bi-graph-up me-2"></i>Analytics</a></li>
    </ul>
  </div>

  <!-- Page Content -->
  <div id="page-content-wrapper" class="w-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom px-3">
      <button class="btn btn-primary d-lg-none" id="menu-toggle"><i class="bi bi-list"></i></button>
      <span class="navbar-brand ms-3">Admin Dashboard</span>
    </nav>

    <div class="container-fluid mt-4">
