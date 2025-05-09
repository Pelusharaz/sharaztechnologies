<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Replace with your authentication logic
  if ($username == 'admin' && $password == 'password') {
    $_SESSION['logged_in'] = true;
    header('Location: pages/dashboard.php');
    exit;
  } else {
    $error = 'Invalid credentials';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Include Bootstrap CSS -->
</head>
<body>
  <div class="container">
    <h2>Admin Login</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="POST">
      <input type="text" name="username" required placeholder="Username">
      <input type="password" name="password" required placeholder="Password">
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
