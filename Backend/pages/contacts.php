<?php include '../includes/header.php'; ?>

<h1>Contact Messages</h1>
<p>Welcome to the admin dashboard.</p>



<!-- To add contact messages -->
<?php
// require '../includes/db.php';

// $name = $_POST['name'];
// $email = $_POST['email'];
// $subject = $_POST['subject'];
// $message = $_POST['message'];

// $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$name, $email, $subject, $message]);

// echo "Subscribed successfully!";
// // header("location:../../index.php"); 

?>
<!-- end submission -->


<!-- To add contact messages and send mail -->
<?php
// Set response type
header('Content-Type: application/json');

// Database credentials
require_once '../includes/db.php'; // Adjust the path to where your db.php is located

// Email destination
$receiving_email_address = 'sharaztechs@gmail.com';

try {
  // Validate form submission
  if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    throw new Exception("Invalid request method.");
  }

  // Collect and sanitize form data
  $name    = htmlspecialchars(trim($_POST["name"]));
  $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $subject = htmlspecialchars(trim($_POST["subject"]));
  $message = htmlspecialchars(trim($_POST["message"]));

  // Validate required fields
  if (!$name || !$email || !$subject || !$message) {
    throw new Exception("All fields are required.");
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    throw new Exception("Invalid email address.");
  }

  // Insert into database
  $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
  $stmt->execute([$name, $email, $subject, $message]);

  // Send email
  // $email_subject = "New Contact Message: $subject";
  // $email_body = "You have received a new message:\n\n" .
  //               "Name: $name\n" .
  //               "Email: $email\n\n" .
  //               "Subject: $subject\n\n" .
  //               "Message:\n$message\n";

  // $headers = "From: $name <$email>\r\nReply-To: $email";

  // if (!mail($receiving_email_address, $email_subject, $email_body, $headers)) {
  //   throw new Exception("Failed to send email.");
  // }

  // Success response 
  echo json_encode(['status' => 'success', 'message' => 'Your message has been sent. Thank you!']);

} catch (Exception $e) {
  // Error response
  echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>



<?php include '../includes/footer.php'; ?>


