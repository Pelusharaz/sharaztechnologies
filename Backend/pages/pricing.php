<?php include '../includes/header.php'; ?>



<!-- To save pricings -->
<?php
require '../includes/db.php';

$title = $_POST['title'];
$price = $_POST['price'];
$features = $_POST['features'];
$plan_type = $_POST['plan_type'];

$sql = "INSERT INTO pricing (title, price, features, plan_type) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $price, $features, $plan_type]);

echo "Pricing saved successfully!";
?>


<h1>Dashboard</h1>
<p>Welcome to the admin dashboard.</p>

<?php include '../includes/footer.php'; ?>
