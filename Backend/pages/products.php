<?php include '../includes/header.php'; ?>

<!-- To add products -->
<?php
require '../includes/db.php';

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image_url = $_POST['image_url'];
$category = $_POST['category'];

$sql = "INSERT INTO products (name, description, price, image_url, category) VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$name, $description, $price, $image_url, $category]);

echo "Product added successfully!";
?>

<h1>Dashboard</h1>
<p>Welcome to the admin dashboard.</p>

<?php include '../includes/footer.php'; ?>
