<?php include '../includes/header.php'; ?>

<h1>Contact Meassages</h1>
<p>Welcome to the admin dashboard.</p>


<!-- To add contact messages -->
<?php
require '../includes/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$name, $email, $subject, $message]);

echo "Message submitted!";
?>


<?php include '../includes/footer.php'; ?>
