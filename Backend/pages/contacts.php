<?php include '../includes/header.php'; ?>

<h1>Contact Messages</h1>
<p>Welcome to the admin dashboard.</p>


<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Include the PDO connection
//     require_once '../includes/config.php'; // Make sure this path is correct

//     // Get and sanitize inputs
//     $name = trim($_POST['name']);
//     $email = trim($_POST['email']);
//     $subject = trim($_POST['subject']);
//     $message = trim($_POST['message']);

//     try {
//         // Insert into DB
//         $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
//         $stmt->execute([$name, $email, $subject, $message]);

//         // Prepare email
//         // $to = "sharaztechs@gmail.com"; // <-- Replace this with your actual Gmail
//         // $email_subject = "New Contact Form Submission: $subject";
//         // $email_body = "You have received a new message from the contact form:\n\n"
//         //             . "Name: $name\n"
//         //             . "Email: $email\n\n"
//         //             . "Message:\n$message";
//         // $headers = "From: noreply@yourdomain.com\r\n";
//         // $headers .= "Reply-To: $email\r\n";

//         // // Send the email
//         // if (mail($to, $email_subject, $email_body, $headers)) {
//         //     header("Location: ../../index.php?status=success");
//         // } else {
//         //     header("Location: ../../index.php?status=mail_error");
//         // }
//         // exit;

//     } catch (Exception $e) {
//         // On DB error
//         header("Location: ../../index.php?status=db_error");
//         exit;
//     }
// } else {
//     // If accessed without POST
//     header("Location: ../../index.php");
//     exit;
// }
?>


<?php
// require_once '../includes/config.php'; // Adjust path to your PDO connection

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
//12     // Sanitize input
//     $name    = trim($_POST['name']);
//     $email   = trim($_POST['email']);
//     $subject = trim($_POST['subject']);
//     $message = trim($_POST['message']);

//     // Basic validation (can expand)
//     if (empty($name) || empty($email) || empty($subject) || empty($message)) {
//         echo '<div class="error-message">Please fill in all fields.</div>';
//         exit;
//     }

//     try {
//         // Insert into DB
//         $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
//         $stmt->execute([$name, $email, $subject, $message]);

//         // Optional: Send email (comment out if not needed)
//         /*
//         $to = "you@example.com"; // change to your email
//         $headers = "From: $email" . "\r\n" .
//                    "Reply-To: $email" . "\r\n" .
//                    "X-Mailer: PHP/" . phpversion();
//         mail($to, $subject, $message, $headers);
//         */

//         echo '<div class="sent-message">Your message has been sent. Thank you!</div>';
//     } catch (PDOException $e) {
//         echo '<div class="error-message">Error saving message. Please try again later.</div>';
//         // You can log $e->getMessage() somewhere for debugging
//     }
// } else {
//     echo '<div class="error-message">Invalid request.</div>';
// }
?>





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

// echo "<script>alert('message sent successfully')</script>
// <script>window.location = '../../index.php'</script>";  

// ?>
<!-- end submission -->


<!-- To add contact messages and send mail -->
<?php
// // Set response type
// header('Content-Type: application/json');

// // Database credentials
// require_once '../includes/db.php'; // Adjust the path to where your db.php is located

// // Email destination
// $receiving_email_address = 'sharaztechs@gmail.com';

// try {
//   // Validate form submission
//   if ($_SERVER["REQUEST_METHOD"] !== "POST") {
//     throw new Exception("Invalid request method.");
//   }

//   // Collect and sanitize form data
//   $name    = htmlspecialchars(trim($_POST["name"]));
//   $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
//   $subject = htmlspecialchars(trim($_POST["subject"]));
//   $message = htmlspecialchars(trim($_POST["message"]));

//   // Validate required fields
//   if (!$name || !$email || !$subject || !$message) {
//     throw new Exception("All fields are required.");
//   }

//   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     throw new Exception("Invalid email address.");
//   }

//   // Insert into database
//   $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
//   $stmt->execute([$name, $email, $subject, $message]);

//   // Send email
//   // $email_subject = "New Contact Message: $subject";
//   // $email_body = "You have received a new message:\n\n" .
//   //               "Name: $name\n" .
//   //               "Email: $email\n\n" .
//   //               "Subject: $subject\n\n" .
//   //               "Message:\n$message\n";

//   // $headers = "From: $name <$email>\r\nReply-To: $email";

//   // if (!mail($receiving_email_address, $email_subject, $email_body, $headers)) {
//   //   throw new Exception("Failed to send email.");
//   // }

//   // Success response 
//     session_start();
//     $_SESSION['contact_status'] = 'success';
//     header('Location: ../../index.php'); // Redirect back to the section or page
//     exit;


// } catch (Exception $e) {
//   // Error response
//     session_start();
//     $_SESSION['contact_status'] = 'error';
//     $_SESSION['contact_message'] = $e->getMessage();
//     header('Location: ../../index.php');
//     exit;

// }
?>



<?php include '../includes/footer.php'; ?>


