<?php include '../includes/header.php'; ?>

<!-- To insert newsletter emails -->
<?php
require '../includes/db.php';

$email = $_POST['email'];

$sql = "INSERT INTO newsletter (email) VALUES (?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

echo "Subscribed successfully!";
?>


<h1>Dashboard</h1>
<p>Welcome to the admin dashboard.</p>

<?php include '../includes/footer.php'; ?>
