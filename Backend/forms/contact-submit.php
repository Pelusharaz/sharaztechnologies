<?php
// Start by setting the header to return JSON
header('Content-Type: application/json');

// Check if the request is a POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Require your existing PDO connection file
    require_once '../includes/config.php'; // Adjust the path if needed

    // Collect and sanitize input
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Simple validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    try {
        // Prepare and execute insert query
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message, submitted_at) VALUES (:name, :email, :subject, :message, NOW())");

        $stmt->execute([
            ':name'    => $name,
            ':email'   => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Your message has been sent. Thank you!']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message. Please try again later.']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

?>

